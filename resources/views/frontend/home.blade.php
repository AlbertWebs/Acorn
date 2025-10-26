@extends('layouts.master')

@section('content')

<main id="primary" class="site-main">
        <div class="space-for-header"></div>
        <!-- start: Banner Section -->
        <section class="tj-banner-section section-gap-x">
          <div class="banner-area">
            <div class="banner-left-box">
              <div class="banner-content">
                <span class="sub-title wow fadeInDown" data-wow-delay=".2s">
                  <i class="tji-excellence"></i> Excellence in Diversity
                </span>
                <h1 class="banner-title title-anim">Rooted in Ubuntu Growing Inclusive
                  <span>Futures.</span>
                </h1>
                <div class="banner-desc-area wow fadeInUp" data-wow-delay=".7s">
                  <a class="banner-link" href="about.html">
                    <span><i class="tji-arrow-right-big"></i></span>
                  </a>
                  <div class="banner-desc">We are committed to growing inclusive futures where compassion, unity, and shared progress thrive.

                  </div>
                </div>
              </div>
              <div class="banner-shape">
                <img src="{{asset('acorn/assets/images/shape/pattern-bg.webp')}}" alt="">
              </div>
            </div>
            <div class="banner-right-box">
              <div class="banner-img">
                <img data-speed="0.8" src="{{asset('uploads/Ubuntu-plant.jpg')}}" alt="">
              </div>
              {{--  --}}
               <div class="box-area">
                <div class="call-box wow fadeInUp" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                    <h4 class="title">Need Consultation? </h4>
                    <span class="call-icon"><i class="tji-phone"></i></span>
                    <a class="number" href="tel:{{$Settings->mobile}}"><span>{{$Settings->mobile}}</span></a>
                </div>
                </div>
              {{--  --}}
            </div>
          </div>
          <div class="banner-scroll wow fadeInDown" data-wow-delay="2s">
            <a href="{{url('/')}}#about" class="scroll-down">
              <span><i class="tji-arrow-down-long"></i></span>
              Scroll Down
            </a>
          </div>
        </section>
        <!-- end: Banner Section -->

         <!-- start: About Section -->
        <section class="tj-about-section h8-about section-gap">
          <div class="container">
            <div class="row row-gap-4">
              <div class="col-12">
                <div class="about-content-area-2 wow fadeInUp" data-wow-delay=".3s">
                  <div class="sec-heading style-3">
                    <div class="row">
                      <div class="col-12 col-lg-4">
                        <div class="h8-about-left">
                          <span class="sub-title wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i>Get to Know
                            Us</span>
                        </div>

                      </div>
                      <div class="col-12 col-lg-8">
                        <div class="h8-about-content-inner">
                          <h2 class="sec-title title-highlight">
                             Creating meaningful change through trust, innovation, and shared purpose, focusing on measurable results that empower families and build lasting relationships.
                          </h2>


                        </div>

                      </div>

                    </div>
                    <div class="row align-items-center">
                      <div class="col-12 col-lg-4">
                        <div class="h8-about-video">
                          <img src="{{asset('uploads/eva-naputuni.jpg')}}" alt="">
                          <a class="h8-about-video-btn video-popup" href="https://youtu.be/OtgJ-GJCD-E"
                            data-autoplay="true" data-vbtype="video">
                            <i class="tji-play"></i>
                          </a>

                        </div>
                      </div>
                      <div class="col-12 col-lg-8">
                        <div class="h8-about-item-wrapper">

                          <div class="h8-about-item h8-about-item-counter">
                            <div class="countup-item style-2">
                              <div class="count-inner">
                                <div class="inline-content">
                                  <span class="odometer countup-number" data-count="35"></span>
                                  <sup class="count-plus">+</sup>
                                </div>
                                <span class="count-text">Years of Industry Experience.</span>
                              </div>
                            </div>
                          </div>
                          <div class="h8-about-item h8-about-item-desc">
                            <div class="h8-about-item-content">

                              <p class="desc">Our approach is holistic and inclusive, focusing on every learner’s unique potential. We combine evidence-based practices, compassion, and collaboration to create meaningful learning experiences. By empowering families, supporting educators, and fostering community partnerships, we build lasting foundations that promote growth, confidence, and lifelong learning success.</p>
                              <div class="about-btn-area-2 wow fadeInUp" data-wow-delay="1s">
                                <a class="tj-primary-btn" href="{{url('about-us')}}">
                                  <span class="btn-text"><span>Our Story</span></span>
                                  <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                                </a>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

        </section>
        <!-- end: About Section -->



        <!-- start: Choose Section -->
        <section id="about" class="tj-choose-section h8-choose section-gap-x">
            <div class="container-fluid gap-0">
                <div class="row align-items-center flex-column-reverse flex-lg-row">
                <div class="col-12 col-lg-6 align-self-stretch">
                    <div class="h8-choose-banner">
                    <img data-speed=".8" class="wow fadeInLeftBig" data-wow-delay=".3s"
                        src="{{ asset('uploads/ubuntu.webp') }}" alt="">
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="h8-choose-content-wrapper">
                    <div class="sec-heading style-3">
                        <span class="sub-title wow fadeInUp" data-wow-delay=".3s">
                        <i class="tji-box"></i>Our Purpose
                        </span>
                        <h2 class="sec-title title-anim">Bridge of hope, Connection and Possibility.</h2>
                    </div>

                    <div class="h8-choose-box-wrapper">

                        <div class="choose-box h6-choose-box h8-choose-box wow fadeInUp" data-wow-delay=".3s">
                        <div class="choose-content">
                            <div class="choose-icon">
                            <i class="fa-solid fa-child-reaching"></i>
                            </div>
                            <div>
                            <h4 class="title">For Learners:</h4>
                            <p class="desc">We open doors to discovery, designing personalized pathways that help every child grow, flourish, and believe in their own brilliance.</p>
                            </div>
                        </div>
                        </div>

                        <div class="choose-box h6-choose-box h8-choose-box wow fadeInUp" data-wow-delay=".4s">
                        <div class="choose-content">
                            <div class="choose-icon">
                            <i class="fa-solid fa-people-roof"></i>
                            </div>
                            <div>
                            <h4 class="title">For parents and families:</h4>
                            <p class="desc">
                                We walk alongside you, offering guidance, encouragement, and strength, so that no family ever feels alone on this journey.
                            </p>
                            </div>
                        </div>
                        </div>

                        <div class="choose-box h6-choose-box h8-choose-box wow fadeInUp" data-wow-delay=".5s">
                        <div class="choose-content">
                            <div class="choose-icon">
                            <i class="fa-solid fa-chalkboard-user"></i>
                            </div>
                            <div>
                            <h4 class="title">For schools and educators:</h4>
                            <p class="desc">
                                We equip teachers with knowledge, tools, and confidence to create classrooms where diversity is celebrated, not feared.
                            </p>
                            </div>
                        </div>
                        </div>

                        <div class="choose-box h6-choose-box h8-choose-box wow fadeInUp" data-wow-delay=".6s">
                        <div class="choose-content">
                            <div class="choose-icon">
                            <i class="fa-solid fa-earth-africa"></i>
                            </div>
                            <div>
                            <h4 class="title">For society:</h4>
                            <p class="desc">
                                We stand as advocates for inclusion and dignity, raising awareness, breaking down barriers, and building communities where everyone belongs.
                            </p>
                            </div>
                        </div>
                        </div>

                    </div>
                    </div>

                </div>
                </div>
            </div>

            <div class="bg-shape-2">
                <img src="{{ asset('acorn/assets/images/shape/pattern-3.svg') }}" alt="">
            </div>
        </section>
        <!-- end: Choose Section -->


          <!-- start: Service Section -->
        <section class="tj-service-section-5 section-gap">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="sec-heading style-4 text-center">
                  <span class="sub-title wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i>What We Do</span>
                  <h2 class="sec-title title-anim" style="text-transform: capitalize">Inclusion is not just our principle it is <span>our practice.</span></h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="service-wrapper">
                  @foreach($Services as $service)
                  <div class="service-item style-5 service-stack">
                    <div class="service-content-area">
                      <div class="service-icon">
                        <i class="tji-service-1"></i>
                      </div>
                      <div class="service-content">
                        <span class="no">0{{$service->id}}.</span>
                        <h3 class="title"><a href="{{route('services-single', $service->slug)}}">{{$service->title}}</a></h3>
                        <p class="desc">Through a combination of data-driven insights and innovative approaches, we work
                          closely with you to develop customized.</p>
                        <a class="tj-primary-btn" href="{{route('services-single', $service->slug)}}">
                          <span class="btn-text"><span>Learn More</span></span>
                          <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                        </a>
                      </div>
                    </div>
                    <div class="service-img">
                      <img style="object-fit:cover" src="{{ asset('storage/' . $service->image) }}" alt="">
                    </div>
                  </div>
                  @endforeach

                </div>
                <div class="service-bottom-text">
                  <p class="desc"><span><i class="tji-box"></i>You need a more personalized consultation?. <a
                        href="tel:{{$Settings->mobile}}">Talk to us today</a></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Service Section -->




         <!-- start: Contact Section -->
        <section class="tj-contact-section h4-contact-section section-gap section-gap-x">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="contact-form style-3 wow fadeInUp" data-wow-delay=".4s">
                  <div class="sec-heading style-4">
                    <span class="sub-title"><i class="tji-box"></i>Get in Touch</span>
                    <h2 class="sec-title title-anim">Drop us a Line Here.</h2>
                  </div>
                  <form id="contact-form-3">
                    <div class="row wow fadeInUp" data-wow-delay=".5s">
                      <div class="col-sm-6">
                        <div class="form-input">
                          <label class="cf-label">Full Name *</label>
                          <input type="text" name="cfName3">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-input">
                          <label class="cf-label">Email Address *</label>
                          <input type="email" name="cfEmail3">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-input">
                          <label class="cf-label">Phone number *</label>
                          <input type="tel" name="cfPhone3">
                        </div>
                      </div>
                      <?php
                        $Ser = \App\Models\Service::all();
                      ?>
                      <div class="col-sm-6">
                        <div class="form-input">
                          <div class="tj-nice-select-box">
                            <div class="tj-select">
                              <label class="cf-label">Chose a Service</label>
                              <select name="cfSubject3">
                                @foreach ($Ser as $service)
                                    <option value="{{$service->id}}">{{$service->title}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-input message-input">
                          <label class="cf-label">Message here... *</label>
                          <textarea name="cfMessage3" id="message"></textarea>
                        </div>
                      </div>
                      <div class="submit-btn">
                        <button class="tj-primary-btn" type="submit">
                          <span class="btn-text"><span>Send Message</span></span>
                          <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-lg-6">
                {{--  --}}
                <div class="testimonial-wrapper-3 wow fadeInUp" data-wow-delay=".5s">
                <div class="swiper testimonial-slider-2 h4-testimonial">
                    <h3 class="tes-title">Client Feedback (4.8<span>/out of {{count($feedbacks)}}</span>)</h3>
                    <div class="swiper-wrapper">

                    @foreach ($feedbacks as $feedback)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                        <span class="quote-icon"><i class="tji-quote"></i></span>
                        <div class="desc">
                            <p>{{ $feedback->message }}</p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-inner">
                            <div class="author-img">
                                <img src="{{ asset($feedback->photo) }}" alt="{{ $feedback->name }}">
                            </div>
                            <div class="author-header">
                                <h4 class="title">{{ $feedback->name }}</h4>
                                <span class="designation">{{ $feedback->position }}</span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endforeach

                    </div>
                    <div class="testimonial-navigation d-flex">
                    <div class="slider-prev">
                        <span class="anim-icon">
                        <i class="tji-arrow-left"></i>
                        <i class="tji-arrow-left"></i>
                        </span>
                    </div>
                    <div class="slider-next">
                        <span class="anim-icon">
                        <i class="tji-arrow-right"></i>
                        <i class="tji-arrow-right"></i>
                        </span>
                    </div>
                    </div>
                </div>
                </div>
                {{--  --}}
              </div>
            </div>
          </div>
          <div class="bg-shape-1">
            <img src="{{ asset('acorn/assets/images/shape/pattern-2.svg')}}" alt="">
          </div>
          <div class="bg-shape-2">
            <img src="{{ asset('acorn/assets/images/shape/pattern-3.svg')}}" alt="">
          </div>
        </section>
        <!-- end: Contact Section -->

          <!-- start: Client Section -->
        <div class="tj-client-section-2 section-gap-x wow fadeInUp" data-wow-delay=".4s">
          <div class="container-fluid client-container">
            <div class="row">
              <div class="col-12">
                <div class="swiper client-slider client-slider-2">
                  <div class="swiper-wrapper">
                    @foreach($clients as $client)
                    <div class="swiper-slide client-item">
                        <div class="client-logo" style="background-color: #ffffff">
                            <img style="width:314px; height:120px; object-fit:contain !important" src="{{ asset('storage/' . $client->image) }}" alt="{{ $client->name }}">
                        </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end: Client Section -->




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
                        <h4 class="title">Need Consultation?</h4>
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
