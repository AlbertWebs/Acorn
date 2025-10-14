<?php

namespace App\Http\Controllers\Admin;

use App\Models\MpesaC2bPayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MpesaC2bPaymentController extends Controller
{
    public function index()
    {
        $payments = MpesaC2bPayment::latest()->paginate(20);
        return view('admin.payments.c2b.index', compact('payments'));
    }

    public function show(MpesaC2bPayment $payment)
    {
        return view('admin.payments.c2b.show', compact('payment'));
    }

    public function destroy(MpesaC2bPayment $payment)
    {
        $payment->delete();
        return back()->with('success', 'C2B Payment deleted successfully.');
    }
}
