@extends('layouts.admin')

@section('title', 'C2B Payments')

@section('content')
<div class="max-w-12xl mx-auto px-6 py-10">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-semibold text-gray-800 flex items-center gap-2">
            <i class="fas fa-money-bill-wave text-green-500"></i>
            C2B Payments
        </h2>
        <a href="{{ route('admin.dashboard') }}"
           class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg shadow hover:bg-green-700 transition">
            <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-2xl overflow-hidden border border-gray-100">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gradient-to-r from-green-100 to-green-200 text-gray-800 uppercase text-xs tracking-wider">
                <tr>
                    <th scope="col" class="px-6 py-3 font-semibold">#</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Trans ID</th>
                    <th scope="col" class="px-6 py-3 font-semibold">MSISDN</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Amount (KES)</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Bill Ref</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Date</th>
                    <th scope="col" class="px-6 py-3 font-semibold text-center">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($payments as $payment)
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-mono text-green-700">{{ $payment->trans_id }}</td>
                        <td class="px-6 py-4">{{ $payment->msisdn }}</td>
                        <td class="px-6 py-4 font-semibold text-gray-800">{{ number_format($payment->trans_amount, 2) }}</td>
                        <td class="px-6 py-4">{{ $payment->bill_ref_number ?? '—' }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $payment->created_at->format('d M Y, H:i') }}</td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('admin.payments.c2b.show', $payment) }}"
                               class="inline-flex items-center px-3 py-1.5 text-sm text-blue-600 font-medium border border-blue-600 rounded-lg hover:bg-blue-600 hover:text-white transition">
                                <i class="fas fa-eye mr-1"></i> View
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                            No C2B payments found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $payments->links('pagination::tailwind') }}
    </div>
</div>
@endsection
