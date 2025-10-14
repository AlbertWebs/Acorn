@extends('layouts.admin')

@section('title', 'C2B Payment Details')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-semibold text-gray-800 flex items-center gap-2">
            <i class="fas fa-info-circle text-blue-500"></i>
            C2B Payment Details
        </h2>
        <a href="{{ route('admin.payments.c2b.index') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded-lg hover:bg-gray-300 transition">
            <i class="fas fa-arrow-left mr-2"></i> Back
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-2xl border border-gray-100 overflow-hidden">
        <div class="p-6 border-b bg-gradient-to-r from-blue-50 to-blue-100">
            <h3 class="text-lg font-semibold text-gray-800">Transaction Summary</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
            <div>
                <p class="text-sm text-gray-500">Transaction ID</p>
                <p class="font-semibold text-gray-900">{{ $payment->trans_id }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Transaction Type</p>
                <p class="font-semibold text-gray-900">{{ $payment->transaction_type ?? '—' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Amount (KES)</p>
                <p class="font-semibold text-gray-900">{{ number_format($payment->trans_amount, 2) }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">MSISDN</p>
                <p class="font-semibold text-gray-900">{{ $payment->msisdn ?? '—' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Bill Reference Number</p>
                <p class="font-semibold text-gray-900">{{ $payment->bill_ref_number ?? '—' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Business Short Code</p>
                <p class="font-semibold text-gray-900">{{ $payment->business_short_code ?? '—' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Invoice Number</p>
                <p class="font-semibold text-gray-900">{{ $payment->invoice_number ?? '—' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Transaction Time</p>
                <p class="font-semibold text-gray-900">{{ $payment->trans_time ?? $payment->created_at->format('d M Y, H:i') }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">First Name</p>
                <p class="font-semibold text-gray-900">{{ $payment->first_name ?? '—' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Middle Name</p>
                <p class="font-semibold text-gray-900">{{ $payment->middle_name ?? '—' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Last Name</p>
                <p class="font-semibold text-gray-900">{{ $payment->last_name ?? '—' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Account Balance</p>
                <p class="font-semibold text-gray-900">{{ $payment->org_account_balance ?? '—' }}</p>
            </div>
        </div>
    </div>

    @if ($payment->raw_payload)
        <div class="mt-8 bg-white shadow-lg rounded-2xl border border-gray-100 overflow-hidden">
            <div class="p-6 border-b bg-gradient-to-r from-gray-50 to-gray-100">
                <h3 class="text-lg font-semibold text-gray-800">Raw Payload Data</h3>
            </div>
            <div class="p-6">
                <pre class="bg-gray-900 text-gray-100 text-sm rounded-lg p-4 overflow-x-auto">
{{ json_encode(json_decode($payment->raw_payload), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}
                </pre>
            </div>
        </div>
    @endif
</div>
@endsection
