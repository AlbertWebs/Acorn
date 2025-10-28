<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">

   <meta name="csrf-token" content="{{ csrf_token() }}">
   <!-- Site Title -->
   <title>Acorn Special Tutorials – Empowering Families & Inclusive Education in Nairobi</title>
   <meta name="description" content="Acorn Special Tutorials in Nairobi empowers families and communities through inclusive education, individualized education plans (IEPs), auditory integration therapy (AIT), training and capacity building, and consultation services. Call 0725 959137 for professional assessments and support.">
   <meta name="keywords" content="Acorn Special Tutorials, Special Education Nairobi, Inclusive Learning Kenya, Family Empowerment, Auditory Integration Therapy, IEPs Nairobi, Special Needs Assessments, Educational Consultation, Community Empowerment Kenya, Training and Capacity Building, Inclusive School Support, Special Educator Nairobi, Special Education Services Kenya">
   <meta name="author" content="Acorn Special Tutorials">
   <meta name="robots" content="index, follow">
   <meta property="og:title" content="Acorn Special Tutorials – Inclusive Learning & Family Empowerment in Nairobi">
   <meta property="og:description" content="Providing inclusive school support, auditory integration therapy, individualized education plans (IEPs), and training programs for families and educators in Nairobi.">
   <meta property="og:url" content="{{url('/')}}/">
   <meta property="og:type" content="organization">
   <meta property="og:site_name" content="Acorn Special Tutorials">
    <meta property="og:locale" content="en_KE">
   <meta property="og:image" content="{{url('/')}}/uploads/ubuntu.webp">
   <meta name="twitter:card" content="summary_large_image">
   <meta name="twitter:title" content="Acorn Special Tutorials – Special Education & Inclusive Learning in Nairobi">
   <meta name="twitter:description" content="Empowering families through inclusive education, AIT therapy, and professional training in Nairobi.">
   <meta name="twitter:image" content="{{url('/')}}/uploads/ubuntu.webp">
   <link rel="canonical" href="{{url('/')}}/">

   {{--  --}}
    @verbatim
    <script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@type": "EducationalOrganization",
    "name": "Acorn Special Tutorials",
    "alternateName": "Acorn Special Education Center",
    "url": "{{url('/')}}/",
    "logo": "{{url('/')}}/images/logo.png",
    "image": "{{url('/')}}/uploads/ubuntu.webp",
    "description": "Acorn Special Tutorials is a special education and family empowerment center in Nairobi offering inclusive school support, auditory integration therapy (AIT), individualized education plans (IEPs), professional training, and consultation services.",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "407 Muhuri",
        "addressLocality": "Nairobi",
        "addressRegion": "Nairobi County",
        "postalCode": "00100",
        "addressCountry": "Kenya"
    },
    "telephone": "+254725959137",
    "email": "info@acorn.co.ke",
    "sameAs": [
        "https://www.facebook.com/acornspecialtutorials",
        "https://www.instagram.com/acornspecialtutorials",
        "https://www.linkedin.com/company/acornspecialtutorials"
    ],
    "geo": {
        "@type": "GeoCoordinates",
        "latitude": -1.2921,
        "longitude": 36.8219
    },
    "openingHours": "Mo-Fr 08:00-17:00",
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.7",
        "reviewCount": "713"
    },
    "founder": {
        "@type": "Person",
        "name": "Acorn Special Tutorials Team"
    },
    "department": [
        {
        "@type": "EducationalOccupationalProgram",
        "name": "Community & Family Empowerment",
        "description": "Supporting families and communities to build inclusive, nurturing environments for learners."
        },
        {
        "@type": "EducationalOccupationalProgram",
        "name": "Inclusive School Support",
        "description": "Helping schools integrate and support learners with special needs through customized interventions and professional collaboration."
        },
        {
        "@type": "EducationalOccupationalProgram",
        "name": "Training & Capacity Building",
        "description": "Professional training for teachers, parents, and caregivers to strengthen inclusive education practices."
        },
        {
        "@type": "EducationalOccupationalProgram",
        "name": "Auditory Integration Therapy (AIT)",
        "description": "Providing auditory processing interventions to enhance sensory regulation, focus, and learning performance."
        },
        {
        "@type": "EducationalOccupationalProgram",
        "name": "Individualized Education Plans (IEPs)",
        "description": "Developing personalized education plans tailored to each learner’s abilities and needs."
        },
        {
        "@type": "EducationalOccupationalProgram",
        "name": "Consultation Services",
        "description": "Offering expert guidance, assessments, and educational consultations for parents and institutions."
        }
    ]
    }
    </script>
    @endverbatim

   {{--  --}}


  <!-- Place favicon.ico in the root directory -->
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
  <link rel="manifest" href="{{asset('favicon/site.webmanifest')}}">

  <!-- CSS here -->
  <link rel="stylesheet" href="{{asset('acorn/assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('acorn/assets/css/font-awesome-pro.min.css')}}">
  <link rel="stylesheet" href="{{asset('acorn/assets/css/animate.min.css')}}">
  <link rel="stylesheet" href="{{asset('acorn/assets/css/bexon-icons.css')}}">
  <link rel="stylesheet" href="{{asset('acorn/assets/css/nice-select.css')}}">
  <link rel="stylesheet" href="{{asset('acorn/assets/css/swiper.min.css')}}">
  <link rel="stylesheet" href="{{asset('acorn/assets/css/venobox.min.css')}}">
  <link rel="stylesheet" href="{{asset('acorn/assets/css/odometer-theme-default.css')}}">
  <link rel="stylesheet" href="{{asset('acorn/assets/css/meanmenu.css')}}">
  <link rel="stylesheet" href="{{asset('acorn/assets/css/main.css')}}">
