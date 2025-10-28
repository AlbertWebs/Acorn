<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function create()
    {
        return view('admin.billing.create-invoice');
    }

    public function index(){
        $invoices = Invoice::with(['user'])->latest()->paginate(10);
        return view('admin.billing.index', compact('invoices'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                // Client
                'client_name' => 'nullable|string|max:255',
                'client_email' => 'nullable|email|max:255',
                'client_phone' => 'nullable|string|max:50',

                // Invoice
                'invoice_number' => 'nullable|string|max:255|unique:invoices,invoice_number',
                'invoice_date' => 'nullable|date',
                'due_date' => 'nullable|date|after_or_equal:invoice_date',

                // Generic item
                'item_name' => 'nullable|string|max:255',
                'quantity' => 'nullable|integer|min:1',
                'unit_price' => 'nullable|numeric|min:0',
                'subtotal' => 'nullable|numeric|min:0',
                'tax_amount' => 'nullable|numeric|min:0',
                'total_amount' => 'required|numeric|min:0',

                // Payment
                'payment_method' => 'nullable|in:mpesa,bank_transfer,cash,card',
                'payment_status' => 'nullable|in:unpaid,partial,paid,refunded',
                'transaction_reference' => 'nullable|string|max:255',

                // Status
                'status' => 'nullable|in:draft,sent,paid,cancelled',

                // Polymorphic billable (optional)
                'billable_type' => 'nullable|string|max:255',
                'billable_id' => 'nullable|integer',
            ]);

            $rawInvoiceNumber = isset($validated['invoice_number']) ? trim((string)$validated['invoice_number']) : null;
            $invoiceNumber = ($rawInvoiceNumber !== null && $rawInvoiceNumber !== '')
                ? $rawInvoiceNumber
                : $this->generateInvoiceNumber();

            // Normalize optional/advanced fields and compute safe totals
            $billableType = trim((string)($request->billable_type ?? '')) ?: null;
            $billableId = ($request->billable_id !== null && $request->billable_id !== '')
                ? (int)$request->billable_id
                : null;
            $transactionRef = trim((string)($request->transaction_reference ?? '')) ?: null;

            $invoiceDate = $request->invoice_date ? Carbon::parse($request->invoice_date) : now();
            $dueDate = $request->due_date ? Carbon::parse($request->due_date) : null;

            $quantity = ($request->quantity !== null && $request->quantity !== '') ? (int)$request->quantity : 1;
            $unitPrice = ($request->unit_price !== null && $request->unit_price !== '') ? (float)$request->unit_price : 0.0;
            $subtotal = ($request->subtotal !== null && $request->subtotal !== '') ? (float)$request->subtotal : (float)($quantity * $unitPrice);
            $taxAmount = ($request->tax_amount !== null && $request->tax_amount !== '') ? (float)$request->tax_amount : 0.0;
            $totalAmount = ($request->total_amount !== null && $request->total_amount !== '') ? (float)$request->total_amount : (float)($subtotal + $taxAmount);

            $paymentMethod = $request->payment_method ?: null;
            $paymentStatus = $request->payment_status ?: 'unpaid';
            $status = $request->status ?: 'draft';

            $invoice = Invoice::create([
                'client_name' => $request->client_name,
                'client_email' => $request->client_email,
                'client_phone' => $request->client_phone,

                'invoice_number' => $invoiceNumber,
                'invoice_date' => $invoiceDate,
                'due_date' => $dueDate,

                // Generic item
                'item_name' => $request->item_name,
                'quantity' => $quantity,
                'unit_price' => $unitPrice,
                'subtotal' => $subtotal,
                'tax_amount' => $taxAmount,
                'total_amount' => $totalAmount,

                'payment_method' => $paymentMethod,
                'payment_status' => $paymentStatus,
                'transaction_reference' => $transactionRef,

                'status' => $status,

                // Optional billable
                'billable_type' => $billableType,
                'billable_id' => $billableId,
            ]);

            return redirect()->route('admin.invoices.index')
                ->with('success', 'Invoice created successfully.');
        } catch (\Throwable $e) {
            Log::error('Invoice creation failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()
                ->withInput()
                ->with('error', 'Failed to create invoice. Please check the logs.');
        }
    }

    public function show($id)
{
    $invoice = Invoice::with(['user'])->findOrFail($id);
    return view('admin.billing.show', compact('invoice'));
}

    public function edit($id)
{
    $invoice = Invoice::findOrFail($id);
    $users = User::all();

    return view('admin.billing.edit', compact('invoice', 'users'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'invoice_number' => 'required|string|max:255|unique:invoices,invoice_number,' . $id,
        'invoice_date' => 'nullable|date',
        'due_date' => 'nullable|date|after_or_equal:invoice_date',
        'hours' => 'nullable|integer|min:1',
        'rate_per_hour' => 'nullable|numeric|min:0',
        'subtotal' => 'nullable|numeric|min:0',
        'tax_amount' => 'nullable|numeric|min:0',
        'total_amount' => 'required|numeric|min:0',
        'payment_method' => 'nullable|in:mpesa,bank_transfer,cash,card',
        'payment_status' => 'nullable|in:unpaid,partial,paid,refunded',
        'status' => 'nullable|in:draft,sent,paid,cancelled',
    ]);

    $invoice = Invoice::findOrFail($id);
    $invoice->update($request->only([
        'appointment_id','user_id','consultant_id',
        'client_name','client_email','client_phone',
        'invoice_number','invoice_date','due_date',
        'service_type','hours','rate_per_hour','subtotal','tax_amount','total_amount',
        'payment_method','payment_status','transaction_reference',
        'status'
    ]));

    return redirect()->route('admin.invoices.index')
        ->with('success', 'Invoice updated successfully.');
}

