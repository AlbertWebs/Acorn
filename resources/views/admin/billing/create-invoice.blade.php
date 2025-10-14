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
        {{-- Relations (optional) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block text-sm font-semibold mb-2">Appointment ID (optional)</label>
                <input type="number" name="appointment_id" value="{{ old('appointment_id') }}" class="w-full border-gray-300 rounded-md" placeholder="e.g., 123">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2">User</label>
                <select name="user_id" class="w-full border-gray-300 rounded-md">
                    <option value="">-- Choose User --</option>
                    @isset($users)
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    @endisset
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2">Consultant</label>
                <select name="consultant_id" class="w-full border-gray-300 rounded-md">
                    <option value="">-- Choose Consultant --</option>
                    @isset($consultants)
                        @foreach ($consultants as $consultant)
                            <option value="{{ $consultant->id }}" {{ old('consultant_id') == $consultant->id ? 'selected' : '' }}>{{ $consultant->name }} ({{ $consultant->email }})</option>
                        @endforeach
                    @endisset
                </select>
            </div>
        </div>

        {{-- Client fallback info --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block text-sm font-semibold mb-1">Client Name</label>
                <input type="text" name="client_name" value="{{ old('client_name') }}" class="w-full border-gray-300 rounded-md" placeholder="Full name">
                @error('client_name')<div class="text-xs text-red-600 mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Client Email</label>
                <input type="email" name="client_email" value="{{ old('client_email') }}" class="w-full border-gray-300 rounded-md" placeholder="email@example.com">
                @error('client_email')<div class="text-xs text-red-600 mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Client Phone</label>
                <input type="text" name="client_phone" value="{{ old('client_phone') }}" class="w-full border-gray-300 rounded-md" placeholder="Phone number">
                @error('client_phone')<div class="text-xs text-red-600 mt-1">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- Invoice details --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block text-sm font-semibold mb-1">Invoice Number</label>
                <input type="text" name="invoice_number" value="{{ old('invoice_number') }}" class="w-full border-gray-300 rounded-md" placeholder="Auto-generated if left blank">
                @error('invoice_number')<div class="text-xs text-red-600 mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Invoice Date</label>
                <input type="date" name="invoice_date" value="{{ old('invoice_date') }}" class="w-full border-gray-300 rounded-md">
                @error('invoice_date')<div class="text-xs text-red-600 mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Due Date</label>
                <input type="date" name="due_date" value="{{ old('due_date') }}" class="w-full border-gray-300 rounded-md">
                @error('due_date')<div class="text-xs text-red-600 mt-1">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- Service details --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold mb-1">Service Type</label>
                <input type="text" name="service_type" value="{{ old('service_type') }}" class="w-full border-gray-300 rounded-md" placeholder="e.g., Consultation">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Hours</label>
                <input type="number" min="1" step="1" name="hours" id="hours" value="{{ old('hours', 1) }}" class="w-full border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Rate per Hour</label>
                <input type="number" step="0.01" name="rate_per_hour" id="rate_per_hour" value="{{ old('rate_per_hour') }}" class="w-full border-gray-300 rounded-md">
            </div>
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
                @error('total_amount')<div class="text-xs text-red-600 mt-1">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- Payment details --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block text-sm font-semibold mb-1">Payment Method</label>
                <select name="payment_method" class="w-full border-gray-300 rounded-md">
                    <option value="">-- Select Method --</option>
                    <option value="mpesa" {{ old('payment_method')==='mpesa' ? 'selected' : '' }}>M-Pesa</option>
                    <option value="bank_transfer" {{ old('payment_method')==='bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                    <option value="cash" {{ old('payment_method')==='cash' ? 'selected' : '' }}>Cash</option>
                    <option value="card" {{ old('payment_method')==='card' ? 'selected' : '' }}>Card</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Payment Status</label>
                <select name="payment_status" class="w-full border-gray-300 rounded-md">
                    <option value="unpaid" {{ old('payment_status')==='unpaid' ? 'selected' : '' }}>Unpaid</option>
                    <option value="partial" {{ old('payment_status')==='partial' ? 'selected' : '' }}>Partial</option>
                    <option value="paid" {{ old('payment_status')==='paid' ? 'selected' : '' }}>Paid</option>
                    <option value="refunded" {{ old('payment_status')==='refunded' ? 'selected' : '' }}>Refunded</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Transaction Reference</label>
                <input type="text" name="transaction_reference" value="{{ old('transaction_reference') }}" class="w-full border-gray-300 rounded-md" placeholder="e.g., MPN123ABC">
            </div>
        </div>

        {{-- Invoice status --}}
        <div class="mb-6">
            <label class="block text-sm font-semibold mb-1">Invoice Status</label>
            <select name="status" class="w-full border-gray-300 rounded-md">
                <option value="draft" {{ old('status','draft')==='draft' ? 'selected' : '' }}>Draft</option>
                <option value="sent" {{ old('status')==='sent' ? 'selected' : '' }}>Sent</option>
                <option value="paid" {{ old('status')==='paid' ? 'selected' : '' }}>Paid</option>
                <option value="cancelled" {{ old('status')==='cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        {{-- Submit --}}
        <div class="mt-8">
            <button type="submit"
                    class="px-6 py-2 bg-gold text-white font-semibold rounded hover:bg-yellow-600">
                Save Invoice
            </button>
        </div>
    </form>
</div>

{{-- Auto-calculate subtotal and total --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hoursInput = document.getElementById('hours');
        const rateInput = document.getElementById('rate_per_hour');
        const subtotalInput = document.getElementById('subtotal');
        const taxInput = document.getElementById('tax_amount');
        const totalInput = document.getElementById('total_amount');

        function toNumber(value) {
            const n = parseFloat(value);
            return isNaN(n) ? 0 : n;
        }

        function recalc() {
            const hours = Math.max(0, toNumber(hoursInput.value));
            const rate = Math.max(0, toNumber(rateInput.value));
            const tax = Math.max(0, toNumber(taxInput.value));
            const subtotal = hours * rate;
            subtotalInput.value = subtotal.toFixed(2);
            totalInput.value = (subtotal + tax).toFixed(2);
        }

        ['input', 'change'].forEach(evt => {
            hoursInput.addEventListener(evt, recalc);
            rateInput.addEventListener(evt, recalc);
            taxInput.addEventListener(evt, recalc);
        });
    });
</script>
@endsection
