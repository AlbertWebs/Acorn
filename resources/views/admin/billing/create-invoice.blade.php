@extends('layouts.admin')

@section('page-title', 'Create Invoice')

@section('content')
<div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow">
	<h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
		<i class="fas fa-file-invoice text-gold"></i>
		Create New Invoice
	</h2>

	@if (session('error'))
		<div class="mb-4 p-3 rounded bg-red-50 text-red-700 border border-red-200">
			{{ session('error') }}
		</div>
	@endif

	@if ($errors->any())
		<div class="mb-4 p-3 rounded bg-red-50 text-red-700 border border-red-200">
			<div class="font-semibold mb-2">Please fix the following errors:</div>
			<ul class="list-disc list-inside text-sm">
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form action="{{ route('admin.invoices.store') }}" method="POST">
		@csrf

		{{-- Basic invoice info --}}
		<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
			<div>
				<label class="block text-sm font-semibold mb-1">Invoice Number</label>
				<input type="text" name="invoice_number" value="{{ old('invoice_number') }}" class="w-full border-gray-300 rounded-md" placeholder="Auto-generated (e.g., ACORN-INV-001) if left blank">
			</div>
			<div>
				<label class="block text-sm font-semibold mb-1">Invoice Date</label>
				<input type="date" name="invoice_date" id="invoice_date" value="{{ old('invoice_date', now()->toDateString()) }}" class="w-full border-gray-300 rounded-md">
			</div>
			<div>
				<label class="block text-sm font-semibold mb-1">Due Date</label>
				<input type="date" name="due_date" value="{{ old('due_date') }}" class="w-full border-gray-300 rounded-md">
			</div>
		</div>

		{{-- Client info (manual input) --}}
		<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
			<div>
				<label class="block text-sm font-semibold mb-1">Client Name</label>
				<input type="text" name="client_name" value="{{ old('client_name') }}" class="w-full border-gray-300 rounded-md" placeholder="Full name">
			</div>
			<div>
				<label class="block text-sm font-semibold mb-1">Client Email</label>
				<input type="email" name="client_email" value="{{ old('client_email') }}" class="w-full border-gray-300 rounded-md" placeholder="email@example.com">
			</div>
			<div>
				<label class="block text-sm font-semibold mb-1">Client Phone</label>
				<input type="text" name="client_phone" value="{{ old('client_phone') }}" class="w-full border-gray-300 rounded-md" placeholder="Phone number">
			</div>
		</div>

		{{-- Dates moved into Basic invoice info above --}}

		{{-- Items (multiple) --}}
		<div class="mb-4">
			<label class="block text-sm font-semibold mb-2">Items</label>
			<div id="items-container"></div>
			<button type="button" id="add-item" class="mt-2 px-3 py-1 border border-gray-300 rounded-md text-sm hover:bg-gray-50">Add Item</button>
			<input type="hidden" name="item_name" id="item_name_hidden" value="{{ old('item_name') }}">
		</div>

		<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
			<div>
				<label class="block text-sm font-semibold mb-1">Subtotal</label>
				<input type="number" step="0.01" name="subtotal" id="subtotal" value="{{ old('subtotal') }}" class="w-full border-gray-300 rounded-md bg-gray-50" readonly>
			</div>
			<div>
				<label class="block text-sm font-semibold mb-1">Tax Amount</label>
				<input type="number" step="0.01" name="tax_amount" id="tax_amount" value="{{ old('tax_amount', '0.00') }}" class="w-full border-gray-300 rounded-md">
			</div>
			<div>
				<label class="block text-sm font-semibold mb-1">Total Amount</label>
				<input type="number" step="0.01" name="total_amount" id="total_amount" value="{{ old('total_amount') }}" class="w-full border-gray-300 rounded-md bg-gray-50 font-semibold" readonly>
			</div>
		</div>

		{{-- You can add tax below; totals are auto-calculated from items --}}

		{{-- Advanced fields removed to keep form focused on essentials --}}

		<div class="mt-8">
			<button type="submit"
					class="px-6 py-2 bg-gold text-white font-semibold rounded hover:bg-yellow-600">
				Save Invoice
			</button>
		</div>
	</form>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const itemsContainer = document.getElementById('items-container');
		const addItemBtn = document.getElementById('add-item');
		const subtotalInput = document.getElementById('subtotal');
		const taxInput = document.getElementById('tax_amount');
		const totalInput = document.getElementById('total_amount');
		const itemNameHidden = document.getElementById('item_name_hidden');

		function toNumber(value) {
			const n = parseFloat(value);
			return isNaN(n) ? 0 : n;
		}

		function createItemRow(name = '', qty = 1, unit = 0) {
			const row = document.createElement('div');
			row.className = 'item-row grid grid-cols-1 md:grid-cols-7 gap-4 mb-2';

			row.innerHTML = `
				<div class="md:col-span-4">
					<input type="text" name="items[][name]" value="${name}" class="w-full border-gray-300 rounded-md" placeholder="Item name/description">
				</div>
				<div>
					<input type="number" min="1" step="1" name="items[][quantity]" value="${qty}" class="w-full border-gray-300 rounded-md" placeholder="Qty">
				</div>
				<div>
					<input type="number" step="0.01" name="items[][unit_price]" value="${unit}" class="w-full border-gray-300 rounded-md" placeholder="Unit price">
				</div>
				<div class="flex items-center">
					<button type="button" class="remove-item px-3 py-1 border border-gray-300 rounded-md text-sm hover:bg-gray-50">Remove</button>
				</div>
			`;

			row.querySelectorAll('input').forEach(inp => {
				inp.addEventListener('input', recalc);
				inp.addEventListener('change', recalc);
			});

			row.querySelector('.remove-item').addEventListener('click', () => {
				row.remove();
				recalc();
			});

			return row;
		}

		function recalc() {
			let subtotal = 0;
			const summary = [];
			const rows = itemsContainer.querySelectorAll('.item-row');
			rows.forEach(r => {
				const name = (r.querySelector('input[name="items[][name]"]').value || '').trim();
				const qty = Math.max(0, toNumber(r.querySelector('input[name="items[][quantity]"]').value));
				const unit = Math.max(0, toNumber(r.querySelector('input[name="items[][unit_price]"]').value));
				const line = qty * unit;
				subtotal += line;
				if (name) {
					summary.push(`${name} x${qty} @ ${unit.toFixed(2)}`);
				}
			});

			subtotalInput.value = subtotal.toFixed(2);
			const tax = Math.max(0, toNumber(taxInput.value));
			totalInput.value = (subtotal + tax).toFixed(2);
			itemNameHidden.value = summary.join('; ');
		}

		addItemBtn.addEventListener('click', () => {
			itemsContainer.appendChild(createItemRow());
			recalc();
		});

		// Initialize with one empty row
		itemsContainer.appendChild(createItemRow());
		recalc();

		// Ensure invoice date defaults to today if empty
		const invoiceDate = document.getElementById('invoice_date');
		if (invoiceDate && !invoiceDate.value) {
			const d = new Date();
			const yyyy = d.getFullYear();
			const mm = String(d.getMonth() + 1).padStart(2, '0');
			const dd = String(d.getDate()).padStart(2, '0');
			invoiceDate.value = `${yyyy}-${mm}-${dd}`;
		}

		['input', 'change'].forEach(evt => {
			taxInput.addEventListener(evt, recalc);
		});
	});
</script>
@endsection
