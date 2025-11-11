<?php

namespace App\Http\Controllers;

use App\Models\MpesaC2bPayment;
use App\Services\MpesaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MpesaC2bController extends Controller
{
    /**
     * Handle C2B validation callback.
     */
    public function validateTransaction(Request $request)
    {
        $payload = $request->all();

        Log::info('M-Pesa C2B Validation callback received', [
            'payload' => $payload,
            'ip' => $request->ip(),
            'timestamp' => now()->toDateTimeString(),
        ]);

        return response()->json([
            'ResultCode' => 0,
            'ResultDesc' => 'Accepted',
        ]);
    }

    /**
     * Handle C2B confirmation callback.
     */
    public function confirmTransaction(Request $request)
    {
        $payload = $request->all();

        Log::info('M-Pesa C2B Confirmation callback received', [
            'payload' => $payload,
            'ip' => $request->ip(),
            'timestamp' => now()->toDateTimeString(),
        ]);

        $data = [
            'transaction_type' => $payload['TransactionType'] ?? null,
            'trans_id' => $payload['TransID'] ?? null,
            'trans_time' => $payload['TransTime'] ?? null,
            'trans_amount' => $payload['TransAmount'] ?? null,
            'business_short_code' => $payload['BusinessShortCode'] ?? null,
            'bill_ref_number' => $payload['BillRefNumber'] ?? null,
            'invoice_number' => $payload['InvoiceNumber'] ?? null,
            'org_account_balance' => $payload['OrgAccountBalance'] ?? null,
            'third_party_trans_id' => $payload['ThirdPartyTransID'] ?? null,
            'msisdn' => $payload['MSISDN'] ?? null,
            'first_name' => $payload['FirstName'] ?? null,
            'middle_name' => $payload['MiddleName'] ?? null,
            'last_name' => $payload['LastName'] ?? null,
            'raw_payload' => json_encode($payload),
        ];

        if (! empty($data['trans_id'])) {
            $payment = MpesaC2bPayment::updateOrCreate(
                ['trans_id' => $data['trans_id']],
                $data
            );
        } else {
            $payment = MpesaC2bPayment::create($data);
        }

        Log::info('M-Pesa C2B payment stored', [
            'mpesa_c2b_payment_id' => $payment->id,
            'trans_id' => $payment->trans_id,
        ]);

        return response()->json([
            'ResultCode' => 0,
            'ResultDesc' => 'Accepted',
        ]);
    }

    /**
     * Register confirmation and validation URLs with Safaricom.
     */
    public function registerUrls(Request $request, MpesaService $mpesaService)
    {
        $data = $request->validate([
            'validation_url' => ['nullable', 'url'],
            'confirmation_url' => ['nullable', 'url'],
            'response_type' => ['nullable', 'in:Completed,Cancelled'],
        ]);

        $validationUrl = $data['validation_url'] ?? url('/mpesa/c2b/validation');
        $confirmationUrl = $data['confirmation_url'] ?? url('/mpesa/c2b/confirmation');
        $responseType = $data['response_type'] ?? 'Completed';

        try {
            $response = $mpesaService->registerC2bUrls($validationUrl, $confirmationUrl, $responseType);

            Log::info('M-Pesa C2B URLs registered successfully', [
                'validation_url' => $validationUrl,
                'confirmation_url' => $confirmationUrl,
                'response' => $response,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'C2B URLs registered successfully.',
                'data' => $response,
            ]);
        } catch (\Throwable $e) {
            Log::error('M-Pesa C2B URL registration failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to register C2B URLs.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}

