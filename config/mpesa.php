<?php

return [
    'consumer_key' => env('MPESA_CONSUMER_KEY', ''),
    'consumer_secret' => env('MPESA_CONSUMER_SECRET', ''),
    'short_code' => env('MPESA_SHORT_CODE', '174379'), // Sandbox default paybill
    'passkey' => env('MPESA_PASSKEY', ''),
    'base_url' => env('MPESA_BASE_URL', 'https://api.safaricom.co.ke'),
    'callback_url' => env('MPESA_STK_CALLBACK', env('APP_URL') . '/mpesa/stk/callback'),
];


