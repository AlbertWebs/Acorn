@extends('layouts.admin')

@section('page-title', 'Invoice Details')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4 flex items-center gap-2">
        <i class="fas fa-file-invoice text-gold"></i> Invoice #{{ $invoice->id }}
    </h2>

    <div class="mb-4">
        <a href="{{ route('admin.invoices.print', $invoice->id) }}"
           class="px-4 py-2 bg-gold text-white rounded hover:bg-yellow-600 inline-flex items-center gap-2">
            <i class="fas fa-print"></i> Print
        </a>
    </div>

    <p><strong>Client:</strong> {{ $invoice->client_name ?? optional($invoice->user)->name ?? 'N/A' }}</p>
    <p><strong>Email:</strong> {{ $invoice->client_email ?? optional($invoice->user)->email ?? 'N/A' }}</p>
    <p><strong>Phone:</strong> {{ $invoice->client_phone ?? 'N/A' }}</p>

    <hr class="my-4">

    <p><strong>Invoice Number:</strong> {{ $invoice->invoice_number }}</p>
    <p><strong>Invoice Date:</strong> {{ optional($invoice->invoice_date)->format('d M Y') ?? '—' }}</p>
    <p><strong>Due Date:</strong> {{ optional($invoice->due_date)->format('d M Y') ?? '—' }}</p>

    <hr class="my-4">

    <p><strong>Service:</strong> {{ $invoice->service_type ?? '—' }}</p>
    <p><strong>Hours:</strong> {{ $invoice->hours ?? 0 }}</p>
    <p><strong>Rate per Hour:</strong> {{ number_format($invoice->rate_per_hour ?? 0, 2) }}</p>
    <p><strong>Subtotal:</strong> {{ number_format($invoice->subtotal ?? 0, 2) }}</p>
    <p><strong>Tax:</strong> {{ number_format($invoice->tax_amount ?? 0, 2) }}</p>
    <p><strong>Total:</strong> {{ number_format($invoice->total_amount ?? 0, 2) }}</p>

    <hr class="my-4">

    <p><strong>Payment Method:</strong> {{ ucfirst($invoice->payment_method ?? '—') }}</p>
    <p><strong>Payment Status:</strong> {{ ucfirst($invoice->payment_status ?? 'unpaid') }}</p>
    <p><strong>Status:</strong> {{ ucfirst($invoice->status ?? 'draft') }}</p>
</div>
@endsection
