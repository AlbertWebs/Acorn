@extends('layouts.master')

@section('content')

<main id="primary" class="site-main">

        <div class="space-for-header"></div>
        <!-- start: Breadcrumb Section -->
        <section class="tj-page-header section-gap-x" data-bg-image="{{asset('uploads/ubuntu.webp')}}">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="tj-page-header-content text-center">
                  <h1 class="tj-page-title">About Us</h1>
                  <div class="tj-page-link">
                    <span><i class="tji-home"></i></span>
                    <span>
                      <a href="index.html">Home</a>
                    </span>
                    <span><i class="tji-arrow-right"></i></span>
                    <span>
                      <span>About Us</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="page-header-overlay" data-bg-image="{{asset('acorn/assets/images/shape/pheader-overlay.webp')}}"></div>
        </section>
        <!-- end: Breadcrumb Section -->

        <!-- start: Choose Section -->
        <section id="choose" class="tj-choose-section section-gap">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading-wrap">
                  <span class="sub-title wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i>Our Story</span>
                  <div class="heading-wrap-content">
                    <div class="sec-heading">
                      <h2 class="sec-title title-anim"><span>Acorn Special Tutorials?</span></h2>
                    </div>
                    <div class="btn-wrap wow fadeInUp" data-wow-delay=".6s">
                      <a class="tj-primary-btn" href="{{route('our-history')}}">
                        <span class="btn-text"><span>Our History</span></span>
                        <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row row-gap-4">
              <div class="col-lg-12">
                <div class="choose-box">
                  <div class="choose-content">

                    <p class="desc">{!!$About->description!!}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Choose Section -->

        <!-- start: About Section -->
        <section class="tj-about-section-2 section-gap section-gap-x">
          <div class="container">
            <div class="row">
              <div class="col-xl-6 col-lg-6 order-lg-1 order-2">
                <div class="about-img-area style-2 wow fadeInLeft" data-wow-delay=".3s">
                  <div class="about-img overflow-hidden">
                    <img data-speed=".8" src="{{ asset('storage/' . $About->featured_image) }}" alt="">
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 order-lg-2 order-1">
                <div class="about-content-area">
                  <div class="sec-heading">
                    <span class="sub-title wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i>What Drives US</span>

                  </div>
                </div>
                <div class="about-bottom-area">
                  <div class="mission-vision-box wow fadeInLeft" data-wow-delay=".5s">
                    <h4 class="title">Our Mission</h4>
                    <p class="desc">{!!$About->mission!!}</p>

                  </div>
                  <div class="mission-vision-box wow fadeInRight" data-wow-delay=".5s">
                    <h4 class="title">Our Vision</h4>
                    <p class="desc">{!!$About->vision!!}</p>
                  </div>
                </div>
                <div class="about-btn-area wow fadeInUp" data-wow-delay=".6s">
                  <a class="tj-primary-btn" href="about.html">
                    <span class="btn-text"><span>Learn More About Us</span></span>
                    <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-shape-1">
            <img src="assets/images/shape/pattern-2.svg" alt="">
          </div>
          <div class="bg-shape-2">
            <img src="assets/images/shape/pattern-3.svg" alt="">
          </div>
        </section>
        <!-- end: About Section -->

        <!-- start: Client Section -->
        <!-- start: Client Section -->
        <section class="tj-client-section-2 client-section-gap-2 wow fadeInUp" data-wow-delay=".4s">
            <div class="container-fluid client-container">
                <div class="row">
                     <div class="client-content">
                    <h5 class="sec-title">
                        Handled Over <span class="client-numbers">1000+</span>
                        <span class="client-text">Children and Adults</span> With Special Needs
                    </h5>
                    </div>
                <div class="col-12">


                    <div class="swiper client-slider client-slider-1">
                    <div class="swiper-wrapper">
                        @foreach($clients as $client)
                        <div class="swiper-slide client-item">
                            <div class="client-logo">
                            <img style="width:314px; height:120px; object-fit:contain !important" src="{{ asset('storage/' . $client->image) }}" alt="{{ $client->name }}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </div>

                </div>
                </div>
            </div>
        </section>
        <!-- end: Client Section -->



        <!-- end: Client Section -->

        <!-- start: Testimonial Section -->
        <section class="tj-testimonial-section-2 section-bottom-gap">
          <div class="container">
            <div class="row row-gap-3">
              <div class="col-lg-6">
                    <div class="faq-img-area tj-arrange-item-2">
                    <div class="faq-img overflow-hidden">
                        <img src="{{ asset('uploads/Ubuntu-plant.jpg') }}" alt="">
                        {{-- <h2 class="title"></h2> --}}
                    </div>

                    </div>
                </div>
              <div class="col-lg-6 order-lg-1">
                {{--  --}}
                <!-- start: Testimonial Section -->
                <div class="testimonial-wrapper wow fadeInUp" data-wow-delay=".5s">
                <div class="swiper testimonial-slider-2">
                    <div class="swiper-wrapper">
                    @foreach($testimonials as $item)
                        <div class="swiper-slide">
                        <div class="testimonial-item">
                            <span class="quote-icon"><i class="tji-quote"></i></span>
                            <div class="desc">
                            <p>{{ $item->message }}</p>
                            </div>
                            <div class="testimonial-author">
                            <div class="author-inner">
                                <div class="author-img">
                                <img src="{{ asset($item->photo ?? 'assets/images/testimonial/default.webp') }}" alt="{{ $item->name }}">
                                </div>
                                <div class="author-header">
                                <h4 class="title">{{ $item->name }}</h4>
                                @if($item->position || $item->company)
                                    <span class="designation">
                                    {{ $item->position }}{{ $item->company ? ', ' . $item->company : '' }}
                                    </span>
                                @endif
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    @endforeach
                    </div>
                    <div class="swiper-pagination-area"></div>
                </div>
                </div>
                <!-- end: Testimonial Section -->

                {{--  --}}
              </div>
            </div>
          </div>
        </section>
        <!-- end: Testimonial Section -->

        <!-- start: Team Section -->
        <section class="tj-team-section-3 section-gap section-gap-x">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading text-center">
                  <span class="sub-title wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i> Meet Our Director</span>
                  <h2 class="sec-title title-anim"> <span>Our Leadership</span></h2>
                </div>
              </div>
            </div>
            <div class="row leftSwipeWrap">
              <div class="col-lg-3 col-sm-6" style="margin:0 auto">
                <div class="team-item left-swipe">
                  <div class="team-img">
                    <div class="team-img-inner">
                      <img src="{{ asset($Founder->image) }}" alt="">
                    </div>
                    <div class="social-links">
                      <ul>
                        <li><a href="{{$Founder->facebook}}" target="_blank"><i
                              class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li><a href="{{$Founder->instagram}}" target="_blank"><i
                              class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li><a href="{{$Founder->twitter}}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                        <li><a href="{{$Founder->linkedin}}" target="_blank"><i
                              class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="team-content">
                    <h4 class="title"><a href="{{route('the-director')}}">{{$Founder->name}}</a></h4>
                    <span class="designation">{{$Founder->title}}</span>
                    <a class="mail-at" href="mailto:{{$Settings->email}}"><i class="tji-at"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-shape-1">
            <img src="assets/images/shape/pattern-2.svg" alt="">
          </div>
          <div class="bg-shape-2">
            <img src="assets/images/shape/pattern-3.svg" alt="">
          </div>
        </section>
        <!-- end: Team Section -->


         <!-- start: Faq Section -->
        <section class="tj-faq-section section-gap tj-arrange-container-2">
            <div class="container">
                <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="faq-img-area tj-arrange-item-2">
                    <div class="faq-img overflow-hidden">
                        <img src="{{ asset('uploads/Ubuntu-plant.jpg') }}" alt="">
                        <h2 class="title">Need Help? Start Here...</h2>
                    </div>
                    <div class="box-area">
                        <div class="call-box wow fadeInUp" data-wow-delay=".5s">
                        <h4 class="title">Need Assessment?</h4>
                        <span class="call-icon"><i class="tji-phone"></i></span>
                        <a class="number" href="tel:{{ $Settings->mobile }}">
                            <span>{{ $Settings->mobile }}</span>
                        </a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="accordion tj-faq tj-arrange-item-2" id="faqOne">
                    @foreach($faqs as $index => $faq)
                        <div class="accordion-item {{ $index === 0 ? 'active' : '' }}">
                        <button class="faq-title {{ $index === 0 ? '' : 'collapsed' }}"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq-{{ $faq->id }}"
                                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                            {{ $faq->question }}
                        </button>
                        <div id="faq-{{ $faq->id }}"
                            class="collapse {{ $index === 0 ? 'show' : '' }}"
                            data-bs-parent="#faqOne">
                            <div class="accordion-body faq-text">
                            <p>{{ $faq->answer }}</p>
                            </div>
                        </div>
                        </div>
                    @endforeach
                    </div>
                </div>
                </div>
            </div>
        </section>

        <!-- end: Faq Section -->

      </main>



@endsection
