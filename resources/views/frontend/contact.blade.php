@extends('layouts.master')

@section('content')

  <div class="space-for-header"></div>
        <!-- start: Breadcrumb Section -->
        <section class="tj-page-header section-gap-x" data-bg-image="{{asset('uploads/ubuntu.webp')}}">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="tj-page-header-content text-center">
                  <h1 class="tj-page-title">Contact Us</h1>
                  <div class="tj-page-link">
                    <span><i class="tji-home"></i></span>
                    <span>
                      <a href="index.html">Home</a>
                    </span>
                    <span><i class="tji-arrow-right"></i></span>
                    <span>
                      <span>Contact Us</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="page-header-overlay" data-bg-image="{{asset('acorn/assets/images/shape/pheader-overlay.webp')}}"></div>
        </section>
        <!-- end: Breadcrumb Section -->

        <!-- start: Contact Top Section -->
        <div class="tj-contact-area section-gap">
        <div class="container">
            <div class="row">
            <div class="col-12">
                <div class="sec-heading text-center">
                <span class="sub-title wow fadeInUp" data-wow-delay=".1s">
                    <i class="tji-box"></i>Contact info
                </span>
                <h2 class="sec-title title-anim"><span>Reach</span> Out to Us</h2>
                </div>
            </div>
            </div>

            <div class="row row-gap-4">
            <!-- Location -->
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="contact-item style-2 wow fadeInUp" data-wow-delay=".3s">
                <div class="contact-icon">
                    <i class="tji-location-3"></i>
                </div>
                <h3 class="contact-title">Our Location</h3>
                <p>{{ $Settings->location ?? 'Location not available' }}</p>
                </div>
            </div>

            <!-- Email -->
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="contact-item style-2 wow fadeInUp" data-wow-delay=".5s">
                <div class="contact-icon">
                    <i class="tji-envelop"></i>
                </div>
                <h3 class="contact-title">Email us</h3>
                <ul class="contact-list">
                    @if($Settings->email)
                    <li><a href="mailto:{{ $Settings->email }}">{{ $Settings->email }}</a></li>
                    @endif
                </ul>
                </div>
            </div>

            <!-- Phone -->
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="contact-item style-2 wow fadeInUp" data-wow-delay=".7s">
                <div class="contact-icon">
                    <i class="tji-phone"></i>
                </div>
                <h3 class="contact-title">Call us</h3>
                <ul class="contact-list">
                    @if($Settings->mobile)
                    <li><a href="tel:{{ $Settings->mobile }}">{{ $Settings->mobile }}</a></li>
                    @endif
                </ul>
                </div>
            </div>

            <!-- Live Chat / WhatsApp -->
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="contact-item style-2 wow fadeInUp" data-wow-delay=".9s">
                <div class="contact-icon">
                    <i class="tji-chat"></i>
                </div>
                <h3 class="contact-title">Live Chat</h3>
                <ul class="contact-list">
                    @if($Settings->whatsapp)
                    <li>
                        <a href="https://wa.me/{{ preg_replace('/\D/', '', $Settings->whatsapp) }}" target="_blank">
                        Chat on WhatsApp
                        </a>
                    </li>
                    @endif
                    @if($Settings->tawkto)
                    <li class="active"><a href="#">Live Chat Available</a></li>
                    @else
                    <li><a href="#">Chat Offline</a></li>
                    @endif
                </ul>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- end: Contact Top Section -->


        <!-- start: Contact Section -->
        <section class="tj-contact-section-2 section-bottom-gap">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="contact-form wow fadeInUp" data-wow-delay=".1s">
                  <h3 class="title">Feel Free to Get in Touch or Visit Us at {{$Settings->location}}.</h3>
                  <form id="contact-form">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-input">
                          <input type="text" name="cfName">
                          <label class="cf-label">Full Name <span>*</span></label>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-input">
                          <input type="email" name="cfEmail">
                          <label class="cf-label">Email Address <span>*</span></label>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-input">
                          <input type="tel" name="cfPhone">
                          <label class="cf-label">Phone number <span>*</span></label>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-input">
                          <div class="tj-nice-select-box">
                            <div class="tj-select">
                              <select name="cfSubject">
                                <option value="0">Chose a option</option>
                                <option value="1">Business Strategy</option>
                                <option value="2">Customer Experience</option>
                                <option value="3">Sustainability and ESG</option>
                                <option value="4">Training and Development</option>
                                <option value="5">IT Support & Maintenance</option>
                                <option value="6">Marketing Strategy</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-input message-input">
                          <textarea name="cfMessage" id="message"></textarea>
                          <label class="cf-label">Type message <span>*</span></label>
                        </div>
                      </div>
                      <div class="submit-btn">
                        <button class="tj-primary-btn" type="submit">
                          <span class="btn-text"><span>Submit Now</span></span>
                          <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="map-area wow fadeInUp" data-wow-delay=".3s">
                  <iframe
                    src="{{$Settings->map_iframe}}"></iframe>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Contact Section -->

@endsection
