@extends('layouts.admin')

@section('page-title', 'Edit Invoice')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
        <i class="fas fa-file-invoice text-gold"></i>
        Edit Invoice #{{ $invoice->id }}
    </h2>

    <form action="{{ route('admin.invoices.update', $invoice->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Relations (optional) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block text-sm font-semibold mb-2">Appointment ID (optional)</label>
                <input type="number" name="appointment_id" value="{{ old('appointment_id', $invoice->appointment_id) }}" class="w-full border-gray-300 rounded-md" placeholder="e.g., 123">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2">User</label>
                <select name="user_id" class="w-full border-gray-300 rounded-md">
                    <option value="">-- Choose User --</option>
                    @isset($users)
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ (old('user_id', $invoice->user_id) == $user->id) ? 'selected' : '' }}>{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    @endisset
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2">Consultant</label>
                <select name="consultant_id" class="w-full border-gray-300 rounded-md">
                    <option value="">-- Choose Consultant --</option>
                    @isset($users)
                        @foreach ($users as $consultant)
                            @if ($consultant->role === 'consultant')
                                <option value="{{ $consultant->id }}" {{ (old('consultant_id', $invoice->consultant_id) == $consultant->id) ? 'selected' : '' }}>{{ $consultant->name }} ({{ $consultant->email }})</option>
                            @endif
                        @endforeach
                    @endisset
                </select>
            </div>
        </div>

        {{-- Client fallback info --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block text-sm font-semibold mb-1">Client Name</label>
                <input type="text" name="client_name" value="{{ old('client_name', $invoice->client_name) }}" class="w-full border-gray-300 rounded-md" placeholder="Full name">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Client Email</label>
                <input type="email" name="client_email" value="{{ old('client_email', $invoice->client_email) }}" class="w-full border-gray-300 rounded-md" placeholder="email@example.com">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Client Phone</label>
                <input type="text" name="client_phone" value="{{ old('client_phone', $invoice->client_phone) }}" class="w-full border-gray-300 rounded-md" placeholder="Phone number">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block text-sm font-semibold mb-1">Invoice Number</label>
                <input type="text" name="invoice_number" value="{{ $invoice->invoice_number }}" class="w-full border-gray-300 rounded-md" required>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Invoice Date</label>
                <input type="date" name="invoice_date" value="{{ optional($invoice->invoice_date)->format('Y-m-d') }}" class="w-full border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Due Date</label>
                <input type="date" name="due_date" value="{{ optional($invoice->due_date)->format('Y-m-d') }}" class="w-full border-gray-300 rounded-md">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold mb-1">Service Type</label>
                <input type="text" name="service_type" value="{{ $invoice->service_type }}" class="w-full border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Hours</label>
                <input type="number" min="1" step="1" name="hours" value="{{ $invoice->hours }}" class="w-full border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Rate per Hour</label>
                <input type="number" step="0.01" name="rate_per_hour" value="{{ $invoice->rate_per_hour }}" class="w-full border-gray-300 rounded-md">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block text-sm font-semibold mb-1">Subtotal</label>
                <input type="number" step="0.01" name="subtotal" value="{{ $invoice->subtotal }}" class="w-full border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Tax Amount</label>
                <input type="number" step="0.01" name="tax_amount" value="{{ $invoice->tax_amount }}" class="w-full border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Total Amount</label>
                <input type="number" step="0.01" name="total_amount" value="{{ $invoice->total_amount }}" class="w-full border-gray-300 rounded-md">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block text-sm font-semibold mb-1">Payment Method</label>
                <select name="payment_method" class="w-full border-gray-300 rounded-md">
                    <option value="" {{ $invoice->payment_method ? '' : 'selected' }}>-- Select Method --</option>
                    @foreach (['mpesa','bank_transfer','cash','card'] as $method)
                        <option value="{{ $method }}" {{ $invoice->payment_method === $method ? 'selected' : '' }}>{{ ucfirst($method) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Payment Status</label>
                <select name="payment_status" class="w-full border-gray-300 rounded-md">
                    @foreach (['unpaid','partial','paid','refunded'] as $ps)
                        <option value="{{ $ps }}" {{ $invoice->payment_status === $ps ? 'selected' : '' }}>{{ ucfirst($ps) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Transaction Reference</label>
                <input type="text" name="transaction_reference" value="{{ $invoice->transaction_reference }}" class="w-full border-gray-300 rounded-md">
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-semibold mb-1">Invoice Status</label>
            <select name="status" class="w-full border-gray-300 rounded-md">
                @foreach (['draft','sent','paid','cancelled'] as $st)
                    <option value="{{ $st }}" {{ $invoice->status === $st ? 'selected' : '' }}>{{ ucfirst($st) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-8">
            <button type="submit" class="px-6 py-2 bg-gold text-white font-semibold rounded hover:bg-yellow-600">Update Invoice</button>
        </div>
    </form>
</div>
@endsection
