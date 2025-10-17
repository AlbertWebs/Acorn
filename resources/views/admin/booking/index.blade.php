@extends('layouts.admin')

@section('page-title', 'Bookings')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">

    <!-- Page Heading -->
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Bookings</h2>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Bookings -->
        <div class="bg-blue-600 text-white rounded-xl shadow-lg p-6 flex flex-col justify-between">
            <div class="text-sm font-medium">Total Bookings</div>
            <div class="text-2xl font-bold">{{ $bookings->count() }}</div>
        </div>

        <!-- Total Invoices -->
        <div class="bg-green-600 text-white rounded-xl shadow-lg p-6 flex flex-col justify-between">
            <div class="text-sm font-medium">Total Invoices</div>
            <div class="text-2xl font-bold">{{ $bookings->where('invoice', '!=', null)->count() }}</div>
        </div>

        <!-- Unpaid Invoices -->
        <div class="bg-red-600 text-white rounded-xl shadow-lg p-6 flex flex-col justify-between">
            <div class="text-sm font-medium">Unpaid Invoices</div>
            <div class="text-2xl font-bold">{{ $bookings->filter(fn($b) => $b->invoice && $b->invoice->payment_status != 'paid')->count() }}</div>
        </div>
    </div>


    <!-- Table Container -->
    <div class="overflow-x-auto bg-white rounded-2xl shadow-xl border border-gray-200">
        <table class="min-w-full border-collapse text-sm">
            <thead class="bg-gradient-to-r from-gray-800 to-gray-900 text-white uppercase sticky top-0">
                <tr>
                    <th class="py-3 px-4 text-left border-b font-medium">#</th>
                    <th class="py-3 px-4 text-left border-b font-medium">Client Name</th>
                    <th class="py-3 px-4 text-left border-b font-medium">Service</th>
                    <th class="py-3 px-4 text-left border-b font-medium">Booking Date</th>
                    <th class="py-3 px-4 text-left border-b font-medium">Invoice Number</th>
                    <th class="py-3 px-4 text-left border-b font-medium">Amount</th>
                    <th class="py-3 px-4 text-left border-b font-medium">Payment Status</th>
                    <th class="py-3 px-4 text-left border-b font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($bookings as $booking)
                    <tr class="bg-white even:bg-gray-50 hover:bg-gray-100 hover:shadow-md transition-all rounded-lg">
                        <td class="py-3 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4 border-b font-medium">{{ $booking->name }}</td>
                        <td class="py-3 px-4 border-b">{{ $booking->service }}</td>
                        <td class="py-3 px-4 border-b">{{ $booking->booking_datetime }}</td>
                       <td class="py-3 px-4 border-b font-medium">
                            {{ $booking->invoice ? $booking->invoice->invoice_number : 'N/A' }}
                        </td>
                        <td class="py-3 px-4 border-b">
                            {{ $booking->invoice ? number_format($booking->invoice->total_amount, 2) : 'N/A' }}
                        </td>
                        <td class="py-3 px-4 border-b">
                            @if($booking->invoice)
                                @if($booking->invoice->payment_status == 'paid')
                                    <span class="inline-block px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full shadow-sm">Paid</span>
                                @else
                                    <span class="inline-block px-3 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full shadow-sm">Pending</span>
                                @endif
                            @else
                                <span class="text-gray-400 text-sm italic">No Invoice</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 border-b flex gap-2">
                            @if($booking->invoice)
                                <a href="{{ route('admin.invoices.show', $booking->invoice) }}"
                                   class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm transition flex items-center gap-1 shadow-md">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            @else
                                <a href="{{ route('admin.invoices.create', ['booking_id' => $booking->id]) }}"
                                   class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded-lg text-sm transition flex items-center gap-1 shadow-md">
                                    <i class="fas fa-plus"></i> Create Invoice
                                </a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="py-6 text-center text-gray-500 italic">No bookings found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
