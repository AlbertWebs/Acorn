<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MpesaService
{
    protected string $consumerKey;
    protected string $consumerSecret;
    protected string $shortCode;
    protected string $passkey;
    protected string $baseUrl;

    public function __construct()
    {
        $this->consumerKey = config('mpesa.consumer_key');
        $this->consumerSecret = config('mpesa.consumer_secret');
        $this->shortCode = config('mpesa.short_code');
        $this->passkey = config('mpesa.passkey');
        $this->baseUrl = rtrim(config('mpesa.base_url', 'https://sandbox.safaricom.co.ke'), '/');
    }

    public function getAccessToken(): string
    {
        $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)
            ->get($this->baseUrl . '/oauth/v1/generate', [ 'grant_type' => 'client_credentials' ]);
        if (!$response->successful()) {
            throw new \RuntimeException('Failed to get M-Pesa access token');
        }
        return $response->json('access_token');
    }

    public function initiateStkPush(string $phone, int $amount, string $accountReference, string $transactionDesc, string $callbackUrl): array
    {
        $timestamp = now()->format('YmdHis');
        $password = base64_encode($this->shortCode . $this->passkey . $timestamp);
        $accessToken = $this->getAccessToken();

        $payload = [
            'BusinessShortCode' => (int)$this->shortCode,
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' => $phone,
            'PartyB' => (int)$this->shortCode,
            'PhoneNumber' => $phone,
            'CallBackURL' => $callbackUrl,
            'AccountReference' => $accountReference,
            'TransactionDesc' => $transactionDesc,
        ];

        $response = Http::withToken($accessToken)
            ->post($this->baseUrl . '/mpesa/stkpush/v1/processrequest', $payload);

        if (!$response->successful()) {
            throw new \RuntimeException('STK push initiation failed: ' . $response->body());
        }

        return $response->json();
    }
}


