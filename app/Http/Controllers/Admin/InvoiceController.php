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
        $users = User::where('role', 'client')->get();
        $consultants = User::where('role', 'consultant')->get();
        return view('admin.billing.create-invoice', compact('users','consultants'));
    }

    public function index(){
        $invoices = Invoice::with(['user'])->latest()->paginate(10);
        return view('admin.billing.index', compact('invoices'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                // Relations
                'appointment_id' => 'nullable|integer',
                'user_id' => 'nullable|integer|exists:users,id',
                'consultant_id' => 'nullable|integer',

                // Client fallback
                'client_name' => 'nullable|string|max:255',
                'client_email' => 'nullable|email|max:255',
                'client_phone' => 'nullable|string|max:50',

                // Invoice details
                'invoice_number' => 'nullable|string|max:255|unique:invoices,invoice_number',
                'invoice_date' => 'nullable|date',
                'due_date' => 'nullable|date|after_or_equal:invoice_date',

                // Service details
                'service_type' => 'nullable|string|max:255',
                'hours' => 'nullable|integer|min:1',
                'rate_per_hour' => 'nullable|numeric|min:0',
                'subtotal' => 'nullable|numeric|min:0',
                'tax_amount' => 'nullable|numeric|min:0',
                'total_amount' => 'required|numeric|min:0',

                // Payment details
                'payment_method' => 'nullable|in:mpesa,bank_transfer,cash,card',
                'payment_status' => 'nullable|in:unpaid,partial,paid,refunded',
                'transaction_reference' => 'nullable|string|max:255',

                // Status
                'status' => 'nullable|in:draft,sent,paid,cancelled',
            ]);

            // Coerce invalid appointment_id to null if it doesn't exist
            $appointmentId = $validated['appointment_id'] ?? null;
            if ($appointmentId && ! DB::table('appointments')->where('id', $appointmentId)->exists()) {
                $appointmentId = null;
            }

            // Coerce invalid consultant_id to null if it doesn't exist
            $consultantId = $validated['consultant_id'] ?? null;
            if ($consultantId && ! DB::table('users')->where('id', $consultantId)->exists()) {
                $consultantId = null;
            }

            $invoiceNumber = $validated['invoice_number'] ?? $this->generateInvoiceNumber();

            $invoice = Invoice::create([
                'appointment_id' => $appointmentId,
                'user_id' => $request->user_id,
                'consultant_id' => $consultantId,

                'client_name' => $request->client_name,
                'client_email' => $request->client_email,
                'client_phone' => $request->client_phone,

                'invoice_number' => $invoiceNumber,
                'invoice_date' => $request->invoice_date ? Carbon::parse($request->invoice_date) : now(),
                'due_date' => $request->due_date,

                'service_type' => $request->service_type,
                'hours' => $request->hours ?? 1,
                'rate_per_hour' => $request->rate_per_hour,
                'subtotal' => $request->subtotal,
                'tax_amount' => $request->tax_amount ?? 0.00,
                'total_amount' => $request->total_amount,

                'payment_method' => $request->payment_method,
                'payment_status' => $request->payment_status ?? 'unpaid',
                'transaction_reference' => $request->transaction_reference,

                'status' => $request->status ?? 'draft',
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
        $prefix = 'INV-'.date('Ymd').'-';
        do {
            $number = $prefix . str_pad((string)random_int(0, 9999), 4, '0', STR_PAD_LEFT);
        } while (\App\Models\Invoice::where('invoice_number', $number)->exists());
        return $number;
    }

    public function print($id)
    {
        $invoice = Invoice::with('user')->findOrFail($id);
        return view('admin.billing.print', compact('invoice'));
    }

}