</head>

<body>
  <div class="body-overlay"></div>

  <!-- Preloader Start -->
  <div class="tj-preloader is-loading">
    <div class="tj-preloader-inner">
      <div class="tj-preloader-ball-wrap">
        <div class="tj-preloader-ball-inner-wrap">
          <div class="tj-preloader-ball-inner">
            <div class="tj-preloader-ball"></div>
          </div>
          <div class="tj-preloader-ball-shadow"></div>
        </div>
        <div id="tj-weave-anim" class="tj-preloader-text">Loading...</div>
      </div>
    </div>
    <div class="tj-preloader-overlay"></div>
  </div>
  <!-- Preloader end -->

  <!-- back to top start -->
  <div id="tj-back-to-top"><span id="tj-back-to-top-percentage"></span></div>
  <!-- back to top end -->

  <!-- start: Search Popup -->
  <div class="search-popup-overlay"></div>
  <!-- end: Search Popup -->

  <!-- start: Offcanvas Menu -->
  <div class="tj-offcanvas-area d-none d-lg-block">
    <div class="hamburger_bg"></div>
    <div class="hamburger_wrapper">
      <div class="hamburger_inner">
        <div class="hamburger_top d-flex align-items-center justify-content-between">
          <div class="hamburger_logo">
            <a href="{{url('/')}}" class="mobile_logo">
              <img src="{{ asset('storage/'.$Settings->white_logo) }}" alt="Logo">
            </a>
          </div>
          <div class="hamburger_close">
            <button class="hamburger_close_btn"><i class="fa-thin fa-times"></i></button>
          </div>
        </div>
        <div class="offcanvas-text">
          <p>
            We are committed to growing inclusive futures where compassion, unity, and shared progress thrive.
          </p>
        </div>
        <div class="hamburger-search-area">
          <h5 class="hamburger-title">Search Now!</h5>
          <div class="hamburger_search">
            <form method="get" action="{{url('/')}}">
              <button type="submit"><i class="tji-search"></i></button>
              <input type="search" autocomplete="off" name="s" value="" placeholder="Search here...">
            </form>
          </div>
        </div>
        <div class="hamburger-infos">
          <h5 class="hamburger-title">Contact Info</h5>
          <div class="contact-info">
            <div class="contact-item">
              <span class="subtitle">Phone</span>
              <a class="contact-link" href="tel:{{$Settings->mobile}}">{{$Settings->mobile}}</a>
            </div>
            <div class="contact-item">
              <span class="subtitle">Email</span>
              <a class="contact-link" href="mailto:{{$Settings->email}}">{{$Settings->email}}</a>
            </div>
            <div class="contact-item">
              <span class="subtitle">Location</span>
              <span class="contact-link">{{$Settings->location}}</span>
            </div>
          </div>
        </div>
      </div>
      <div class="hamburger-socials">
        <h5 class="hamburger-title">Follow Us</h5>
        <div class="social-links style-3">
          <ul>
            <li><a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
            </li>
            <li><a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            </li>
            <li><a href="https://x.com/" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
            <li><a href="https://www.linkedin.com/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- end: Offcanvas Menu -->

  <!-- start: Hamburger Menu -->
   <div class="hamburger-area d-lg-none">
    <div class="hamburger_bg"></div>
    <div class="hamburger_wrapper">
      <div class="hamburger_inner">
        <div class="hamburger_top d-flex align-items-center justify-content-between">
          <div class="hamburger_logo">
            <a href="{{url('/')}}" class="mobile_logo">
              <img src="{{ asset('storage/'.$Settings->white_logo) }}" alt="Logo">
            </a>
          </div>
          <div class="hamburger_close">
            <button class="hamburger_close_btn"><i class="fa-thin fa-times"></i></button>
          </div>
        </div>
        <div class="hamburger_menu">
          <div class="mobile_menu"></div>
        </div>
        <div class="hamburger-infos">
          <h5 class="hamburger-title">Contact Info</h5>
          <div class="contact-info">
            <div class="contact-item">
              <span class="subtitle">Phone</span>
              <a class="contact-link" href="tel:{{$Settings->phone}}">{{$Settings->phone}}</a>
            </div>
            <div class="contact-item">
              <span class="subtitle">Email</span>
              <a class="contact-link" href="mailto:{{$Settings->email}}">{{$Settings->email}}</a>
            </div>
            <div class="contact-item">
              <span class="subtitle">Location</span>
              <span class="contact-link">{{$Settings->location}}</span>
            </div>
          </div>
        </div>
      </div>
      <div class="hamburger-socials">
        <h5 class="hamburger-title">Follow Us</h5>
        <div class="social-links style-3">
          <ul>
            <li><a href="{{$Settings->facebook}}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
            </li>
            <li><a href="{{$Settings->instagram}}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            </li>
            <li><a href="{{$Settings->twitter}}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
            <li><a href="{{$Settings->linkedin}}" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- end: Hamburger Menu -->

   @include('components.menu')

  <div id="smooth-wrapper">
    <div id="smooth-content">
      @yield('content')

      <!-- start: Footer Section -->
      @include('components.footer')
      <!-- end: Footer Section -->
    </div>
  </div>
  <!-- JS here -->
  <script src="{{asset('acorn/assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('acorn/assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('acorn/assets/js/gsap.min.js')}}"></script>
  <script src="{{asset('acorn/assets/js/ScrollSmoother.js')}}"></script>
  <script src="{{asset('acorn/assets/js/gsap-scroll-to-plugin.min.js')}}"></script>
  <script src="{{asset('acorn/assets/js/gsap-scroll-trigger.min.js')}}"></script>
  <script src="{{asset('acorn/assets/js/gsap-split-text.min.js')}}"></script>
  <script src="{{asset('acorn/assets/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('acorn/assets/js/swiper.min.js')}}"></script>
  <script src="{{asset('acorn/assets/js/odometer.min.js')}}"></script>
  <script src="{{asset('acorn/assets/js/venobox.min.js')}}"></script>
  <script src="{{asset('acorn/assets/js/appear.min.js')}}"></script>
  <script src="{{asset('acorn/assets/js/wow.min.js')}}"></script>
  <script src="{{asset('acorn/assets/js/meanmenu.js')}}"></script>
  <script src="{{asset('acorn/assets/js/main.js')}}"></script>

  <script>
        $(document).ready(function () {
        // Set CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Handle subscription form submit
        $('#subscribeForms').on('submit', function (e) {
            e.preventDefault();

            let email = $('input[name="email"]').val();
            let agree = $('#agree').is(':checked');

            if (!agree) {
            $('#message').html('<span style="color:red;">Please agree to our Terms & Conditions.</span>');
            return;
            }

            $.ajax({
            url: "{{ route('subscribe') }}", // ✅ Ensure route exists in web.php
            type: "POST",
            data: { email: email },
            beforeSend: function () {
                $('#message').html('<span style="color:#555;">Subscribing...</span>');
            },
            success: function (response) {
                $('#message').html('<span style="color:green;">' + response.message + '</span>');
                $('#subscribeForms')[0].reset();
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                let firstError = errors ? Object.values(errors)[0][0] : 'Invalid email.';
                $('#message').html('<span style="color:red;">' + firstError + '</span>');
                } else if (xhr.status === 419) {
                $('#message').html('<span style="color:red;">Session expired. Refresh and try again.</span>');
                } else {
                $('#message').html('<span style="color:red;">Something went wrong. Please try again.</span>');
                }
            }
            });
        });

        // Handle homepage contact form submission
        $('#contact-form-3').on('submit', function (e) {
            e.preventDefault();
            
            const form = $(this);
            const submitBtn = $('#contact-submit-btn');
            const statusDiv = $('#contact-form-status');
            
            // Disable submit button to prevent double submission
            submitBtn.prop('disabled', true);
            submitBtn.find('.btn-text span').text('Sending...');
            
            // Clear previous status messages
            statusDiv.hide().empty();
            
            // Basic client-side validation
            const name = $('input[name="cfName3"]').val().trim();
            const email = $('input[name="cfEmail3"]').val().trim();
            const phone = $('input[name="cfPhone3"]').val().trim();
            const service = $('select[name="cfSubject3"]').val();
            const message = $('textarea[name="cfMessage3"]').val().trim();
            
            if (!name || !email || !phone || !service || !message) {
                showStatus('Please fill in all required fields.', 'error');
                resetSubmitButton();
                return;
            }
            
            if (message.length < 10) {
                showStatus('Message must be at least 10 characters long.', 'error');
                resetSubmitButton();
                return;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showStatus('Please enter a valid email address.', 'error');
                resetSubmitButton();
                return;
            }
            
            // Show sending status
            showStatus('Sending your message...', 'info');
            
            // Submit form via AJAX
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.status === 'success') {
                        showStatus(response.message, 'success');
                        form[0].reset(); // Reset form
                        
                        // Scroll to status message
                        $('html, body').animate({
                            scrollTop: statusDiv.offset().top - 100
                        }, 500);
                    } else {
                        showStatus(response.message || 'An error occurred.', 'error');
                    }
                },
                error: function (xhr) {
                    let errorMessage = 'Sorry, there was an error sending your message. Please try again.';
                    
                    if (xhr.status === 422) {
                        // Validation errors
                        const errors = xhr.responseJSON.errors;
                        if (errors) {
                            const firstError = Object.values(errors)[0][0];
                            errorMessage = firstError;
                        }
                    } else if (xhr.status === 429) {
                        // Rate limiting
                        errorMessage = 'Too many submissions. Please wait before trying again.';
                    } else if (xhr.status === 400) {
                        // Spam detected
                        errorMessage = 'Spam detected. Please try again.';
                    } else if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    
                    showStatus(errorMessage, 'error');
                },
                complete: function () {
                    resetSubmitButton();
                }
            });
            
            function showStatus(message, type) {
                const colors = {
                    success: '#28a745',
                    error: '#dc3545',
                    info: '#17a2b8'
                };
                
                statusDiv.html('<span style="color: ' + colors[type] + '; font-weight: 500;">' + message + '</span>').show();
            }
            
            function resetSubmitButton() {
                submitBtn.prop('disabled', false);
                submitBtn.find('.btn-text span').text('Send Message');
            }
        });
        });
  </script>



</body>

</html>


