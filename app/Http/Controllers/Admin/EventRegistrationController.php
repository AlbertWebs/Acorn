<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventRegistration;
use App\Models\Event;

class EventRegistrationController extends Controller
{
    public function index()
    {
        $registrations = EventRegistration::with('event')->latest()->paginate(20);
        return view('admin.event-registrations.index', compact('registrations'));
    }

    public function byEvent(Event $event)
    {
        $registrations = EventRegistration::where('event_id', $event->id)->latest()->paginate(20);
        return view('admin.event-registrations.by-event', compact('registrations','event'));
    }
}


