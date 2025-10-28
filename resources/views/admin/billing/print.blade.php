@extends('layouts.admin')

@section('page-title', 'Print Invoice')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded shadow print:bg-white">
    <div class="flex items-center justify-between mb-6 print:hidden no-print">
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

	<div class="print-frame border-2 border-gray-300 p-6 rounded-lg">
		@php
			$setting = \App\Models\Setting::query()->first();
			$logoUrl = $setting && $setting->logo ? asset('/storage/'.$setting->logo) : asset('main-html/assets/images/resources/logo-1.png');
		@endphp
        <div class="flex items-start justify-between mb-6">
			<div>
				<img src="{{ $logoUrl }}" alt="Company logo" class="h-14 w-auto max-h-16 object-contain mb-2">
				<div class="text-2xl font-extrabold tracking-tight leading-tight">Acorn Special Tutorials</div>
				<div class="text-sm text-gray-600">P.O. Box 12345 - 00100, Nairobi</div>
				<div class="text-sm text-gray-600">info@acorn.co.ke • +254 700 000000</div>
			</div>
		<div class="text-right border rounded p-3 bg-gray-50">
				<div class="text-xs uppercase tracking-widest text-gray-500">Invoice</div>
				<div class="text-lg font-bold">{{ $invoice->invoice_number ?? ('#'.$invoice->id) }}</div>
				<div class="text-sm text-gray-600">Date: {{ optional($invoice->invoice_date)->format('d M Y') ?? '—' }}</div>
				<div class="text-sm text-gray-600">Due: {{ optional($invoice->due_date)->format('d M Y') ?? '—' }}</div>
			</div>
        </div>

		<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <div class="font-semibold mb-1">Billed To</div>
                <div>{{ $invoice->client_name ?? optional($invoice->user)->name }}</div>
                <div class="text-sm text-gray-600">{{ $invoice->client_email ?? optional($invoice->user)->email }}</div>
                <div class="text-sm text-gray-600">{{ $invoice->client_phone }}</div>
            </div>
            <div class="md:text-right">
                <div><span class="font-semibold">Due Date:</span> {{ optional($invoice->due_date)->format('d M Y') ?? '—' }}</div>
                <div><span class="font-semibold">Invoice Status:</span> {{ ucfirst($invoice->status ?? 'draft') }}</div>
                <div><span class="font-semibold">Payment Status:</span> {{ ucfirst($invoice->payment_status ?? 'unpaid') }}</div>
                <!-- <div><span class="font-semibold">Payment Method:</span> {{ ucfirst($invoice->payment_method ?? '—') }}</div>
                <div class="text-sm text-gray-600"><span class="font-semibold">Txn Ref:</span> {{ $invoice->transaction_reference ?? '—' }}</div> -->
            </div>
        </div>

		@php
			$itemsSummary = trim((string)($invoice->item_name ?? ''));
			$lines = $itemsSummary !== '' ? array_filter(array_map('trim', explode(';', $itemsSummary))) : [];
			$parsedItems = [];
			foreach ($lines as $line) {
				if (preg_match('/^(.*?)\sx(\d+)\s@\s([0-9]+(?:\.[0-9]{1,2})?)$/', $line, $m)) {
					$parsedItems[] = [
						'desc' => trim($m[1]),
						'qty' => (int) $m[2],
						'unit' => (float) $m[3],
					];
				} else {
					$parsedItems[] = [ 'desc' => $line, 'qty' => null, 'unit' => null ];
				}
			}
		@endphp

		<table class="w-full text-sm border-t border-b">
            <thead class="bg-gray-100">
                <tr>
					<th class="text-left p-3">Description</th>
					<th class="text-right p-3">Qty</th>
					<th class="text-right p-3">Unit Price</th>
					<th class="text-right p-3">Amount</th>
                </tr>
            </thead>
            <tbody>
				@if (!empty($parsedItems))
					@foreach ($parsedItems as $it)
						@php
							$amount = ($it['qty'] !== null && $it['unit'] !== null) ? ($it['qty'] * $it['unit']) : null;
						@endphp
						<tr class="border-t">
							<td class="p-3">{{ $it['desc'] }}</td>
							<td class="p-3 text-right">{{ $it['qty'] !== null ? $it['qty'] : '—' }}</td>
							<td class="p-3 text-right">{{ $it['unit'] !== null ? ('Ksh '.number_format($it['unit'], 2)) : '—' }}</td>
							<td class="p-3 text-right">{{ $amount !== null ? ('Ksh '.number_format($amount, 2)) : '—' }}</td>
						</tr>
					@endforeach
				@else
					<tr class="border-t">
						<td class="p-3" colspan="4">No items</td>
					</tr>
				@endif
            </tbody>
        </table>

		<div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
			<div>
				<div class="font-semibold mb-2">Notes</div>
				<div class="text-sm text-gray-700 leading-6">
					Thank you for your business. Please make payment by the due date. For M-Pesa, use Paybill 123456, Account: INV.
				</div>
			</div>
			<div class="w-full md:w-2/3 md:ml-auto">
				<table class="w-full text-sm">
					<tr>
						<td class="p-2 text-right font-semibold">Subtotal</td>
						<td class="p-2 text-right">Ksh {{ number_format($invoice->subtotal ?? 0, 2) }}</td>
					</tr>
					<tr>
						<td class="p-2 text-right font-semibold">Tax</td>
						<td class="p-2 text-right">Ksh {{ number_format($invoice->tax_amount ?? 0, 2) }}</td>
					</tr>
					<tr>
						<td class="p-2 text-right font-bold border-t">Total</td>
						<td class="p-2 text-right font-bold border-t">Ksh {{ number_format($invoice->total_amount ?? 0, 2) }}</td>
					</tr>
				</table>
			</div>
		</div>

		<div class="mt-8 text-center text-sm bg-gray-50 border rounded py-3">
			We appreciate your prompt payment. For any queries, contact us at info@acorn.co.ke
		</div>

        <div class="mt-10 text-xs text-gray-500 border-t pt-4">
            Generated on {{ now()->format('d M Y H:i') }} • Invoice ID: {{ $invoice->id }}
        </div>
    </div>
</div>

<style>
@page {
	margin: 10mm;
}
@media print {
	.print\:hidden { display: none !important; }
	.no-print { display: none !important; }
	.print\:bg-white { background: #fff !important; }
	body { background: #fff !important; color: #000; }
	.shadow, .rounded { box-shadow: none !important; }
	.print-frame { border: 2px solid #000 !important; width: 100% !important; padding: 8mm !important; }
	.print-frame { font-size: 12px !important; }
	.print-frame .text-2xl { font-size: 1.25rem !important; }
	.print-frame .mb-6 { margin-bottom: 12px !important; }
	.print-frame .gap-6 { gap: 12px !important; }
	.print-frame .p-3 { padding: 6px !important; }
	.print-frame table th, .print-frame table td { padding: 6px !important; }

	/* Only print the main frame */
	body * { visibility: hidden !important; }
	.print-frame, .print-frame * { visibility: visible !important; }
	.print-frame { position: absolute !important; left: 0; top: 0; right: 0; margin: 0 auto !important; }
	/* Hide admin header (contains Welcome text) in print */
	main .p-6 > header { display: none !important; }
	/* Avoid breaking rows across pages */
	table { page-break-inside: auto; }
	tr { page-break-inside: avoid; page-break-after: auto; }
	thead { display: table-header-group; }
	tfoot { display: table-footer-group; }
}
</style>
@endsection


