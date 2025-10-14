@extends('layouts.admin')

@section('page-title', 'Print Invoice')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded shadow print:bg-white">
    <div class="flex items-center justify-between mb-6 print:hidden">
        <h2 class="text-2xl font-bold flex items-center gap-2">
            <i class="fas fa-print text-gold"></i>
            Print Invoice
        </h2>
        <div class="flex gap-2">
            <a href="{{ route('admin.invoices.show', $invoice->id) }}" class="px-4 py-2 border rounded">Back</a>
            <button onclick="window.print()" class="px-4 py-2 bg-gold text-white rounded hover:bg-yellow-600">
                Print
            </button>
        </div>
    </div>

    <div class="border p-6 rounded">
        <div class="flex items-start justify-between mb-6">
            <div>
                <div class="text-xl font-bold">Acorn Special Tutorials</div>
                <div class="text-sm text-gray-600">P.O. Box 12345 - 00100, Nairobi</div>
                <div class="text-sm text-gray-600">info@acorn.co.ke • +254 700 000000</div>
            </div>
            <div class="text-right">
                <div class="text-sm text-gray-500">Invoice #</div>
                <div class="text-lg font-semibold">{{ $invoice->invoice_number }}</div>
                <div class="text-sm text-gray-600">{{ optional($invoice->invoice_date)->format('d M Y') }}</div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div>
                <div class="font-semibold mb-1">Billed To</div>
                <div>{{ $invoice->client_name ?? optional($invoice->user)->name }}</div>
                <div class="text-sm text-gray-600">{{ $invoice->client_email ?? optional($invoice->user)->email }}</div>
                <div class="text-sm text-gray-600">{{ $invoice->client_phone }}</div>
            </div>
            <div>
                <div class="font-semibold mb-1">Consultant</div>
                <div>
                    @if(isset($invoice->consultant_id) && $invoice->consultant_id)
                        ID: {{ $invoice->consultant_id }}
                    @else
                        —
                    @endif
                </div>
                <div class="text-sm text-gray-600">Appointment ID: {{ $invoice->appointment_id ?? '—' }}</div>
                <div class="text-sm text-gray-600">Service: {{ $invoice->service_type ?? '—' }}</div>
            </div>
            <div class="md:text-right">
                <div><span class="font-semibold">Due Date:</span> {{ optional($invoice->due_date)->format('d M Y') ?? '—' }}</div>
                <div><span class="font-semibold">Invoice Status:</span> {{ ucfirst($invoice->status ?? 'draft') }}</div>
                <div><span class="font-semibold">Payment Status:</span> {{ ucfirst($invoice->payment_status ?? 'unpaid') }}</div>
                <div><span class="font-semibold">Payment Method:</span> {{ ucfirst($invoice->payment_method ?? '—') }}</div>
                <div class="text-sm text-gray-600"><span class="font-semibold">Txn Ref:</span> {{ $invoice->transaction_reference ?? '—' }}</div>
            </div>
        </div>

        <table class="w-full text-sm border-t border-b">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left p-3">Description</th>
                    <th class="text-right p-3">Hours</th>
                    <th class="text-right p-3">Rate</th>
                    <th class="text-right p-3">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t">
                    <td class="p-3">{{ $invoice->service_type ?? 'Service' }}</td>
                    <td class="p-3 text-right">{{ $invoice->hours ?? 1 }}</td>
                    <td class="p-3 text-right">{{ number_format($invoice->rate_per_hour ?? 0, 2) }}</td>
                    <td class="p-3 text-right">{{ number_format($invoice->subtotal ?? 0, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <div class="font-semibold mb-2">Notes</div>
                <div class="text-sm text-gray-700 leading-6">
                    Thank you for your business. Please make payment by the due date. For M-Pesa, use Paybill 123456, Account: INV.
                </div>
            </div>
            <div class="flex flex-col items-end gap-1">
                <div><span class="font-semibold">Subtotal:</span> {{ number_format($invoice->subtotal ?? 0, 2) }}</div>
                <div><span class="font-semibold">Tax:</span> {{ number_format($invoice->tax_amount ?? 0, 2) }}</div>
                <div class="text-lg font-bold">Total: Ksh {{ number_format($invoice->total_amount ?? 0, 2) }}</div>
            </div>
        </div>

        <div class="mt-10 text-xs text-gray-500 border-t pt-4">
            Generated on {{ now()->format('d M Y H:i') }} • Invoice ID: {{ $invoice->id }}
        </div>
    </div>
</div>

<style>
@media print {
    .print\:hidden { display: none !important; }
    .print\:bg-white { background: #fff !important; }
}
</style>
@endsection


