@extends('layouts.master-booking')

@section('content')


<!-- start: Breadcrumb Section -->


<!-- Start: Booking Section -->
<section class="full-width tj-page__area section-gap bg-gray-50">
    <div class="container">
        <div class="row g-5 align-items-start">
            <!-- Left: Payment Panel -->
            <div class="col-12 col-lg-7">
                <div class="booking-payment-card bg-white shadow-xl rounded-3 border-0 p-4 p-md-5" style="border-top: 6px solid #16a34a;">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img style="width:110px; height:auto" src="{{ asset('uploads/mpesa-logo.png') }}" alt="M-Pesa">
                        <div class="ms-auto d-none d-md-flex align-items-center gap-2 text-success" style="font-weight:600">
                            <i class="fa-solid fa-lock"></i>
                            <span>Secure Payment</span>
                        </div>
                    </div>

                    <h3 class="mb-1" style="font-weight:800; font-size: 1.6rem;">Pay Invoice #{{ $invoice->invoice_number }}</h3>
                    <p class="text-muted mb-4">Consultation Fee: <strong class="text-dark">KES {{ number_format($booking->consultation_fee) }}</strong></p>

                    <form id="stk-form" method="POST" action="{{ route('booking.payment.submit', $booking->id) }}" class="space-y-4">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" style="font-weight:600">M-Pesa Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" name="mpesa_phone" required
                                   class="form-control"
                                   style="height:48px; border-radius:12px; border-color:#e5e7eb"
                                   placeholder="2547XXXXXXXX" inputmode="numeric">
                            <small class="text-muted">Enter the number that will authorize the STK push prompt.</small>
                        </div>

                        <div class="d-grid d-sm-flex gap-3 align-items-center">
                            <button id="stk-submit" type="submit" class="tj-primary-btn" style="min-width:160px">
                                <span class="btn-text"><span>Pay Now</span></span>
                                <span class="btn-icon"><i class="fa-solid fa-arrow-right"></i></span>
                            </button>
                            <div class="d-flex align-items-center gap-2 text-muted" style="font-size:12px">
                                <i class="fa-solid fa-shield-halved"></i>
                                <span>Your details are protected</span>
                            </div>
                        </div>
                    </form>

                    <div id="stk-steps" class="mt-4">
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <img id="gif-1" class="stk-gif" src="{{ asset('uploads/gifs/initiating.gif') }}" alt="Initiating" style="display:none">
                            <span id="step-1" class="badge rounded-pill bg-light text-muted">1</span>
                            <span class="text-muted">Initiating payment</span>
                        </div>
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <img id="gif-2" class="stk-gif" src="{{ asset('uploads/gifs/waiting-pin.gif') }}" alt="Waiting for PIN" style="display:none">
                            <span id="step-2" class="badge rounded-pill bg-light text-muted">2</span>
                            <span class="text-muted">Waiting for PIN on your phone</span>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <img id="gif-3" class="stk-gif" src="{{ asset('uploads/gifs/confirming.gif') }}" alt="Confirming" style="display:none">
                            <span id="step-3" class="badge rounded-pill bg-light text-muted">3</span>
                            <span class="text-muted">Confirming payment</span>
                        </div>
                        <div id="stk-hint" class="small text-muted mt-2">Make sure your phone is on and has network coverage.</div>
                    </div>

                    <hr class="my-4">

                    <div class="row g-3 text-muted" style="font-size: 13px;">
                        <div class="col-12 col-md-4 d-flex gap-2">
                            <i class="fa-solid fa-circle-check"></i>
                            <div><strong>Instant</strong><br>STK push to your phone</div>
                        </div>
                        <div class="col-12 col-md-4 d-flex gap-2">
                            <i class="fa-solid fa-lock"></i>
                            <div><strong>Secure</strong><br>Encrypted & verified</div>
                        </div>
                        <div class="col-12 col-md-4 d-flex gap-2">
                            <i class="fa-solid fa-headset"></i>
                            <div><strong>Support</strong><br> Call {{ $Settings->mobile ?? '+254 725 959137' }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Invoice Summary / Trust Panel -->
            <div class="col-12 col-lg-5">
                <div class="bg-white rounded-3 shadow border-0 p-4 p-md-5">
                    <h5 class="mb-3" style="font-weight:700">Invoice Summary</h5>
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span class="text-muted">Invoice No.</span>
                        <span class="text-dark">{{ $invoice->invoice_number }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span class="text-muted">Client</span>
                        <span class="text-dark">{{ $invoice->client_name ?? ($booking->name ?? 'Client') }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span class="text-muted">Amount Due</span>
                        <span class="text-dark">KES {{ number_format($booking->consultation_fee) }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span class="text-muted">Due Date</span>
                        <span class="text-dark">{{ optional($invoice->due_date)->format('d M Y') ?? '—' }}</span>
                    </div>

                    <div class="mt-4 p-3 rounded" style="background: #f9fafb; border:1px solid #eef2f7">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fa-solid fa-circle-info" style="color:#16a34a"></i>
                            <div style="font-size:12px" class="text-muted">
                                You’ll receive an M-Pesa prompt to confirm this payment. Ensure your phone is on and has network coverage.
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 d-flex align-items-center gap-3" style="opacity:.8">
                        <img src="{{ asset('uploads/mpesa-logo.png') }}" alt="M-Pesa" style="height:22px">
                        <span class="text-muted" style="font-size:12px">Payments processed securely. No card details stored.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Optional: Tailwind CSS utility classes if not already included -->
<style>
    .booking-payment-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 14px;
    }
    .booking-payment-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 35px rgba(0,0,0,0.1);
    }
    .stk-gif { width: 28px; height: 28px; object-fit: contain; }
</style>

<script>
    (function(){
        const form = document.getElementById('stk-form');
        const submitBtn = document.getElementById('stk-submit');
        const step1 = document.getElementById('step-1');
        const step2 = document.getElementById('step-2');
        const step3 = document.getElementById('step-3');
        const gif1 = document.getElementById('gif-1');
        const gif2 = document.getElementById('gif-2');
        const gif3 = document.getElementById('gif-3');
        const metaCsrf = document.querySelector('meta[name="csrf-token"]');
        const csrf = (metaCsrf && metaCsrf.getAttribute('content')) || (form && form.querySelector('input[name="_token"]').value) || '';

        function setStep(el, state){
            // state: idle|active|done
            el.classList.remove('bg-light','text-muted','bg-secondary','bg-success');
            if(state==='active') el.classList.add('bg-secondary');
            else if(state==='done') el.classList.add('bg-success');
            else el.classList.add('bg-light','text-muted');
        }

        function toggleGif(which, show){
            const map = { 1: gif1, 2: gif2, 3: gif3 };
            Object.keys(map).forEach(k=>{ map[k].style.display = 'none'; });
            if (show && map[which]) { map[which].style.display = 'inline-block'; }
        }

        async function pollStatus(bookingId, timeoutMs){
            const start = Date.now();
            while(Date.now() - start < timeoutMs){
                try{
                    const res = await fetch("{{ route('booking.payment.status', $booking->id) }}", { headers: { 'Accept': 'application/json' } });
                    const data = await res.json();
                    if((data.payment_status||'').toLowerCase()==='paid') return 'paid';
                }catch(e){}
                await new Promise(r=>setTimeout(r, 3000));
            }
            return 'timeout';
        }

        form.addEventListener('submit', async function(e){
            e.preventDefault();
            setStep(step1, 'active'); setStep(step2,'idle'); setStep(step3,'idle'); toggleGif(1, true);
            submitBtn.disabled = true;
            try{
                const formData = new FormData(form);
                const headers = { 'Accept': 'application/json' };
                if (csrf) headers['X-CSRF-TOKEN'] = csrf;
                const res = await fetch(form.action, {
                    method: 'POST',
                    headers,
                    body: formData
                });
                if(!res.ok){
                    try {
                        const err = await res.json();
                        throw new Error(err.message || 'Failed to initiate payment');
                    } catch(_) {
                        throw new Error('Failed to initiate payment');
                    }
                }
                const data = await res.json();
                setStep(step1,'done'); setStep(step2,'active'); toggleGif(2, true);

                // Wait for server to reflect the M-Pesa callback (no websockets shortcut)
                const st = await pollStatus({{ $booking->id }}, 180000);
                if (st==='paid') { setStep(step2,'done'); setStep(step3,'active'); toggleGif(3, true); setTimeout(()=>location.href = "{{ route('book-consultation') }}?paid=1", 800); }
                else { submitBtn.disabled=false; setStep(step1,'idle'); toggleGif(null, false); alert('No confirmation received yet. If you approved the prompt, please wait and try checking again.'); }
            }catch(err){
                submitBtn.disabled = false;
                setStep(step1,'idle'); toggleGif(null, false);
                alert('Unable to start payment. Please try again.');
            }
        });
    })();
</script>




<!-- End: Booking Section -->

@endsection
