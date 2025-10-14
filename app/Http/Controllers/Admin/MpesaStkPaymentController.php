<?php

namespace App\Http\Controllers\Admin;

use App\Models\MpesaStkPayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MpesaStkPaymentController extends Controller
{
    public function index()
    {
        $payments = MpesaStkPayment::latest()->paginate(20);
        return view('admin.payments.stk.index', compact('payments'));
    }

    public function show(MpesaStkPayment $payment)
    {
        return view('admin.payments.stk.show', compact('payment'));
    }

    public function destroy(MpesaStkPayment $payment)
    {
        $payment->delete();
        return back()->with('success', 'Payment deleted successfully.');
    }
}
