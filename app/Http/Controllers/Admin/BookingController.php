<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
 public function index()
    {
        $blogs = Booking::latest()->get();
        // $bookings = Booking::with('invoice')->latest()->get();
        $bookings = \App\Models\Booking::with('invoice')->latest()->get();
        return view('admin.booking.index', compact('bookings'));
    }
}
