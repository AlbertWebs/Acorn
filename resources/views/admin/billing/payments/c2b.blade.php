@extends('layouts.admin')

@section('title', 'C2B Payments')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-semibold mb-6">C2B Payments</h2>
    <table class="min-w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th>#</th>
                <th>Trans ID</th>
                <th>MSISDN</th>
                <th>Amount</th>
                <th>Bill Ref</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr class="border-b">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $payment->trans_id }}</td>
                    <td>{{ $payment->msisdn }}</td>
                    <td>{{ number_format($payment->trans_amount, 2) }}</td>
                    <td>{{ $payment->bill_ref_number }}</td>
                    <td>{{ $payment->created_at->format('d M Y H:i') }}</td>
                    <td><a href="{{ route('admin.payments.c2b.show', $payment) }}" class="text-blue-600">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $payments->links() }}
</div>
@endsection