public function sendSms($id)
{
    $invoice = Invoice::with('user')->findOrFail($id);

    $clientName = $invoice->full_name ?? optional($invoice->user)->name ?? 'Customer';
    $recipient = $invoice->mpesa_number
               ?? optional($invoice->user)->phone
               ?? optional($invoice->user)->mobile
               ?? null;

    if (! $recipient) {
        return redirect()->back()->with('error', 'No phone number found for this invoice.');
    }

    $pickup = \Carbon\Carbon::parse($invoice->pickup_date)->format('d M Y');
    $dropoff = \Carbon\Carbon::parse($invoice->dropoff_date)->format('d M Y');

    $message = "Hello {$clientName}, your invoice for Ksh "
             . number_format($invoice->total_price, 0)
             . " is ready. Booking dates: {$pickup} to {$dropoff}.";

    try {
        // Simulate sending SMS (replace with real API)
        \Log::info("SMS to {$recipient}: {$message}");
        //SendSMSHere

        // Update the invoice status
        $invoice->update(['is_sent' => true]);

        return redirect()->back()->with('success', 'Invoice sent via SMS successfully.');
    } catch (\Throwable $e) {
        \Log::error('SMS sending failed', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Failed to send invoice SMS.');
    }
}

    protected function generateInvoiceNumber(): string
    {
        $prefix = 'ACORN-INV-';

        // Try to find the latest invoice with our prefix
        $lastWithPrefix = Invoice::where('invoice_number', 'like', $prefix . '%')
            ->orderBy('invoice_number', 'desc')
            ->first();

        $nextNumber = 1;
        $padLength = 3; // Keep at least 3 digits (001, 002, ...)

        if ($lastWithPrefix) {
            $suffix = substr($lastWithPrefix->invoice_number, strlen($prefix));
            $digits = (int) preg_replace('/\D+/', '', $suffix);
            $nextNumber = $digits + 1;
            $padLength = max($padLength, strlen((string) $digits));
        }

        // Ensure uniqueness in case of race conditions by retrying a few times
        for ($attempt = 0; $attempt < 5; $attempt++) {
            $candidate = $prefix . str_pad((string) $nextNumber, $padLength, '0', STR_PAD_LEFT);
            if (! Invoice::where('invoice_number', $candidate)->exists()) {
                return $candidate;
            }
            $nextNumber++;
        }

        // Fallback to a unique suffix if contention persists
        do {
            $candidate = $prefix . str_pad((string) random_int(1, 999), 3, '0', STR_PAD_LEFT);
        } while (Invoice::where('invoice_number', $candidate)->exists());

        return $candidate;
    }

    public function print($id)
    {
        $invoice = Invoice::with('user')->findOrFail($id);
        return view('admin.billing.print', compact('invoice'));
    }

}
