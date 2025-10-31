@extends('layouts.master-booking')

@section('content')

<section class="full-width tj-page__area section-gap bg-gray-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="bg-white shadow-xl rounded-3 border-0 p-4 p-md-5 text-center" style="border-top: 6px solid #16a34a;">
                    <div class="success-icon mb-4">
                        <i class="fa-solid fa-circle-check" style="font-size: 64px; color: #16a34a;"></i>
                    </div>
                    
                    <h2 class="mb-3" style="font-weight: 800; font-size: 2rem; color: #16a34a;">Payment Successful!</h2>
                    
                    <p class="text-muted mb-4" style="font-size: 1.1rem;">Thank you for your payment. Your booking has been confirmed.</p>

                    @if(isset($booking) && $booking)
                    <div class="info-box bg-light rounded p-4 mb-4 text-start">
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted">Invoice Number:</span>
                            <span class="text-dark fw-bold">{{ $invoice->invoice_number ?? 'N/A' }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted">Transaction Reference:</span>
                            <span class="text-dark fw-bold">{{ $payment->mpesa_receipt_number ?? 'N/A' }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted">Amount Paid:</span>
                            <span class="text-success fw-bold">KES {{ number_format($booking->consultation_fee, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <span class="text-muted">Service:</span>
                            <span class="text-dark">{{ $booking->service }}</span>
                        </div>
                    </div>
                    @endif

                    <div class="alert alert-info mb-4">
                        <i class="fa-solid fa-envelope-circle-check me-2"></i>
                        <strong>A confirmation email has been sent to your email address.</strong>
                        <p class="mb-0 mt-2" style="font-size: 0.9rem;">Please check your inbox (and spam folder) for payment details and receipt.</p>
                    </div>

                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        <a href="{{ route('payment.receipt', $booking->id ?? 0) }}" class="tj-primary-btn" style="min-width: 200px;">
                            <span class="btn-text"><span>View Receipt</span></span>
                            <span class="btn-icon"><i class="fa-solid fa-receipt"></i></span>
                        </a>
                        <a href="{{ route('book-consultation') }}" class="btn btn-outline-secondary" style="min-width: 200px;">
                            <span>Book Another Consultation</span>
                        </a>
                    </div>

                    <hr class="my-4">

                    <div class="text-muted" style="font-size: 0.9rem;">
                        <p class="mb-2"><strong>Need Help?</strong></p>
                        <p class="mb-0">
                            <i class="fa-solid fa-phone me-2"></i>
                            Call us: {{ $Settings->mobile ?? '+254 725 959137' }}
                        </p>
                        <p class="mb-0">
                            <i class="fa-solid fa-envelope me-2"></i>
                            Email: {{ $Settings->email ?? 'info@acorn.co.ke' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection



