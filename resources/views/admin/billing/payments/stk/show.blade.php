@extends('layouts.admin')

@section('title', 'STK Payment Details')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-semibold text-gray-800 flex items-center gap-2">
            <i class="fas fa-info-circle text-green-500"></i>
            STK Payment Details
        </h2>
        <a href="{{ route('admin.payments.stk.index') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded-lg hover:bg-gray-300 transition">
            <i class="fas fa-arrow-left mr-2"></i> Back
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-2xl border border-gray-100 overflow-hidden">
        <div class="p-6 border-b bg-gradient-to-r from-green-50 to-green-100">
            <h3 class="text-lg font-semibold text-gray-800">Transaction Summary</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
            <div>
                <p class="text-sm text-gray-500">Phone Number</p>
                <p class="font-semibold text-gray-900">{{ $payment->phone_number }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Amount (KES)</p>
                <p class="font-semibold text-gray-900">{{ number_format($payment->amount, 2) }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Receipt Number</p>
                <p class="font-semibold text-gray-900">{{ $payment->mpesa_receipt_number ?? '—' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Merchant Request ID</p>
                <p class="font-semibold text-gray-900">{{ $payment->merchant_request_id ?? '—' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Checkout Request ID</p>
                <p class="font-semibold text-gray-900">{{ $payment->checkout_request_id ?? '—' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Transaction Date</p>
                <p class="font-semibold text-gray-900">{{ $payment->transaction_date ?? $payment->created_at->format('d M Y, H:i') }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Status</p>
                @if ($payment->status === 'success')
                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        <i class="fas fa-check-circle mr-1"></i> Success
                    </span>
                @elseif ($payment->status === 'failed')
                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                        <i class="fas fa-times-circle mr-1"></i> Failed
                    </span>
                @else
                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">
                        <i class="fas fa-clock mr-1"></i> Pending
                    </span>
                @endif
            </div>

            <div class="md:col-span-2">
                <p class="text-sm text-gray-500 mb-1">Result Description</p>
                <p class="font-medium text-gray-800">{{ $payment->result_desc ?? '—' }}</p>
            </div>
        </div>
    </div>

    @if ($payment->raw_response)
        <div class="mt-8 bg-white shadow-lg rounded-2xl border border-gray-100 overflow-hidden">
            <div class="p-6 border-b bg-gradient-to-r from-gray-50 to-gray-100">
                <h3 class="text-lg font-semibold text-gray-800">Raw Response Data</h3>
            </div>
            <div class="p-6">
                <pre class="bg-gray-900 text-gray-100 text-sm rounded-lg p-4 overflow-x-auto">
{{ json_encode(json_decode($payment->raw_response), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}
                </pre>
            </div>
        </div>
    @endif
</div>
@endsection
