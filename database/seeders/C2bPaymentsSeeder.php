<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\C2bPayment;
use Illuminate\Support\Str;

class C2bPaymentsSeeder extends Seeder
{
    public function run(): void
    {
        $payments = [
            [
                'transaction_type' => 'Pay Bill',
                'trans_id' => 'QFG123ABC',
                'trans_time' => now()->subDays(3),
                'amount' => 1200.00,
                'business_short_code' => '123456',
                'bill_ref_number' => 'INV-001',
                'invoice_number' => 'INV-001',
                'org_account_balance' => 50000.00,
                'third_party_trans_id' => Str::uuid(),
                'msisdn' => '254712345678',
                'first_name' => 'John',
                'middle_name' => 'Kamau',
                'last_name' => 'Mwangi',
                'status' => 'success',
                'raw_payload' => json_encode([
                    'TransactionType' => 'Pay Bill',
                    'TransID' => 'QFG123ABC',
                    'TransAmount' => '1200',
                    'BillRefNumber' => 'INV-001',
                ]),
            ],
            [
                'transaction_type' => 'Buy Goods',
                'trans_id' => 'RFG789XYZ',
                'trans_time' => now()->subDays(2),
                'amount' => 3000.50,
                'business_short_code' => '654321',
                'bill_ref_number' => 'INV-002',
                'invoice_number' => 'INV-002',
                'org_account_balance' => 42000.00,
                'third_party_trans_id' => Str::uuid(),
                'msisdn' => '254798765432',
                'first_name' => 'Grace',
                'middle_name' => 'Achieng',
                'last_name' => 'Otieno',
                'status' => 'success',
                'raw_payload' => json_encode([
                    'TransactionType' => 'Buy Goods',
                    'TransID' => 'RFG789XYZ',
                    'TransAmount' => '3000.50',
                    'BillRefNumber' => 'INV-002',
                ]),
            ],
            [
                'transaction_type' => 'Pay Bill',
                'trans_id' => 'SDF456JKL',
                'trans_time' => now()->subDay(),
                'amount' => 2500.00,
                'business_short_code' => '123456',
                'bill_ref_number' => 'INV-003',
                'invoice_number' => 'INV-003',
                'org_account_balance' => 38000.00,
                'third_party_trans_id' => Str::uuid(),
                'msisdn' => '254701234567',
                'first_name' => 'Ali',
                'middle_name' => 'Hassan',
                'last_name' => 'Omar',
                'status' => 'pending',
                'raw_payload' => json_encode([
                    'TransactionType' => 'Pay Bill',
                    'TransID' => 'SDF456JKL',
                    'TransAmount' => '2500.00',
                    'BillRefNumber' => 'INV-003',
                ]),
            ],
        ];

        foreach ($payments as $payment) {
            C2bPayment::create($payment);
        }
    }
}
