<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">


    <title>{{ $service->meta_title ?? $service->title . ' – Acorn Special Tutorials' }}</title>
    <meta name="description" content="{{ $service->meta_description ?? 'Learn more about ' . $service->title . ' at Acorn Special Tutorials in Nairobi, empowering inclusive education and family support.' }}">
    <meta name="keywords" content="{{ $service->meta_keywords ?? 'Acorn Special Tutorials, Special Education Nairobi, Inclusive Learning Kenya, ' . $service->title }}">
    <meta name="author" content="Acorn Special Tutorials">
    <meta name="robots" content="index, follow">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $service->meta_title ?? $service->title . ' – Acorn Special Tutorials' }}">
    <meta property="og:description" content="{{ $service->meta_description ?? 'Discover how Acorn Special Tutorials supports inclusive education through ' . $service->title . '.' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{ asset('storage/' . $service->image) }}">
    <meta property="og:image:alt" content="{{ $service->title }} - Acorn Special Tutorials">
    <meta property="og:site_name" content="Acorn Special Tutorials">
    <meta property="og:locale" content="en_KE">
    <meta property="article:published_time" content="{{ $service->created_at->toIso8601String() }}">
    <meta property="article:modified_time" content="{{ $service->updated_at->toIso8601String() }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $service->meta_title ?? $service->title . ' – Acorn Special Tutorials' }}">
    <meta name="twitter:description" content="{{ $service->meta_description ?? 'Empowering families through inclusive education and ' . $service->title . '.' }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $service->image) }}">
    <meta name="twitter:image:alt" content="{{ $service->title }} - Acorn Special Tutorials">
    <meta name="twitter:site" content="@acornspecialtutorials">

    <!-- Canonical & hreflang -->
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="alternate" href="{{ url()->current() }}" hreflang="en-ke">

    <!-- Schema: Service Info -->
    @verbatim
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "EducationalOccupationalProgram",
        "name": "{{ $service->title }}",
        "description": "{{ $service->meta_description ?? 'Professional support service by Acorn Special Tutorials focused on inclusive education and family empowerment.' }}",
        "provider": {
            "@type": "EducationalOrganization",
            "name": "Acorn Special Tutorials",
            "url": "https://www.acorn.co.ke/",
            "logo": "https://www.acorn.co.ke/images/logo.png",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "Nairobi",
                "addressRegion": "Nairobi County",
                "addressCountry": "Kenya"
            },
            "telephone": "+254725959137",
            "email": "info@acorn.co.ke"
        },
        "url": "{{ url()->current() }}",
        "image": "{{ asset('storage/' . $service->image) }}"
        }
    </script>
    @endverbatim

    <!-- Schema: Breadcrumb -->
    @verbatim
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
        {"@type": "ListItem","position": 1,"name": "Home","item": "https://www.acorn.co.ke/"},
        {"@type": "ListItem","position": 2,"name": "Services","item": "https://www.acorn.co.ke/services"},
        {"@type": "ListItem","position": 3,"name": "{{ $service->title }}","item": "{{ url()->current() }}"}
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
</body>

</html>


