<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MpesaStkPayment;
use Illuminate\Support\Str;

class MpesaStkPaymentsSeeder extends Seeder
{
    public function run(): void
    {
        $payments = [
            [
                'user_id' => 1,
                'phone_number' => '254712345678',
                'amount' => 1500.00,
                'merchant_request_id' => Str::uuid(),
                'checkout_request_id' => Str::uuid(),
                'result_code' => '0',
                'result_desc' => 'The service request is processed successfully.',
                'mpesa_receipt_number' => 'QFG12345XY',
                'transaction_date' => now()->subDays(2),
                'status' => 'success',
                'raw_response' => json_encode([
                    'MerchantRequestID' => '12345',
                    'CheckoutRequestID' => '67890',
                    'ResultCode' => 0,
                    'ResultDesc' => 'Processed successfully',
                ]),
            ],
            [
                'user_id' => 2,
                'phone_number' => '254798765432',
                'amount' => 3000.00,
                'merchant_request_id' => Str::uuid(),
                'checkout_request_id' => Str::uuid(),
                'result_code' => '1',
                'result_desc' => 'Request cancelled by user.',
                'mpesa_receipt_number' => null,
                'transaction_date' => now()->subDay(),
                'status' => 'failed',
                'raw_response' => json_encode([
                    'ResultCode' => 1,
                    'ResultDesc' => 'Request cancelled by user',
                ]),
            ],
            [
                'user_id' => null,
                'phone_number' => '254701234567',
                'amount' => 2500.00,
                'merchant_request_id' => Str::uuid(),
                'checkout_request_id' => Str::uuid(),
                'result_code' => null,
                'result_desc' => null,
                'mpesa_receipt_number' => null,
                'transaction_date' => null,
                'status' => 'pending',
                'raw_response' => null,
            ],
        ];

        foreach ($payments as $payment) {
            MpesaStkPayment::create($payment);
        }
    }
}
