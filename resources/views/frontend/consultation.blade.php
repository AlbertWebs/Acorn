@extends('layouts.master-booking')

@section('content')

<div class="space-for-header"></div>
<!-- start: Breadcrumb Section -->
<section class="tj-page-header section-gap-x" data-bg-image="{{asset('uploads/ubuntu.webp')}}">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="tj-page-header-content text-center">
          <h1 class="tj-page-title">Book Consultation</h1>
          <div class="tj-page-link">
            <span><i class="tji-home"></i></span>
            <span>
              <a href="{{ url('/') }}">Home</a>
            </span>
            <span><i class="tji-arrow-right"></i></span>
            <span>
              <span>Book Consultation</span>
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
<section class="full-width tj-page__area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tj-page__container">
                    <div class="tj-entry__content">
                        <div class="booking-form">


                            <form id="booking-form" method="POST" action="{{ route('book-consultation.submit') }}">
                                @csrf
                                <!-- Step 1: User Info -->
                                <div class="booking-step step-1">
                                    <h4>Step 1: Your Information</h4>
                                    <div class="row row-gap-4">
                                        <div class="col-sm-6">
                                            <div class="form-input">
                                                <label class="cf-label">Full Name <span>*</span></label>
                                                <input type="text" name="name" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-input">
                                                <label class="cf-label">Email Address <span>*</span></label>
                                                <input type="email" name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-input">
                                                <label class="cf-label">Phone Number <span>*</span></label>
                                                <input type="tel" name="phone" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-input">
                                                <label class="cf-label">Location <span>*</span></label>
                                                <input type="text" name="location" required>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <button type="button" class="tj-primary-btn next-step">
                                        <span class="btn-text"><span>Next</span></span>
                                        <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                                    </button>
                                </div>

                                <!-- Step 2: Booking Details -->
                                <div class="booking-step step-2" style="display:none;">
                                    <h4>Step 2: Booking Details</h4>
                                    <div class="row row-gap-4">
                                        <div class="col-sm-6">
                                            <div class="form-input">
                                                <label class="cf-label">Select Date <span>*</span></label>
                                                <input type="datetime-local" name="booking_datetime" value="{{ request('date') ? request('date').'T09:00' : '' }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-input">
                                                <label class="cf-label">Service(You are consulting on...) <span>*</span></label>
                                                <select name="service" required>
                                                    <option value="">Select Service</option>
                                                    @foreach($Services as $service)
                                                    <option value="{{ $service->title }}">{{ $service->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-input">
                                                <label class="cf-label">Add Anything Missing</label>
                                                <textarea name="additional_info"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-input">
                                                <label class="cf-label">Consultation Fee</label>
                                                <input type="text" name="consultation_fee" value="8000" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row mt-3">
                                        <div class="col-sm-6">
                                            <button type="button" class="tj-primary-btn prev-step">
                                                <span class="btn-text"><span>Previous</span></span>
                                                <span class="btn-icon"><i class="tji-arrow-left-long"></i></span>
                                            </button>
                                        </div>
                                        <div class="col-sm-6 text-end">
                                            <button type="button" class="tj-primary-btn next-step">
                                                <span class="btn-text"><span>Next</span></span>
                                                <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 3: Confirmation -->
                                <div class="booking-step step-3" style="display:none;">
                                    <h4>Step 3: Confirm & Submit</h4>
                                    <p>Please review your details and submit your consultation request.</p>
                                    <ul>
                                        <li><strong>Name:</strong> <span id="review-name"></span></li>
                                        <li><strong>Email:</strong> <span id="review-email"></span></li>
                                        <li><strong>Phone:</strong> <span id="review-phone"></span></li>
                                        <li><strong>Location:</strong> <span id="review-location"></span></li>
                                        <li><strong>Date:</strong> <span id="review-date"></span></li>
                                        <li><strong>Service:</strong> <span id="review-service"></span></li>
                                        <li><strong>Additional Info:</strong> <span id="review-info"></span></li>
                                        <li><strong>Fee:</strong> <span id="review-fee"></span></li>
                                    </ul>
                                    <br><br>
                                    <div class="row mt-3">
                                        <div class="col-sm-6">
                                            <button type="button" class="tj-primary-btn prev-step">
                                                <span class="btn-text"><span>Previous</span></span>
                                                <span class="btn-icon"><i class="tji-arrow-left-long"></i></span>
                                            </button>
                                        </div>
                                        <div class="col-sm-6 text-end">
                                            <button type="submit" class="tj-primary-btn">
                                                <span class="btn-text"><span>Submit Booking</span></span>
                                                <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                                            </button>
                                        </div>
                                        {{--  --}}
                                        <!-- Submitting loader -->
                                        <div id="booking-loader" style="display:none; text-align:center;">
                                            <img src="{{ asset('uploads/loading.gif') }}" alt="Submitting..." style="width:50px;">
                                            <p>Submitting your booking...</p>
                                        </div>
                                        {{--  --}}
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Step Switch JS -->
<script>
document.addEventListener('DOMContentLoaded', function(){
    const nextBtns = document.querySelectorAll('.next-step');
    const prevBtns = document.querySelectorAll('.prev-step');
    const steps = document.querySelectorAll('.booking-step');

    let currentStep = 0;

    function showStep(step){
        steps.forEach((s, i) => {
            s.style.display = i === step ? 'block' : 'none';
        });
    }

    function validateStep(step){
        const inputs = steps[step].querySelectorAll('input, select, textarea');
        for(let input of inputs){
            if(input.hasAttribute('required') && !input.value.trim()){
                alert('Please fill all required fields before proceeding.');
                input.focus();
                return false;
            }
        }
        return true;
    }

    function fillReview(){
        document.getElementById('review-name').textContent = document.querySelector('[name="name"]').value;
        document.getElementById('review-email').textContent = document.querySelector('[name="email"]').value;
        document.getElementById('review-phone').textContent = document.querySelector('[name="phone"]').value;
        document.getElementById('review-location').textContent = document.querySelector('[name="location"]').value;
        document.getElementById('review-date').textContent = document.querySelector('[name="booking_datetime"]').value;
        document.getElementById('review-service').textContent = document.querySelector('[name="service"]').value;
        document.getElementById('review-info').textContent = document.querySelector('[name="additional_info"]').value;
        document.getElementById('review-fee').textContent = document.querySelector('[name="consultation_fee"]').value;
    }

    nextBtns.forEach(btn => {
        btn.addEventListener('click', function(){
            if(validateStep(currentStep)){
                if(currentStep === 1){
                    fillReview();
                }
                if(currentStep < steps.length - 1){
                    currentStep++;
                    showStep(currentStep);
                }
            }
        });
    });

    prevBtns.forEach(btn => {
        btn.addEventListener('click', function(){
            if(currentStep > 0){
                currentStep--;
                showStep(currentStep);
            }
        });
    });

    showStep(currentStep);
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('booking-form');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Show loader
            document.getElementById('booking-loader').style.display = 'block';

            const formData = new FormData(form);

            fetch("{{ route('book-consultation.submit') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('booking-loader').style.display = 'none';
                if(data.status === 'success') {
                    // Redirect to payment page
                    window.location.href = `/booking/${data.booking_id}/payment`;
                } else {
                    let errors = Object.values(data.errors).flat().join("\n");
                    alert("Errors:\n" + errors);
                }
            })
            .catch(err => {
                document.getElementById('booking-loader').style.display = 'none';
                alert('Something went wrong. Please try again.');
            });
        });
    });
</script>



<!-- End: Booking Section -->

@endsection
