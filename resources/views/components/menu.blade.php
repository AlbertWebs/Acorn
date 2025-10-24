<?php
   $Services = DB::table('services')->get()
?>
<!-- start: Header Area -->
  <header class="header-area header-1 header-absolute  section-gap-x">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="header-wrapper">
            <!-- site logo -->
            <div class="site_logo">
              <a class="logo" href="{{url('/')}}"><img src="{{ asset('storage/'.$Settings->logo) }}" alt=""></a>
            </div>

            <!-- navigation -->
            <div class="menu-area d-none d-lg-inline-flex align-items-center">
              <nav id="mobile-menu" class="mainmenu">
                {{--  --}}
                 <ul>
                    <li class="{{ request()->routeIs('home') ? 'current-menu-ancestor' : '' }}">
                        <a href="{{ url('/') }}">Home</a>
                    </li>

                    <li class="has-dropdown {{ request()->routeIs('about-us','our-history','the-director') ? 'current-menu-ancestor' : '' }}">
                        <a href="#">About Us</a>
                        <ul class="sub-menu">
                            <li><a class="{{ request()->routeIs('about-us') ? 'active' : '' }}" href="{{ route('about-us') }}">Our Story</a></li>
                            <li><a class="{{ request()->routeIs('our-history') ? 'active' : '' }}" href="{{ route('our-history') }}">Our History</a></li>
                            <li><a class="{{ request()->routeIs('the-director') ? 'active' : '' }}" href="{{ route('the-director') }}">The Director</a></li>
                        </ul>
                    </li>



                    <li class="has-dropdown {{ request()->routeIs('services-single') ? 'current-menu-ancestor' : '' }}">
                        <a href="#">Our Services</a>
                        <ul class="sub-menu">
                            @foreach ($Services as $service)
                                <li>
                                    <a class="mega-menu-service-single {{ request()->routeIs('services-single') && request()->segment(2) == $service->slug ? 'active' : '' }}"
                                        href="{{ route('services-single', $service->slug) }}">{{ $service->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>



                     <li class="has-dropdown {{ request()->routeIs('about-us','our-history','the-director') ? 'current-menu-ancestor' : '' }}">
                        <a href="#">Updates</a>
                        <ul class="sub-menu">
                            <li><a class="{{ request()->routeIs('updates') ? 'current-menu-ancestor' : '' }}" href="{{ route('about-us') }}">Webinars</a></li>
                            <li><a class="{{ request()->routeIs('updates') ? 'current-menu-ancestor' : '' }}" href="{{ route('updates') }}">Updates</a></li>
                        </ul>
                    </li>
                    <li class="{{ request()->routeIs('contact-us') ? 'current-menu-ancestor' : '' }}">
                       <a class="{{ request()->routeIs('updates') ? 'current-menu-ancestor' : '' }}" href="{{ route('updates') }}">Events</a>
                    </li>

                    <li class="{{ request()->routeIs('contact-us') ? 'current-menu-ancestor' : '' }}">
                        <a href="{{ route('contact-us') }}">Contact</a>
                    </li>
                </ul>
                {{--  --}}
              </nav>
            </div>

            <!-- header right info -->
            <div class="header-right-item d-none d-lg-inline-flex">
              <div class="header-search">
                <button class="search">
                  <i class="tji-search"></i>
                </button>
                <button type="button" class="search_close_btn">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </button>
              </div>
              <div class="header-button">
                <a class="tj-primary-btn" href="{{route('book-consultation')}}">
                  <span class="btn-text"><span>Book Consultation</span></span>
                  <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                </a>
              </div>
              <div class="menu_bar menu_offcanvas d-none d-lg-inline-flex">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>

            <!-- menu bar -->
            <div class="menu_bar mobile_menu_bar d-lg-none">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Search Popup -->
    <div class="search_popup">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="tj_search_wrapper">
              <div class="search_form">
                <form action="{{url('/')}}#">
                  <div class="search_input">
                    <div class="search-box">
                      <input class="search-form-input" type="text" placeholder="Type Words and Hit Enter" required>
                      <button type="submit">
                        <i class="tji-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- end: Header Area -->

  <!-- start: Header Area -->
  <header class="header-area header-1 header-duplicate header-sticky  section-gap-x">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="header-wrapper">
            <!-- site logo -->
            <div class="site_logo">
              <a class="logo" href="{{url('/')}}"><img src="{{ asset('storage/'.$Settings->logo) }} " alt=""></a>
            </div>

            <!-- navigation -->
            <div class="menu-area d-none d-lg-inline-flex align-items-center">
              <nav class="mainmenu">
                <ul>
                    <li class="{{ request()->routeIs('home') ? 'current-menu-ancestor' : '' }}">
                        <a href="{{ url('/') }}">Home</a>
                    </li>

                    <li class="has-dropdown {{ request()->routeIs('about-us','our-history','the-director') ? 'current-menu-ancestor' : '' }}">
                        <a href="{{ route('about-us') }}">Who We Are</a>
                        <ul class="sub-menu">
                            <li><a class="{{ request()->routeIs('about-us') ? 'active' : '' }}" href="{{ route('about-us') }}">Our Story</a></li>
                            <li><a class="{{ request()->routeIs('our-history') ? 'active' : '' }}" href="{{ route('our-history') }}">Our History</a></li>
                            <li><a class="{{ request()->routeIs('the-director') ? 'active' : '' }}" href="{{ route('the-director') }}">The Director</a></li>
                        </ul>
                    </li>

                    <li class="has-dropdown {{ request()->routeIs('services-single') ? 'current-menu-ancestor' : '' }}">
                        <a href="#">What We Do</a>
                        <ul class="sub-menu mega-menu-service">
                            @foreach ($Services as $service)
                                <li>
                                    <a class="mega-menu-service-single {{ request()->routeIs('services-single') && request()->segment(2) == $service->slug ? 'active' : '' }}"
                                    href="{{ route('services-single', $service->slug) }}">
                                        <span class="mega-menu-service-icon">
                                            <i class="tji-{{ $service->icon }}"></i>
                                        </span>
                                        <span class="mega-menu-service-title">{{ $service->title }}</span>
                                        <span class="mega-menu-service-nav"><i class="tji-arrow-right-long"></i><i class="tji-arrow-right-long"></i></span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="{{ request()->routeIs('updates') ? 'current-menu-ancestor' : '' }}">
                        <a href="{{ route('updates') }}">Events & Updates</a>
                    </li>

                    <li class="{{ request()->routeIs('contact-us') ? 'current-menu-ancestor' : '' }}">
                        <a href="{{ route('contact-us') }}">Contact</a>
                    </li>
                </ul>
              </nav>
            </div>

            <!-- header right info -->
            <div class="header-right-item d-none d-lg-inline-flex">
              <div class="header-search">
                <button class="search">
                  <i class="tji-search"></i>
                </button>
                <button type="button" class="search_close_btn">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </button>
              </div>
              <div class="header-button">
                <a class="tj-primary-btn" href="{{route('book-consultation')}}">
                  <span class="btn-text"><span>Book Consultation</span></span>
                  <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                </a>
              </div>
              <div class="menu_bar menu_offcanvas d-none d-lg-inline-flex">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>

            <!-- menu bar -->
            <div class="menu_bar mobile_menu_bar d-lg-none">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Search Popup -->
    <div class="search_popup">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="tj_search_wrapper">
              <div class="search_form">
                <form action="{{url('/')}}#">
                  <div class="search_input">
                    <div class="search-box">
                      <input class="search-form-input" type="text" placeholder="Type Words and Hit Enter" required>
                      <button type="submit">
                        <i class="tji-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- end: Header Area -->
