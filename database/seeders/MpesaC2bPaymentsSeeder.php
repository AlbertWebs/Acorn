<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MpesaC2bPaymentsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mpesa_c2b_payments')->insert([
            [
                'transaction_type' => 'PayBill',
                'trans_id' => 'C2B' . strtoupper(Str::random(8)),
                'trans_time' => now()->subDays(2)->format('YmdHis'),
                'trans_amount' => 1500.00,
                'business_short_code' => '123456',
                'bill_ref_number' => 'INV1001',
                'invoice_number' => 'INV1001',
                'org_account_balance' => '50000.00',
                'third_party_trans_id' => null,
                'msisdn' => '254712345678',
                'first_name' => 'John',
                'middle_name' => 'K.',
                'last_name' => 'Doe',
                'raw_payload' => json_encode(['status' => 'Completed', 'message' => 'Payment received']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'transaction_type' => 'BuyGoods',
                'trans_id' => 'C2B' . strtoupper(Str::random(8)),
                'trans_time' => now()->subDays(1)->format('YmdHis'),
                'trans_amount' => 2800.50,
                'business_short_code' => '654321',
                'bill_ref_number' => 'INV1002',
                'invoice_number' => 'INV1002',
                'org_account_balance' => '70000.00',
                'third_party_trans_id' => null,
                'msisdn' => '254798765432',
                'first_name' => 'Jane',
                'middle_name' => 'M.',
                'last_name' => 'Smith',
                'raw_payload' => json_encode(['status' => 'Completed', 'message' => 'Payment received']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
