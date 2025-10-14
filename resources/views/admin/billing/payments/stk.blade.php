@extends('layouts.admin')

@section('title', 'STK Payments')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-semibold mb-6">STK Payments</h2>
    <table class="min-w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">#</th>
                <th>Phone</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Receipt</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td>{{ $payment->phone_number }}</td>
                    <td>{{ number_format($payment->amount, 2) }}</td>
                    <td>{{ ucfirst($payment->status) }}</td>
                    <td>{{ $payment->mpesa_receipt_number ?? '-' }}</td>
                    <td>{{ $payment->created_at->format('d M Y H:i') }}</td>
                    <td><a href="{{ route('admin.payments.stk.show', $payment) }}" class="text-blue-600">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $payments->links() }}
</div>
@endsection
