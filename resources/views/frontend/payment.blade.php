@extends('layouts.master-booking')

@section('content')

<div class="space-for-header"></div>
<!-- start: Breadcrumb Section -->
<section class="tj-page-header section-gap-x" data-bg-image="{{asset('uploads/ubuntu.webp')}}">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="tj-page-header-content text-center">
          <h1 class="tj-page-title">Invoice #{{ $invoice->invoice_number}} </h1>
          <div class="tj-page-link">
            <span><i class="tji-home"></i></span>
            <span>
              <a href="{{ url('/') }}">Home</a>
            </span>
            <span><i class="tji-arrow-right"></i></span>
            <span>
              <span>Invoice #{{ $invoice->invoice_number  }}</span>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-header-overlay" data-bg-image="{{asset('acorn/assets/images/shape/pheader-overlay.webp')}}"></div>
</section>
<!-- end: Breadcrumb Section -->

<!-- Start: Booking Section -->
<section class="full-width tj-page__area section-gap bg-gray-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="booking-payment-card bg-white shadow-xl rounded-xl p-8 border-t-8 border-green-500" style="padding: 10px;">
                    <!-- Header -->
                    <div class="text-center mb-6">

                        <img style="width:100px; margin:0 auto;" src="{{ asset('uploads/mpesa-logo.png') }}" alt="M-Pesa" class="w-6 h-6"> <!-- Replace with M-Pesa logo if available -->
                        <h3 class="text-2xl font-bold mt-3">Pay for Invoice #{{ $invoice->invoice_number }}</h3>
                        <p class="text-gray-600 mt-2">Consultation Fee: <strong class="text-gray-800">KES {{ $booking->consultation_fee }}</strong></p>
                    </div>

                    <!-- Payment Form -->
                    <form method="POST" action="{{ route('booking.payment.submit', $booking->id) }}" class="space-y-4">
                        @csrf

                        <div class="form-input relative">
                            <input type="tel" name="mpesa_phone" required
                                   class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-400 focus:border-green-500 outline-none transition"
                                   placeholder="2547XXXXXXXX">
                            <label class="absolute left-3 -top-2 text-sm bg-white px-1 text-gray-500">M-Pesa Phone Number <span class="text-red-500">*</span></label>
                        </div>
                        <br>

                        <div style="width:100px; margin:0 auto;">
                            <button type="button" class="tj-primary-btn next-step">
                                <span class="btn-text"><span>Pay Now</span></span>
                                <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                            </button>
                        </div>
                    </form>

                    <br>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Optional: Tailwind CSS utility classes if not already included -->
<style>
    .booking-payment-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 10px;
    }
    .booking-payment-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 35px rgba(0,0,0,0.1);
    }
</style>




<!-- End: Booking Section -->

@endsection
