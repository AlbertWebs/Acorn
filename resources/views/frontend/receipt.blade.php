@extends('layouts.master-booking')

@section('content')

<section class="full-width tj-page__area section-gap bg-gray-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="bg-white shadow-xl rounded-3 border-0 p-4 p-md-5" id="receipt-content">
                    <!-- Receipt Header -->
                    <div class="text-center mb-4 pb-3 border-bottom">
                        <h2 class="mb-2" style="font-weight: 800; font-size: 1.8rem; color: #16a34a;">Payment Receipt</h2>
                        <p class="text-muted mb-0">{{ \Carbon\Carbon::now()->format('d M Y, h:i A') }}</p>
                    </div>

                    @if(isset($booking) && $booking)
                    <!-- Company Info -->
                    <div class="text-center mb-4 pb-3 border-bottom">
                        <h3 class="mb-2" style="font-weight: 700;">Acorn Special Tutorials</h3>
                        <p class="text-muted mb-1" style="font-size: 0.9rem;">{{ $Settings->location ?? 'Nairobi, Kenya' }}</p>
                        <p class="text-muted mb-0" style="font-size: 0.9rem;">
                            Phone: {{ $Settings->mobile ?? '+254 725 959137' }} | 
                            Email: {{ $Settings->email ?? 'info@acorn.co.ke' }}
                        </p>
                    </div>

                    <!-- Invoice & Transaction Details -->
                    <div class="mb-4">
                        <div class="row mb-3">
                            <div class="col-6">
                                <p class="text-muted mb-1">Invoice Number:</p>
                                <p class="fw-bold">{{ $invoice->invoice_number ?? 'N/A' }}</p>
                            </div>
                            <div class="col-6 text-end">
                                <p class="text-muted mb-1">Transaction Reference:</p>
                                <p class="fw-bold">{{ $payment->mpesa_receipt_number ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Details -->
                    <div class="mb-4 pb-3 border-bottom">
                        <h4 class="mb-3" style="font-weight: 600; color: #333;">Customer Details</h4>
                        <div class="row">
                            <div class="col-12 col-md-6 mb-2">
                                <p class="text-muted mb-1">Name:</p>
                                <p class="fw-bold">{{ $booking->name }}</p>
                            </div>
                            <div class="col-12 col-md-6 mb-2">
                                <p class="text-muted mb-1">Email:</p>
                                <p class="fw-bold">{{ $booking->email }}</p>
                            </div>
                            <div class="col-12 col-md-6 mb-2">
                                <p class="text-muted mb-1">Phone:</p>
                                <p class="fw-bold">{{ $booking->phone }}</p>
                            </div>
                            <div class="col-12 col-md-6 mb-2">
                                <p class="text-muted mb-1">Location:</p>
                                <p class="fw-bold">{{ $booking->location }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Service Details -->
                    <div class="mb-4 pb-3 border-bottom">
                        <h4 class="mb-3" style="font-weight: 600; color: #333;">Service Details</h4>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <p class="text-muted mb-1">Service:</p>
                                <p class="fw-bold">{{ $booking->service }}</p>
                            </div>
                            <div class="col-12 mb-2">
                                <p class="text-muted mb-1">Booking Date:</p>
                                <p class="fw-bold">{{ \Carbon\Carbon::parse($booking->booking_datetime)->format('d M Y, h:i A') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Summary -->
                    <div class="mb-4 pb-3 border-bottom">
                        <h4 class="mb-3" style="font-weight: 600; color: #333;">Payment Summary</h4>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Consultation Fee:</span>
                            <span class="fw-bold">KES {{ number_format($booking->consultation_fee, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Payment Method:</span>
                            <span class="fw-bold">M-Pesa</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Payment Date:</span>
                            <span class="fw-bold">{{ $payment->transaction_date ? \Carbon\Carbon::parse($payment->transaction_date)->format('d M Y, h:i A') : \Carbon\Carbon::now()->format('d M Y, h:i A') }}</span>
                        </div>
                        <hr class="my-2">
                        <div class="d-flex justify-content-between">
                            <span class="fw-bold" style="font-size: 1.1rem;">Total Paid:</span>
                            <span class="fw-bold text-success" style="font-size: 1.3rem;">KES {{ number_format($payment->amount ?? $booking->consultation_fee, 2) }}</span>
                        </div>
                    </div>

                    <!-- Payment Status -->
                    <div class="mb-4 text-center">
                        <span class="badge bg-success px-4 py-2" style="font-size: 1rem;">
                            <i class="fa-solid fa-circle-check me-2"></i>Payment Confirmed
                        </span>
                    </div>
                    @endif

                    <!-- Footer Note -->
                    <div class="text-center text-muted mt-4 pt-3 border-top" style="font-size: 0.85rem;">
                        <p class="mb-1">This is a computer-generated receipt. No signature required.</p>
                        <p class="mb-0">For any inquiries, please contact us at {{ $Settings->email ?? 'info@acorn.co.ke' }}</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center mt-4">
                    <button onclick="window.print()" class="tj-primary-btn" style="min-width: 200px;">
                        <span class="btn-text"><span>Print Receipt</span></span>
                        <span class="btn-icon"><i class="fa-solid fa-print"></i></span>
                    </button>
                    <a href="{{ route('book-consultation') }}" class="btn btn-outline-secondary" style="min-width: 200px;">
                        <span>Back to Home</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
@media print {
    body * {
        visibility: hidden;
    }
    #receipt-content, #receipt-content * {
        visibility: visible;
    }
    #receipt-content {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
    }
    .btn, .d-flex.flex-column {
        display: none !important;
    }
}
</style>

@endsection



