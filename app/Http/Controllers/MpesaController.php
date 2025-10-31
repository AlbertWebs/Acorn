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
        Log::info('M-Pesa STK Callback', ['payload' => $payload]);

        $body = $payload['Body']['stkCallback'] ?? null;
        if (!$body) {
            return response()->json(['status' => 'ignored']);
        }

        $merchantRequestId = $body['MerchantRequestID'] ?? null;
        $checkoutRequestId = $body['CheckoutRequestID'] ?? null;
        $resultCode = (string)($body['ResultCode'] ?? '');
        $resultDesc = $body['ResultDesc'] ?? '';

        $meta = [ 'raw' => $payload ];

        $attributes = [
            'merchant_request_id' => $merchantRequestId,
            'checkout_request_id' => $checkoutRequestId,
        ];

        $payment = MpesaStkPayment::where($attributes)->first();
        if (!$payment) {
            $payment = MpesaStkPayment::create(array_merge($attributes, [
                'status' => 'pending',
                'raw_response' => json_encode($payload),
            ]));
        }

        $status = ((int)$resultCode === 0) ? 'success' : 'failed';
        $update = [
            'result_code' => $resultCode,
            'result_desc' => $resultDesc,
            'status' => $status,
            'raw_response' => json_encode($payload),
        ];

        if ($status === 'success') {
            $items = $body['CallbackMetadata']['Item'] ?? [];
            $map = [];
            foreach ($items as $item) {
                $map[$item['Name']] = $item['Value'] ?? null;
            }
            $update['mpesa_receipt_number'] = $map['MpesaReceiptNumber'] ?? null;
            $update['transaction_date'] = $map['TransactionDate'] ?? null;
            $update['amount'] = $map['Amount'] ?? ($payment->amount ?? null);
            $update['phone_number'] = $map['PhoneNumber'] ?? ($payment->phone_number ?? null);
        }

        $payment->update($update);

        // Get booking_id directly from payment or from raw_response
        $bookingId = $payment->booking_id;
        if (!$bookingId) {
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
            }
        }

        if ($bookingId) {
            $booking = Booking::find($bookingId);
            if ($booking && $status === 'success') {
                $booking->update(['payment_status' => 'Paid']);
                $invoice = Invoice::where('booking_id', $booking->id)->first();
                if ($invoice) {
                    $invoice->update([
                        'payment_status' => 'paid',
                        'transaction_reference' => $payment->mpesa_receipt_number,
                        'status' => 'paid',
                    ]);
                }

                // Send payment confirmation email
                try {
                    $settings = \App\Models\Setting::first();
                    Mail::to($booking->email)
                        ->cc('albertmuhatia@gmail.com')
                        ->send(new PaymentConfirmationMail($booking, $invoice, $payment));
                    Log::info('Payment confirmation email sent', [
                        'booking_id' => $booking->id,
                        'email' => $booking->email
                    ]);
                } catch (\Exception $e) {
                    Log::error('Failed to send payment confirmation email', [
                        'booking_id' => $booking->id,
                        'error' => $e->getMessage()
                    ]);
                }
            }
        }

        return response()->json(['ResultCode' => 0, 'ResultDesc' => 'Accepted']);
    }
}


