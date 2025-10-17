<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Invoice;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

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
            'consultation_fee' => 5000,
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

        // Here you can integrate M-Pesa API for real payment
        // For now, just mark booking as Paid for demo
        $booking->update(['payment_status' => 'Paid']);

        return redirect()->route('book-consultation')->with('success', 'Payment successful!');
    }
}
