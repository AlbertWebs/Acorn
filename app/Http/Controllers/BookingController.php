<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Invoice;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Services\MpesaService;
use App\Models\MpesaStkPayment;

class BookingController extends Controller
{
    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'booking_datetime' => 'required|date',
            'service' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $booking = Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'booking_datetime' => $request->booking_datetime,
            'service' => $request->service,
            'additional_info' => $request->additional_info,
            'consultation_fee' => $request->consultation_fee,
            'payment_status' => 'Not Paid',
        ]);

        $invoiceNumber = 'INV-' . strtoupper(Str::random(6));
         // Generate Invoice
        $invoice = Invoice::create([
            'booking_id' => $booking->id,
            'user_id' => null, // If you have a user logged in, you can set auth()->id()
            'consultant_id' => null, // Optional if a consultant is assigned
            'client_name' => $booking->name,
            'client_email' => $booking->email,
            'client_phone' => $booking->phone,
            'invoice_number' => $invoiceNumber,
            'invoice_date' => Carbon::now(),
            'due_date' => Carbon::now()->addDays(7),
            'service_type' => $booking->service,
            'hours' => 1, // or set dynamically if needed
            'rate_per_hour' => $booking->consultation_fee,
            'subtotal' => $booking->consultation_fee,
            'tax_amount' => 0,
            'total_amount' => $booking->consultation_fee,
            'payment_method' => 'MPESA',
            'payment_status' => 'unpaid',
            'transaction_reference' => null,
            'status' => 'draft',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Booking created successfully!',
            'booking_id' => $booking->id,
            'invoice_number' => $invoiceNumber,
        ]);
    }

    // Show the payment page
    public function showPaymentPage(Booking $booking)
    {
        $Settings = \App\Models\Setting::first();

        // Fetch the invoice linked to this booking
        $invoice = \App\Models\Invoice::where('booking_id', $booking->id)->first();

        return view('frontend.payment', compact('booking', 'invoice', 'Settings'));
    }

    // Handle payment submission
    public function processPayment(Request $request, Booking $booking)
    {
        $request->validate([
            'mpesa_phone' => 'required|digits_between:10,12',
        ]);
        $phone = preg_replace('/\D+/', '', $request->input('mpesa_phone'));
        // Normalize to 2547XXXXXXXX / 2541XXXXXXXX
        if (str_starts_with($phone, '07')) { $phone = '254' . substr($phone, 1); }
        elseif (str_starts_with($phone, '01')) { $phone = '254' . substr($phone, 1); }
        elseif (str_starts_with($phone, '7')) { $phone = '254' . $phone; }
        elseif (str_starts_with($phone, '1')) { $phone = '254' . $phone; }
        elseif (!str_starts_with($phone, '254')) { $phone = '254' . ltrim($phone, '0'); }
        $amount = (int) $booking->consultation_fee;
        $accountRef = 'BK-' . $booking->id;
        $invoice = \App\Models\Invoice::where('booking_id', $booking->id)->first();
        $desc = 'Invoice ' . ($invoice->invoice_number ?? $booking->id);

        try {
            $service = new MpesaService();
            $callbackUrl = config('mpesa.callback_url');
            $response = $service->initiateStkPush($phone, $amount, $accountRef, $desc, $callbackUrl);

            // Persist initiation to map callback later
            MpesaStkPayment::create([
                'booking_id' => $booking->id,
                'phone_number' => $phone,
                'amount' => $amount,
                'merchant_request_id' => $response['MerchantRequestID'] ?? null,
                'checkout_request_id' => $response['CheckoutRequestID'] ?? null,
                'status' => 'pending',
                'raw_response' => json_encode([
                    'init_response' => $response,
                    'booking_id' => $booking->id,
                    'account_reference' => $accountRef,
                ]),
            ]);

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'status' => 'initiated',
                    'booking_id' => $booking->id,
                    'message' => 'Payment initiated successfully.'
                ]);
            }

            return redirect()->route('booking.payment', $booking)->with('success', 'Payment initiated. Complete on your phone.');
        } catch (\Throwable $e) {
            \Log::error('M-Pesa STK initiation failed', [
                'booking_id' => $booking->id,
                'phone' => $phone,
                'error' => $e->getMessage(),
            ]);
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to initiate payment: ' . $e->getMessage(),
                ], 500);
            }
            return back()->withErrors('Failed to initiate payment');
        }
    }

    public function paymentStatus(Request $request, Booking $booking)
    {
        return response()->json([
            'booking_id' => $booking->id,
            'payment_status' => $booking->payment_status,
        ]);
    }

    public function thankYou(Booking $booking)
    {
        $Settings = \App\Models\Setting::first();
        $invoice = Invoice::where('booking_id', $booking->id)->first();
        $payment = \App\Models\MpesaStkPayment::where('booking_id', $booking->id)
            ->where('status', 'success')
            ->latest()
            ->first();

        return view('frontend.thank-you', compact('booking', 'invoice', 'payment', 'Settings'));
    }

    public function receipt(Booking $booking)
    {
        $Settings = \App\Models\Setting::first();
        $invoice = Invoice::where('booking_id', $booking->id)->first();
        $payment = \App\Models\MpesaStkPayment::where('booking_id', $booking->id)
            ->where('status', 'success')
            ->latest()
            ->first();

        if (!$payment || $payment->status !== 'success') {
            return redirect()->route('book-consultation')
                ->with('error', 'Receipt not available. Payment not found or not completed.');
        }

        return view('frontend.receipt', compact('booking', 'invoice', 'payment', 'Settings'));
    }
}
