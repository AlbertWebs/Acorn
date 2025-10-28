<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\Invoice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EventRegistrationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'notes' => 'nullable|string|max:2000',
        ]);

        $registration = EventRegistration::create($validated);

        // If event is paid, create an invoice
        $event = Event::find($validated['event_id']);
        if ($event && !$event->is_free) {
            $invoiceNumber = 'INV-' . strtoupper(Str::random(6));
            Invoice::create([
                'user_id' => null,
                'client_name' => $validated['name'],
                'client_email' => $validated['email'],
                'client_phone' => $validated['phone'] ?? null,
                'invoice_number' => $invoiceNumber,
                'invoice_date' => now(),
                'due_date' => now()->addDays(7),
                'subtotal' => $event->price,
                'tax_amount' => 0,
                'total_amount' => $event->price,
                'status' => 'sent',
                // Polymorphic link
                'billable_id' => $event->id,
                'billable_type' => Event::class,
                // Generic item fields
                'item_name' => 'Event: ' . $event->title,
                'quantity' => 1,
                'unit_price' => $event->price,
            ]);
        }

        return back()->with('success', 'You have successfully registered for the event.');
    }
}


