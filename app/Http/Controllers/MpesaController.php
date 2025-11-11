<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MpesaStkPayment;
use App\Models\Booking;
use App\Models\Invoice;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentConfirmationMail;

class MpesaController extends Controller
{
    public function stkCallback(Request $request)
    {
        $payload = $request->all();
        Log::info('M-Pesa STK Callback Received', [
            'payload' => $payload,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'timestamp' => now()->toDateTimeString()
        ]);

        $body = $payload['Body']['stkCallback'] ?? null;
        if (!$body) {
            Log::warning('M-Pesa STK Callback: Invalid payload structure', [
                'payload' => $payload
            ]);
            return response()->json(['status' => 'ignored']);
        }

        $merchantRequestId = $body['MerchantRequestID'] ?? null;
        $checkoutRequestId = $body['CheckoutRequestID'] ?? null;
        $resultCode = (string)($body['ResultCode'] ?? '');
        $resultDesc = $body['ResultDesc'] ?? '';

        Log::info('M-Pesa STK Callback: Processing', [
            'merchant_request_id' => $merchantRequestId,
            'checkout_request_id' => $checkoutRequestId,
            'result_code' => $resultCode,
            'result_desc' => $resultDesc
        ]);

        $items = $body['CallbackMetadata']['Item'] ?? [];
        $metadata = [];
        foreach ($items as $item) {
            $metadata[$item['Name']] = $item['Value'] ?? null;
        }

        $phoneNumberFromCallback = $metadata['PhoneNumber'] ?? null;
        $amountFromCallback = $metadata['Amount'] ?? null;
        $receiptNumberFromCallback = $metadata['MpesaReceiptNumber'] ?? null;
        $transactionDateFromCallback = $metadata['TransactionDate'] ?? null;

        $attributes = [
            'merchant_request_id' => $merchantRequestId,
            'checkout_request_id' => $checkoutRequestId,
        ];

        $payment = MpesaStkPayment::where($attributes)->first();
        if (!$payment) {
            Log::warning('M-Pesa STK Callback: Payment record not found, creating new', [
                'merchant_request_id' => $merchantRequestId,
                'checkout_request_id' => $checkoutRequestId
            ]);
            $payment = MpesaStkPayment::create(array_merge($attributes, [
                'status' => 'pending',
                'raw_response' => json_encode($payload),
                'phone_number' => $phoneNumberFromCallback ?? '',
                'amount' => $amountFromCallback ?? 0,
                'result_code' => $resultCode,
                'result_desc' => $resultDesc,
                'mpesa_receipt_number' => $receiptNumberFromCallback,
                'transaction_date' => $transactionDateFromCallback,
            ]));
            Log::info('M-Pesa STK Callback: Created new payment record', [
                'payment_id' => $payment->id,
                'merchant_request_id' => $merchantRequestId
            ]);
        } else {
            Log::info('M-Pesa STK Callback: Found existing payment record', [
                'payment_id' => $payment->id,
                'booking_id' => $payment->booking_id,
                'current_status' => $payment->status
            ]);
        }

        $status = ((int)$resultCode === 0) ? 'success' : 'failed';
        $update = [
            'result_code' => $resultCode,
            'result_desc' => $resultDesc,
            'status' => $status,
            'raw_response' => json_encode($payload),
        ];

        if ($status === 'success') {
            $update['mpesa_receipt_number'] = $receiptNumberFromCallback ?? $payment->mpesa_receipt_number;
            $update['transaction_date'] = $transactionDateFromCallback ?? $payment->transaction_date;
            $update['amount'] = $amountFromCallback ?? ($payment->amount ?? null);
            $update['phone_number'] = $phoneNumberFromCallback ?? ($payment->phone_number ?? null);

            Log::info('M-Pesa STK Callback: Payment successful', [
                'payment_id' => $payment->id,
                'mpesa_receipt_number' => $update['mpesa_receipt_number'],
                'amount' => $update['amount'],
                'phone_number' => $update['phone_number'],
                'transaction_date' => $update['transaction_date']
            ]);
        } else {
            Log::warning('M-Pesa STK Callback: Payment failed', [
                'payment_id' => $payment->id,
                'result_code' => $resultCode,
                'result_desc' => $resultDesc
            ]);
        }

        $payment->update($update);
        Log::info('M-Pesa STK Callback: Payment record updated', [
            'payment_id' => $payment->id,
            'status' => $status
        ]);

        // Get booking_id directly from payment or from raw_response
        $bookingId = $payment->booking_id;
        if (!$bookingId) {
            Log::info('M-Pesa STK Callback: No booking_id on payment, attempting to extract from raw_response', [
                'payment_id' => $payment->id
            ]);
            $raw = json_decode($payment->raw_response ?? '[]', true);
            if (isset($raw['booking_id'])) {
                $bookingId = (int)$raw['booking_id'];
            } elseif (isset($raw['init_response'])) {
                $initData = $raw['init_response'] ?? [];
                if (isset($initData['booking_id'])) {
                    $bookingId = (int)$initData['booking_id'];
                } elseif (preg_match('/BK-(\d+)/', json_encode($raw), $m)) {
                    $bookingId = (int)$m[1];
                }
            } elseif (preg_match('/BK-(\d+)/', $payment->raw_response ?? '', $m)) {
                $bookingId = (int)$m[1];
            }
            
            // Update payment with booking_id if found
            if ($bookingId) {
                $payment->update(['booking_id' => $bookingId]);
                Log::info('M-Pesa STK Callback: Extracted and updated booking_id', [
                    'payment_id' => $payment->id,
                    'booking_id' => $bookingId
                ]);
            } else {
                Log::warning('M-Pesa STK Callback: Could not extract booking_id from payment', [
                    'payment_id' => $payment->id,
                    'raw_response_preview' => substr(json_encode($payment->raw_response), 0, 200)
                ]);
            }
        }

        if ($bookingId) {
            $booking = Booking::find($bookingId);
            if (!$booking) {
                Log::error('M-Pesa STK Callback: Booking not found', [
                    'booking_id' => $bookingId,
                    'payment_id' => $payment->id
                ]);
            } elseif ($status === 'success') {
                Log::info('M-Pesa STK Callback: Updating booking payment status', [
                    'booking_id' => $booking->id,
                    'payment_id' => $payment->id,
                    'old_status' => $booking->payment_status,
                    'new_status' => 'Paid'
                ]);
                
                $booking->update(['payment_status' => 'Paid']);
                
                $invoice = Invoice::where('booking_id', $booking->id)->first();
                if ($invoice) {
                    Log::info('M-Pesa STK Callback: Updating invoice payment status', [
                        'invoice_id' => $invoice->id,
                        'invoice_number' => $invoice->invoice_number,
                        'transaction_reference' => $payment->mpesa_receipt_number
                    ]);
                    
                    $invoice->update([
                        'payment_status' => 'paid',
                        'transaction_reference' => $payment->mpesa_receipt_number,
                        'status' => 'paid',
                    ]);
                } else {
                    Log::warning('M-Pesa STK Callback: Invoice not found for booking', [
                        'booking_id' => $booking->id,
                        'payment_id' => $payment->id
                    ]);
                }

                // Send payment confirmation email
                try {
                    $settings = \App\Models\Setting::first();
                    Mail::to($booking->email)
                        ->cc('albertmuhatia@gmail.com')
                        ->send(new PaymentConfirmationMail($booking, $invoice, $payment));
                    Log::info('M-Pesa STK Callback: Payment confirmation email sent', [
                        'booking_id' => $booking->id,
                        'payment_id' => $payment->id,
                        'email' => $booking->email,
                        'cc' => 'albertmuhatia@gmail.com'
                    ]);
                } catch (\Exception $e) {
                    Log::error('M-Pesa STK Callback: Failed to send payment confirmation email', [
                        'booking_id' => $booking->id,
                        'payment_id' => $payment->id,
                        'email' => $booking->email,
                        'error' => $e->getMessage(),
                        'trace' => $e->getTraceAsString()
                    ]);
                }
            } else {
                Log::info('M-Pesa STK Callback: Payment failed, skipping booking/invoice updates', [
                    'booking_id' => $booking->id,
                    'payment_id' => $payment->id,
                    'result_code' => $resultCode,
                    'result_desc' => $resultDesc
                ]);
            }
        } else {
            Log::warning('M-Pesa STK Callback: No booking_id associated with payment', [
                'payment_id' => $payment->id,
                'merchant_request_id' => $merchantRequestId,
                'checkout_request_id' => $checkoutRequestId
            ]);
        }

        Log::info('M-Pesa STK Callback: Processing completed', [
            'payment_id' => $payment->id,
            'booking_id' => $bookingId ?? null,
            'status' => $status,
            'result_code' => $resultCode
        ]);

        return response()->json(['ResultCode' => 0, 'ResultDesc' => 'Accepted']);
    }
}


