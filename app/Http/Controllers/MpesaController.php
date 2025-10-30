<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MpesaStkPayment;
use App\Models\Booking;
use App\Models\Invoice;
use Illuminate\Support\Facades\Log;

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

        // Map back to booking id from stored raw_response during initiation
        $bookingId = null;
        $raw = json_decode($payment->raw_response ?? '[]', true);
        if (isset($raw['booking_id'])) {
            $bookingId = (int)$raw['booking_id'];
        } elseif (isset($raw['init_response'])) {
            // try regex fallback
            if (preg_match('/BK-(\d+)/', json_encode($raw), $m)) {
                $bookingId = (int)$m[1];
            }
        } elseif (preg_match('/BK-(\d+)/', $payment->raw_response ?? '', $m)) {
            $bookingId = (int)$m[1];
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
            }
        }

        return response()->json(['ResultCode' => 0, 'ResultDesc' => 'Accepted']);
    }
}


