@extends('layouts.master')

@section('content')
        <!-- Main Slider Start -->
        @include('components.slider')

        <!--Main Slider Start -->



        <!-- Sliding Text One Start -->
        <section class="sliding-text-one">
            <div class="sliding-text-one__wrap">
                <ul class="sliding-text__list list-unstyled marquee_modes">
                    <li>
                        <h2 data-hover="Ride" class="sliding-text__title">Ride
                            </h2>
                    </li>
                    <li>
                        <h2 data-hover="With" class="sliding-text__title">With</h2>
                    </li>
                    <li>
                        <h2 data-hover="a" class="sliding-text__title">a
                           </h2>
                    </li>
                    <li>
                        <h2 data-hover="Touch" class="sliding-text__title">Touch</h2>
                    </li>
                    <li>
                        <h2 data-hover="of" class="sliding-text__title">of </h2>
                    </li>
                    <li>
                        <h2 data-hover="Class" class="sliding-text__title">Class</h2>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Sliding Text One End -->

        <!-- Services One Start -->
        <section class="services-one">
            <div class="services-one__shape-1"></div>
            <div class="services-one__shape-2"></div>
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style1">
                    <div class="section-title__tagline-box justify-content-center">
                        <div class="section-title__tagline-shape">
                            <img src="{{asset('main-html/assets/images/shapes/section-title-tagline-shape-2.png')}}" alt="">
                        </div>
                        <span class="section-title__tagline">What We’re Offering</span>
                    </div>
                    <h2 class="section-title__title title-animation">Tailored <strong>Luxury</strong> Experience<br> for Every Journey</h2>
                </div>
                <div class="row">
                    <!--Services One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms"
                        data-wow-duration="1500ms">
                        <div class="services-one__single">
                            <div class="services-one__single-shape-1"></div>
                            <div class="services-one__single-shape-2"></div>
                            <div class="services-one__single-shape-3"></div>
                            <div class="services-one__count"></div>
                            <div class="services-one__icon">
                                <span class="icon-car"></span>
                            </div>
                            <h3 class="services-one__title"><a href="services.html">Corporate car rental</a>
                            </h3>
                            <p class="services-one__text" style="min-height:100px">
                                Corporate car rental ensures reliable, professional, and comfortable transportation for business needs.
                            </p>
                        </div>
                    </div>
                    <!--Services One Single End-->
                    <!--Services One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="300ms"
                        data-wow-duration="1500ms">
                        <div class="services-one__single">
                            <div class="services-one__single-shape-1"></div>
                            <div class="services-one__single-shape-2"></div>
                            <div class="services-one__single-shape-3"></div>
                            <div class="services-one__count"></div>
                            <div class="services-one__icon">
                                <span class="icon-car-insurance"></span>
                            </div>
                            <h3 class="services-one__title"><a href="services.html">Car rental with driver</a>
                            </h3>
                            <p class="services-one__text" style="min-height:100px">Car rental with driver offers safe, convenient, and professional travel for clients.</p>
                        </div>
                    </div>
                    <!--Services One Single End-->
                    <!--Services One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="500ms"
                        data-wow-duration="1500ms">
                        <div class="services-one__single">
                            <div class="services-one__single-shape-1"></div>
                            <div class="services-one__single-shape-2"></div>
                            <div class="services-one__single-shape-3"></div>
                            <div class="services-one__count"></div>
                            <div class="services-one__icon">
                                <span class="icon-car-insurance"></span>
                            </div>
                            <h3 class="services-one__title"><a href="services.html">Airport transfer</a></h3>
                            <p class="services-one__text" style="min-height:100px">Reliable airport transfer ensures timely, comfortable, and hassle-free travel for passengers.</p>
                        </div>
                    </div>
                    <!--Services One Single End-->
                    <!--Services One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="700ms"
                        data-wow-duration="1500ms">
                        <div class="services-one__single">
                            <div class="services-one__single-shape-1"></div>
                            <div class="services-one__single-shape-2"></div>
                            <div class="services-one__single-shape-3"></div>
                            <div class="services-one__count"></div>
                            <div class="services-one__icon">
                                <span class="icon-car-insurance"></span>
                            </div>
                            <h3 class="services-one__title"><a href="services.html">Fleet leasing</a></h3>
                            <p class="services-one__text" style="min-height:100px">Fleet leasing provides businesses affordable, flexible, and efficient vehicle solutions long-term.</p>
                        </div>
                    </div>
                    <!--Services One Single End-->
                </div>
            </div>
        </section>
        <!-- Services One End -->

        <!-- About One Start -->
        <section class="about-one">
            <div class="container">
                <div class="row flex flex-wrap items-stretch">
                    <!-- Image Side -->
                    <div class="col-xl-6 flex">
                        <div class="about-one__lefts wow slideInLeft flex-1 flex flex-col justify-center"
                            data-wow-delay="100ms" data-wow-duration="2500ms">
                            <div class="about-one__img-box">
                                <div class="about-one__img">
                                    <img style="max-height:720px; object-fit:cover" class="border-3 border-white w-full h-auto" src="{{asset('uploads/about.png')}}" alt="">
                                </div>
                                <div class="about-one__experience mt-4">
                                    <div class="about-one__experience-count">
                                        <h3 class="odometer" data-count="10">00</h3>
                                        <span>+</span>
                                    </div>
                                    <p class="about-one__experience-text">Years of <br>Experience</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Text Side -->
                    <div class="col-xl-6 flex">
                        <div class="about-one__right flex-1 flex flex-col justify-center">
                            <div class="section-title text-left sec-title-animation animation-style1">
                                <div class="section-title__tagline-box">
                                    <div class="section-title__tagline-shape">
                                        <img src="{{asset('main-html/assets/images/shapes/section-title-tagline-shape-2.png')}}" alt="">
                                    </div>
                                    <span class="section-title__tagline">About Nuhi Great Travels</span>
                                </div>
                                <h2 class="section-title__title title-animation">Luxury car rental company</h2>
                            </div>
                            <p class="about-one__text-1">Dedicated to delivering exceptional service to every customer.</p>
                            <p class="about-one__text-2">
                                Nuhi Great Travels is your trusted partner in reliable and comfortable transportation solutions. We specialize in corporate car rentals, airport transfers, fleet leasing, and chauffeured services tailored to meet the unique needs of individuals and businesses.
                                <br><br>
                                With a commitment to excellence, safety, and professionalism, we go beyond just driving—we create seamless travel experiences that combine convenience, comfort, and class. Whether you’re on a business trip, vacation, or daily commute, Nuhi Great Travels ensures every journey is smooth, timely, and memorable.
                                <br><br>
                                As Kenya’s premier luxury and executive car rental service, we are dedicated to providing unparalleled comfort, style, and convenience. Our fleet of high-end vehicles is designed for business, leisure, and special events. We cater to individuals, corporate clients, and tourists, offering a luxurious experience that goes beyond mere transportation.
                            </p>
                            <div class="about-one__btn-box-and-call-box mt-6 flex items-center gap-4">
                                <div class="about-one__btn-box">
                                    <a href="{{route('about')}}" class="about-one__btn thm-btn">Read More
                                        <span class="fas fa-arrow-right"></span>
                                    </a>
                                </div>
                                <div class="about-one__call-box flex items-center gap-2">
                                    <div class="about-one__call-box-icon">
                                        <span class="icon-call-2"></span>
                                    </div>
                                    <div class="about-one__call-box-content">
                                        <p>Call Anytime</p>
                                        <h4><a href="tel:{{$Settings->mobile}}">{{$Settings->mobile}}</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About One End -->


        <!-- Booking One Start -->
        <section class="booking-one">
            <div class="booking-one__wrap">
                <div class="booking-one__bg"
                    style="background-image: url(assets/images/backgrounds/booking-one-bg.jpg);"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-5">
                            <div class="booking-one__left">
                                <div class="booking-one__img wow slideInLeft" data-wow-delay="100ms"
                                    data-wow-duration="2500ms">
                                    <img src="{{asset('uploads/book-guys.png')}}" alt="">
                                </div>
                                <div class="booking-one__shape-1 float-bob-x">
                                    <img src="{{asset('main-html/assets/images/shapes/booking-one-shape-1.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="booking-one__right wow slideInRight" data-wow-delay="100ms"
                                data-wow-duration="2500ms">
                                <div class="booking-one__content">
                                    <div class="booking-one__title-box">
                                        <div class="booking-one__title-shape"
                                            style="background-image: url(assets/images/shapes/book-one-title-shape-1.png);">
                                        </div>
                                        <h3 class="booking-one__title">Book a car</h3>
                                    </div>
                                    <form class="contact-form-validated booking-one__form"
                                        action="https://dreamlayout.mnsithub.com/html/Nuhi Great Travels/main-html/assets/inc/sendemail.php" method="post" novalidate="novalidate">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="booking-one__input-box">
                                                    <p class="booking-one__input-title"> <span
                                                            class="icon-pin-2"></span> Pickup</p>
                                                    <div class="select-box">
                                                        <select class="selectmenu wide">
                                                            <option selected="selected">Enter a Location</option>
                                                            <option>Enter a Location 01</option>
                                                            <option>Enter a Location 02</option>
                                                            <option>Enter a Location 03</option>
                                                            <option>Enter a Location 04</option>
                                                            <option>Enter a Location 05</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="booking-one__input-box">
                                                    <p class="booking-one__input-title"> <span
                                                            class="icon-pin-2"></span> Drop of</p>
                                                    <div class="select-box">
                                                        <select class="selectmenu wide">
                                                            <option selected="selected">Enter a Location</option>
                                                            <option>Enter a Location 01</option>
                                                            <option>Enter a Location 02</option>
                                                            <option>Enter a Location 03</option>
                                                            <option>Enter a Location 04</option>
                                                            <option>Enter a Location 05</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="booking-one__input-box">
                                                    <p class="booking-one__input-title"> <span class="icon-cuv"></span>
                                                        Your car type</p>
                                                    <div class="select-box">
                                                        <select class="selectmenu wide">
                                                            <option selected="selected">Your Car Type
                                                            </option>
                                                            <option>Your Car Type 01</option>
                                                            <option>Your Car Type 02</option>
                                                            <option>Your Car Type 03</option>
                                                            <option>Your Car Type 04</option>
                                                            <option>Your Car Type 05</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="booking-one__input-box">
                                                    <p class="booking-one__input-title"> <span class="icon-date"></span>
                                                        Date</p>
                                                    <input type="text" placeholder="mm/dd/yyy" name="date"
                                                        id="datepicker">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="booking-one__btn-box">
                                                    <button type="submit" class="thm-btn">Book Now<span
                                                            class="fas fa-arrow-right"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="result"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Booking One End -->

        <!-- Why Choose One Start -->
        <section class="why-choose-one">
            <div class="why-choose-one__shape-1"></div>
            <div class="why-choose-one__shape-2"></div>
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style2">
                    <div class="section-title__tagline-box justify-content-center">
                        <div class="section-title__tagline-shape">
                            <img src="{{asset('main-html/assets/images/shapes/section-title-tagline-shape-2.png')}}" alt="">
                        </div>
                        <span class="section-title__tagline">Why Choose Us</span>
                    </div>
                    <h2 class="section-title__title title-animation">We are innovative and passionate <br> about the
                        work we
                        do.</h2>
                </div>
                <div class="row">
                    <!-- Why Choose One Single Start -->
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms"
                        data-wow-duration="1500ms">
                        <div class="why-choose-one__single">
                            <div class="why-choose-one__icon">
                                <span class="icon-range"></span>
                            </div>
                            <div class="why-choose-one__single-inner">
                                <h3 class="why-choose-one__title">Easy & Fast Booking</h3>
                                <p class="why-choose-one__text">Car service is essential for maintaining performance and
                                    longevity of vehicle. From oil changes. Dominion fowe there light she does lights
                                    begining subdue.
                                </p>
                            </div>
                            <div class="why-choose-one__btn-box">
                                <a href="listing-single.html" class="thm-btn">Rent Now<span
                                        class="fas fa-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <!-- Why Choose One Single End -->
                    <!-- Why Choose One Single Start -->
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms"
                        data-wow-duration="1500ms">
                        <div class="why-choose-one__single">
                            <div class="why-choose-one__icon">
                                <span class="icon-car-insurance"></span>
                            </div>
                            <div class="why-choose-one__single-inner">
                                <h3 class="why-choose-one__title">Many Pickup Location</h3>
                                <p class="why-choose-one__text">Car service is essential for maintaining performance and
                                    longevity of vehicle. From oil changes. Dominion fowe there light she does lights
                                    begining subdue.
                                </p>
                            </div>
                            <div class="why-choose-one__btn-box">
                                <a href="listing-single.html" class="thm-btn">Rent Now<span
                                        class="fas fa-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <!-- Why Choose One Single End -->
                    <!-- Why Choose One Single Start -->
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="500ms"
                        data-wow-duration="1500ms">
                        <div class="why-choose-one__single">
                            <div class="why-choose-one__icon">
                                <span class="icon-rating"></span>
                            </div>
                            <div class="why-choose-one__single-inner">
                                <h3 class="why-choose-one__title">Customer Satisfaction</h3>
                                <p class="why-choose-one__text">Car service is essential for maintaining performance and
                                    longevity of vehicle. From oil changes. Dominion fowe there light she does lights
                                    begining subdue.
                                </p>
                            </div>
                            <div class="why-choose-one__btn-box">
                                <a href="listing-single.html" class="thm-btn">Rent Now<span
                                        class="fas fa-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <!-- Why Choose One Single End -->
                </div>
            </div>
        </section>
        <!-- Why Choose One End -->

        <!-- Counter One Start -->
        <section class="counter-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="counter-one__left">
                            <div class="section-title text-left sec-title-animation animation-style1">
                                <div class="section-title__tagline-box">
                                    <div class="section-title__tagline-shape">
                                        <img src="{{asset('main-html/assets/images/shapes/section-title-tagline-shape-2.png')}}" alt="">
                                    </div>
                                    <span class="section-title__tagline">fun facts</span>
                                </div>
                                <h2 class="section-title__title title-animation">experience freedom on
                                    our car booking service</h2>
                            </div>
                            <p class="counter-one__text">Dominion fowe there light she does lights begining subdue
                                without run saying <br> moving winger Open multipy a green form lesser</p>
                            <div class="counter-one__main-content">
                                <ul class="list-unstyled counter-one__list">
                                    <li class="wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1500ms">
                                        <div class="counter-one__single">
                                            <div class="counter-one__shape-1"></div>
                                            <div class="counter-one__shape-2"></div>
                                            <div class="counter-one__single-inner">
                                                <div class="counter-one__icon">
                                                    <span class="icon-car"></span>
                                                </div>
                                                <div class="counter-one__count-box">
                                                    <h3 class="odometer" data-count="1000">00</h3>
                                                    <span>+</span>
                                                </div>
                                                <p class="counter-one__count-text">Vehicle fleet</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                                        <div class="counter-one__single">
                                            <div class="counter-one__shape-1"></div>
                                            <div class="counter-one__shape-2"></div>
                                            <div class="counter-one__single-inner">
                                                <div class="counter-one__icon">
                                                    <span class="icon-mileage"></span>
                                                </div>
                                                <div class="counter-one__count-box">
                                                    <h3 class="odometer" data-count="10">00</h3>
                                                    <span>M+</span>
                                                </div>
                                                <p class="counter-one__count-text">Miles of drive</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                                        <div class="counter-one__single">
                                            <div class="counter-one__shape-1"></div>
                                            <div class="counter-one__shape-2"></div>
                                            <div class="counter-one__single-inner">
                                                <div class="counter-one__icon">
                                                    <span class="icon-range"></span>
                                                </div>
                                                <div class="counter-one__count-box">
                                                    <h3 class="odometer" data-count="15">00</h3>
                                                    <span>K+</span>
                                                </div>
                                                <p class="counter-one__count-text">Booking reserved</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="wow fadeInRight" data-wow-delay="400ms" data-wow-duration="1500ms">
                                        <div class="counter-one__single">
                                            <div class="counter-one__shape-1"></div>
                                            <div class="counter-one__shape-2"></div>
                                            <div class="counter-one__single-inner">
                                                <div class="counter-one__icon">
                                                    <span class="icon-pin-2"></span>
                                                </div>
                                                <div class="counter-one__count-box">
                                                    <h3 class="odometer" data-count="50">00</h3>
                                                    <span>K+</span>
                                                </div>
                                                <p class="counter-one__count-text">Pickup & drop</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="counter-one__right">
                            <div class="counter-one__img-box">
                                <div class="counter-one__img reveal">
                                    <img src="{{asset('main-html/assets/images/resources/counter-one-img-1.jpg')}}" alt="">
                                </div>
                                <div class="counter-one__img-two reveal">
                                    <img src="{{asset('main-html/assets/images/resources/counter-one-img-2.jpg')}}" alt="">
                                </div>
                                <div class="counter-one__dot-1">
                                    <img src="{{asset('main-html/assets/images/shapes/counter-one-dot-1.png')}}" alt="">
                                </div>
                                <div class="counter-one__dot-2 float-bob-y">
                                    <img src="{{asset('main-html/assets/images/shapes/counter-one-dot-2.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Counter One End -->

        <!-- Listing One Start -->
        <section class="listing-one">
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style1">
                    <div class="section-title__tagline-box justify-content-center">
                        <div class="section-title__tagline-shape">
                            <img src="{{asset('main-html/assets/images/shapes/section-title-tagline-shape-2.png')}}" alt="">
                        </div>
                        <span class="section-title__tagline">Checkout our new cars</span>
                    </div>
                    <h2 class="section-title__title title-animation">Explore Most Popular Cars</h2>
                </div>
                <div class="listing-one__tab-box listing-one-tabs-box">
                    <ul class="listing-one-tab-buttons listing-one-tab-btns clearfix list-unstyled">
                        <li data-tab="#tesla" class="p-tab-btn active-btn"><span>Tesla</span></li>
                        <li data-tab="#honda" class="p-tab-btn"><span>Honda</span></li>
                        <li data-tab="#audi" class="p-tab-btn"><span>Audi</span></li>
                        <li data-tab="#mazda" class="p-tab-btn"><span>Mazda</span></li>
                        <li data-tab="#toyota" class="p-tab-btn"><span>Toyota</span></li>
                        <li data-tab="#acura" class="p-tab-btn"><span>Acura</span></li>
                    </ul>
                    <div class="p-tabs-content">
                        <!--tab-->
                        <div class="p-tab active-tab" id="tesla">
                            <div class="listing-one__inner">
                                <div class="listing-one__carousel owl-carousel owl-theme">
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-1.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Acura</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Acura
                                                        Sport Version</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-2.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Kia Soul</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Kia Soul
                                                        2025</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-3.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Audi</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Audi A3
                                                        2025 New</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-4.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Audi</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Ferrari
                                                        458 MM Speciale</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-5.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Acura</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Audi Sport
                                                        Version</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-6.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Toyota</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Toyota
                                                        Tacoma 4WD</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-2.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Honda</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Kia Soul
                                                        2025</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                </div>
                            </div>
                        </div>
                        <!--Tab-->
                        <!--tab-->
                        <div class="p-tab" id="honda">
                            <div class="listing-one__inner">
                                <div class="listing-one__carousel owl-carousel owl-theme">
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-1.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Acura</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Acura
                                                        Sport Version</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-2.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Kia Soul</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Kia Soul
                                                        2025</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-3.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Audi</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Audi A3
                                                        2025 New</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-4.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Audi</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Ferrari
                                                        458 MM Speciale</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-5.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Acura</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Audi Sport
                                                        Version</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-6.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Toyota</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Toyota
                                                        Tacoma 4WD</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-2.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Honda</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Kia Soul
                                                        2025</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                </div>
                            </div>
                        </div>
                        <!--tab-->
                        <!--tab-->
                        <div class="p-tab" id="audi">
                            <div class="listing-one__inner">
                                <div class="listing-one__carousel owl-carousel owl-theme">
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-1.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Acura</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Acura
                                                        Sport Version</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-2.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Kia Soul</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Kia Soul
                                                        2025</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-3.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Audi</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Audi A3
                                                        2025 New</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-4.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Audi</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Ferrari
                                                        458 MM Speciale</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-5.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Acura</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Audi Sport
                                                        Version</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-6.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Toyota</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Toyota
                                                        Tacoma 4WD</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-2.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Honda</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Kia Soul
                                                        2025</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                </div>
                            </div>
                        </div>
                        <!--tab-->
                        <!--tab-->
                        <div class="p-tab" id="mazda">
                            <div class="listing-one__inner">
                                <div class="listing-one__carousel owl-carousel owl-theme">
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-1.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Acura</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Acura
                                                        Sport Version</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-2.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Kia Soul</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Kia Soul
                                                        2025</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-3.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Audi</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Audi A3
                                                        2025 New</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-4.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Audi</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Ferrari
                                                        458 MM Speciale</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-5.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Acura</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Audi Sport
                                                        Version</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-6.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Toyota</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Toyota
                                                        Tacoma 4WD</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-2.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Honda</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Kia Soul
                                                        2025</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                </div>
                            </div>
                        </div>
                        <!--tab-->
                        <!--tab-->
                        <div class="p-tab" id="toyota">
                            <div class="listing-one__inner">
                                <div class="listing-one__carousel owl-carousel owl-theme">
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-1.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Acura</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Acura
                                                        Sport Version</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-2.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Kia Soul</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Kia Soul
                                                        2025</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-3.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Audi</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Audi A3
                                                        2025 New</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-4.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Audi</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Ferrari
                                                        458 MM Speciale</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-5.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Acura</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Audi Sport
                                                        Version</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-6.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Toyota</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Toyota
                                                        Tacoma 4WD</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-2.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Honda</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Kia Soul
                                                        2025</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                </div>
                            </div>
                        </div>
                        <!--tab-->
                        <!--tab-->
                        <div class="p-tab" id="acura">
                            <div class="listing-one__inner">
                                <div class="listing-one__carousel owl-carousel owl-theme">
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-1.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Acura</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Acura
                                                        Sport Version</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-2.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Kia Soul</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Kia Soul
                                                        2025</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-3.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Audi</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Audi A3
                                                        2025 New</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-4.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Audi</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Ferrari
                                                        458 MM Speciale</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-5.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Acura</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Audi Sport
                                                        Version</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-6.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Toyota</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Toyota
                                                        Tacoma 4WD</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                    <!-- Listing One Single Start -->
                                    <div class="item">
                                        <div class="listing-one__single">
                                            <div class="listing-one__img">
                                                <img src="{{asset('main-html/assets/images/listing/listing-1-2.jpg')}}" alt="">
                                                <div class="listing-one__brand-name">
                                                    <p>Honda</p>
                                                </div>
                                            </div>
                                            <div class="listing-one__content">
                                                <h3 class="listing-one__title"><a href="listing-single.html">Kia Soul
                                                        2025</a></h3>
                                                <div class="listing-one__meta-box-info">
                                                    <ul class="list-unstyled listing-one__meta">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-manual"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Manual</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-mileage"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>25 KM</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-fuel-type"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Diesel</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled listing-one__meta listing-one__meta--two">
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-test-drive"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Basic</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-avatar"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>Age 25</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <span class="icon-in-person"></span>
                                                            </div>
                                                            <div class="text">
                                                                <p>5 Persons</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="listing-one__car-rent-box">
                                                    <p class="listing-one__car-rent">Starting From
                                                        <span>$100/</span> Day</p>
                                                </div>
                                                <div class="listing-one__btn-box">
                                                    <a href="listing-single.html" class="thm-btn">Details Now<span
                                                            class="fas fa-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Listing One Single End -->
                                </div>
                            </div>
                        </div>
                        <!--tab-->
                    </div>
                </div>
            </div>
        </section>
        <!-- Listing One End -->

        <!-- Video One Start -->
        <section class="video-one">
            <div class="video-one__bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url(assets/images/backgrounds/video-one-bg.jpg);"></div>
            <div class="container">
                <div class="video-one__inner">
                    <h2 class="video-one__title">Want To Know More About? <br> Play Our Promotional Video Now!</h2>
                    <div class="video-one__video-link">
                        <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                            <div class="video-one__video-icon">
                                <span class="icon-play"></span>
                                <i class="ripple"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Video One End -->

        <!-- Pricing One Start -->
        <section class="pricing-one">
            <div class="pricing-one__shape-1"></div>
            <div class="pricing-one__shape-2"></div>
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style1">
                    <div class="section-title__tagline-box justify-content-center">
                        <div class="section-title__tagline-shape">
                            <img src="{{asset('main-html/assets/images/shapes/section-title-tagline-shape-2.png')}}" alt="">
                        </div>
                        <span class="section-title__tagline">Pricing & Plan</span>
                    </div>
                    <h2 class="section-title__title title-animation">Time Quick and Easy to <br> Transportation</h2>
                </div>
                <div class="row">
                    <!-- Pricing One Single Start -->
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms"
                        data-wow-duration="1500ms">
                        <div class="pricing-one__single">
                            <div class="pricing-one__title-box">
                                <h2 class="pricing-one__title">Skyline Taxi</h2>
                                <p class="pricing-one__text">Car service is essential for maintaining
                                    performance and longevity of vehicle. From oil changes</p>
                            </div>
                            <div class="pricing-one__price-and-icon-box">
                                <div class="pricing-one__price-box">
                                    <h3 class="pricing-one__price">$10 <span>/month</span> </h3>
                                </div>
                                <div class="pricing-one__icon-box">
                                    <span class="icon-taxi"></span>
                                </div>
                            </div>
                            <ul class="list-unstyled pricing-one__points">
                                <li>
                                    <div class="text">
                                        <p>Initial charge:</p>
                                    </div>
                                    <div class="price">
                                        <p>$06</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <p>Additional Kilometre:</p>
                                    </div>
                                    <div class="price">
                                        <p>$06</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <p>Per minutes stopped traffic:</p>
                                    </div>
                                    <div class="price">
                                        <p>$06</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <p>Waiting Charge:</p>
                                    </div>
                                    <div class="price">
                                        <p>$06</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="pricing-one__btn-box">
                                <a href="pricing.html" class="thm-btn">Rent Now<span
                                        class="fas fa-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <!-- Pricing One Single End -->
                    <!-- Pricing One Single Start -->
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms"
                        data-wow-duration="1500ms">
                        <div class="pricing-one__single">
                            <div class="pricing-one__title-box">
                                <h2 class="pricing-one__title">Urban Cabs</h2>
                                <p class="pricing-one__text">Car service is essential for maintaining
                                    performance and longevity of vehicle. From oil changes</p>
                            </div>
                            <div class="pricing-one__price-and-icon-box">
                                <div class="pricing-one__price-box">
                                    <h3 class="pricing-one__price">$30 <span>/month</span> </h3>
                                </div>
                                <div class="pricing-one__icon-box">
                                    <span class="icon-cuv"></span>
                                </div>
                            </div>
                            <ul class="list-unstyled pricing-one__points">
                                <li>
                                    <div class="text">
                                        <p>Initial charge:</p>
                                    </div>
                                    <div class="price">
                                        <p>$06</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <p>Additional Kilometre:</p>
                                    </div>
                                    <div class="price">
                                        <p>$06</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <p>Per minutes stopped traffic:</p>
                                    </div>
                                    <div class="price">
                                        <p>$06</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <p>Waiting Charge:</p>
                                    </div>
                                    <div class="price">
                                        <p>$06</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="pricing-one__btn-box">
                                <a href="pricing.html" class="thm-btn">Rent Now<span
                                        class="fas fa-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <!-- Pricing One Single End -->
                    <!-- Pricing One Single Start -->
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="300ms"
                        data-wow-duration="1500ms">
                        <div class="pricing-one__single">
                            <div class="pricing-one__title-box">
                                <h2 class="pricing-one__title">TurboTaxi</h2>
                                <p class="pricing-one__text">Car service is essential for maintaining
                                    performance and longevity of vehicle. From oil changes</p>
                            </div>
                            <div class="pricing-one__price-and-icon-box">
                                <div class="pricing-one__price-box">
                                    <h3 class="pricing-one__price">$50 <span>/month</span> </h3>
                                </div>
                                <div class="pricing-one__icon-box">
                                    <span class="icon-jeep"></span>
                                </div>
                            </div>
                            <ul class="list-unstyled pricing-one__points">
                                <li>
                                    <div class="text">
                                        <p>Initial charge:</p>
                                    </div>
                                    <div class="price">
                                        <p>$06</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <p>Additional Kilometre:</p>
                                    </div>
                                    <div class="price">
                                        <p>$06</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <p>Per minutes stopped traffic:</p>
                                    </div>
                                    <div class="price">
                                        <p>$06</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <p>Waiting Charge:</p>
                                    </div>
                                    <div class="price">
                                        <p>$06</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="pricing-one__btn-box">
                                <a href="pricing.html" class="thm-btn">Rent Now<span
                                        class="fas fa-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <!-- Pricing One Single End -->
                </div>
            </div>
        </section>
        <!-- Pricing One End -->

        <!--Call One Start -->
        <section class="call-one">
            <div class="container">
                <div class="call-one__inner wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="call-one__inner-content">
                        <div class="call-one__bg"
                            style="background-image: url(assets/images/backgrounds/call-one-bg.jpg);">
                        </div>
                        <div class="call-one__left">
                            <p class="call-one__sub-title">Available 24/7</p>
                            <h4 class="call-one__title">Call Any Time For Booking</h4>
                        </div>
                        <div class="call-one__details">
                            <div class="call-one__icon">
                                <span class="icon-call-2"></span>
                            </div>
                            <div class="call-one__content">
                                <p>Call Emergency</p>
                                <h4><a href="tel:+9288006780">+92 ( 8800 ) - 6780</a></h4>
                            </div>
                        </div>
                        <div class="call-one__btn-box">
                            <a href="car-list-v-1.html" class="thm-btn">Rent Now<span
                                    class="fas fa-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Call One End -->

        <!-- Popular Car One Start -->
        <section class="popular-car-one">
            <div class="popular-car-one__bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url(assets/images/backgrounds/popular-car-one-bg.jpg);"></div>
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style1">
                    <div class="section-title__tagline-box justify-content-center">
                        <div class="section-title__tagline-shape">
                            <img src="{{asset('main-html/assets/images/shapes/section-title-tagline-shape-2.png')}}" alt="">
                        </div>
                        <span class="section-title__tagline">Popular Car</span>
                    </div>
                    <h2 class="section-title__title title-animation">Most Popular Cartypes</h2>
                </div>
                <div class="popular-car-one__carousel owl-carousel owl-theme">
                    <!-- Popular Car One Single Start -->
                    <div class="item">
                        <div class="popular-car-one__single">
                            <div class="popular-car-one__icon">
                                <span class="icon-sports-car"></span>
                            </div>
                            <div class="popular-car-one__single-inner">
                                <h4 class="popular-car-one__title"><a href="car-list-v-1.html">Sports Coupe</a></h4>
                            </div>
                            <p class="popular-car-one__count">3 Cars</p>
                        </div>
                    </div>
                    <!-- Popular Car One Single End -->
                    <!-- Popular Car One Single Start -->
                    <div class="item">
                        <div class="popular-car-one__single">
                            <div class="popular-car-one__icon">
                                <span class="icon-car-2"></span>
                            </div>
                            <div class="popular-car-one__single-inner">
                                <h4 class="popular-car-one__title"><a href="car-list-v-2.html">Crossover</a></h4>
                            </div>
                            <p class="popular-car-one__count">5 Cars</p>
                        </div>
                    </div>
                    <!-- Popular Car One Single End -->
                    <!-- Popular Car One Single Start -->
                    <div class="item">
                        <div class="popular-car-one__single">
                            <div class="popular-car-one__icon">
                                <span class="icon-car-1"></span>
                            </div>
                            <div class="popular-car-one__single-inner">
                                <h4 class="popular-car-one__title"><a href="car-list-v-3.html">Pickup</a></h4>
                            </div>
                            <p class="popular-car-one__count">8 Cars</p>
                        </div>
                    </div>
                    <!-- Popular Car One Single End -->
                    <!-- Popular Car One Single Start -->
                    <div class="item">
                        <div class="popular-car-one__single">
                            <div class="popular-car-one__icon">
                                <span class="icon-cuv"></span>
                            </div>
                            <div class="popular-car-one__single-inner">
                                <h4 class="popular-car-one__title"><a href="cars.html">Family MPV</a></h4>
                            </div>
                            <p class="popular-car-one__count">6 Cars</p>
                        </div>
                    </div>
                    <!-- Popular Car One Single End -->
                    <!-- Popular Car One Single Start -->
                    <div class="item">
                        <div class="popular-car-one__single">
                            <div class="popular-car-one__icon">
                                <span class="icon-taxi"></span>
                            </div>
                            <div class="popular-car-one__single-inner">
                                <h4 class="popular-car-one__title"><a href="listing-single.html">Pickup</a></h4>
                            </div>
                            <p class="popular-car-one__count">7 Cars</p>
                        </div>
                    </div>
                    <!-- Popular Car One Single End -->
                    <!-- Popular Car One Single Start -->
                    <div class="item">
                        <div class="popular-car-one__single">
                            <div class="popular-car-one__icon">
                                <span class="icon-sedan"></span>
                            </div>
                            <div class="popular-car-one__single-inner">
                                <h4 class="popular-car-one__title"><a href="listing-single.html">Sedan</a></h4>
                            </div>
                            <p class="popular-car-one__count">9 Cars</p>
                        </div>
                    </div>
                    <!-- Popular Car One Single End -->
                </div>
            </div>
        </section>
        <!-- Popular Car One End -->

        <!-- Testimonial One Start -->
        <section class="testimonial-one">
            <div class="container">
                <div class="section-title text-left sec-title-animation animation-style2">
                    <div class="section-title__tagline-box">
                        <div class="section-title__tagline-shape">
                            <img src="{{asset('main-html/assets/images/shapes/section-title-tagline-shape-2.png')}}" alt="">
                        </div>
                        <span class="section-title__tagline">Our Testimonial</span>
                    </div>
                    <h2 class="section-title__title title-animation">What Peoples Say <br> about Nuhi Great Travels</h2>
                </div>
                <div class="testimonial-one__carousel owl-theme owl-carousel">
                    <!-- Testimonial One Single Start -->
                    <div class="item">
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__img">
                                    <img src="{{asset('main-html/assets/images/testimonial/testimonial-1-1.jpg')}}" alt="">
                                </div>
                                <div class="testimonial-one__content">
                                    <h4 class="testimonial-one__client-name"><a href="testimonials.html">Adam Smith</a>
                                    </h4>
                                    <p class="testimonial-one__sub-title">Customer</p>
                                </div>
                            </div>
                            <p class="testimonial-one__text">maintaining oral health through practices such as the
                                regular check-a ups, cleanings, and treatments for teeth and an gums.</p>
                            <div class="testimonial-one__rating">
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                            </div>
                            <div class="testimonial-one__quote">
                                <span class="icon-quote"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial One Single End -->
                    <!-- Testimonial One Single Start -->
                    <div class="item">
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__img">
                                    <img src="{{asset('main-html/assets/images/testimonial/testimonial-1-2.jpg')}}" alt="">
                                </div>
                                <div class="testimonial-one__content">
                                    <h4 class="testimonial-one__client-name"><a href="testimonials.html">Adam Milne</a>
                                    </h4>
                                    <p class="testimonial-one__sub-title">Customer</p>
                                </div>
                            </div>
                            <p class="testimonial-one__text">maintaining oral health through practices such as the
                                regular check-a ups, cleanings, and treatments for teeth and an gums.</p>
                            <div class="testimonial-one__rating">
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                            </div>
                            <div class="testimonial-one__quote">
                                <span class="icon-quote"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial One Single End -->
                    <!-- Testimonial One Single Start -->
                    <div class="item">
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__img">
                                    <img src="{{asset('main-html/assets/images/testimonial/testimonial-1-3.jpg')}}" alt="">
                                </div>
                                <div class="testimonial-one__content">
                                    <h4 class="testimonial-one__client-name"><a href="testimonials.html">Marco
                                            Janson</a>
                                    </h4>
                                    <p class="testimonial-one__sub-title">Customer</p>
                                </div>
                            </div>
                            <p class="testimonial-one__text">maintaining oral health through practices such as the
                                regular check-a ups, cleanings, and treatments for teeth and an gums.</p>
                            <div class="testimonial-one__rating">
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                            </div>
                            <div class="testimonial-one__quote">
                                <span class="icon-quote"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial One Single End -->
                    <!-- Testimonial One Single Start -->
                    <div class="item">
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__img">
                                    <img src="{{asset('main-html/assets/images/testimonial/testimonial-1-4.jpg')}}" alt="">
                                </div>
                                <div class="testimonial-one__content">
                                    <h4 class="testimonial-one__client-name"><a href="testimonials.html">Look Ronci</a>
                                    </h4>
                                    <p class="testimonial-one__sub-title">Customer</p>
                                </div>
                            </div>
                            <p class="testimonial-one__text">maintaining oral health through practices such as the
                                regular check-a ups, cleanings, and treatments for teeth and an gums.</p>
                            <div class="testimonial-one__rating">
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                            </div>
                            <div class="testimonial-one__quote">
                                <span class="icon-quote"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial One Single End -->
                    <!-- Testimonial One Single Start -->
                    <div class="item">
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__img">
                                    <img src="{{asset('main-html/assets/images/testimonial/testimonial-1-5.jpg')}}" alt="">
                                </div>
                                <div class="testimonial-one__content">
                                    <h4 class="testimonial-one__client-name"><a href="testimonials.html">Harry Broke</a>
                                    </h4>
                                    <p class="testimonial-one__sub-title">Customer</p>
                                </div>
                            </div>
                            <p class="testimonial-one__text">maintaining oral health through practices such as the
                                regular check-a ups, cleanings, and treatments for teeth and an gums.</p>
                            <div class="testimonial-one__rating">
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                            </div>
                            <div class="testimonial-one__quote">
                                <span class="icon-quote"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial One Single End -->
                    <!-- Testimonial One Single Start -->
                    <div class="item">
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__img">
                                    <img src="{{asset('main-html/assets/images/testimonial/testimonial-1-6.jpg')}}" alt="">
                                </div>
                                <div class="testimonial-one__content">
                                    <h4 class="testimonial-one__client-name"><a href="testimonials.html">Jessica
                                            Brown</a>
                                    </h4>
                                    <p class="testimonial-one__sub-title">Customer</p>
                                </div>
                            </div>
                            <p class="testimonial-one__text">maintaining oral health through practices such as the
                                regular check-a ups, cleanings, and treatments for teeth and an gums.</p>
                            <div class="testimonial-one__rating">
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                            </div>
                            <div class="testimonial-one__quote">
                                <span class="icon-quote"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial One Single End -->
                </div>
            </div>
        </section>
        <!-- Testimonial One End -->

        <!--Faq One Start -->
        <section class="faq-one">
            <div class="faq-one__shape-1"></div>
            <div class="faq-one__shape-2"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-5">
                        <div class="faq-one__left">
                            <div class="section-title text-left sec-title-animation animation-style2">
                                <div class="section-title__tagline-box">
                                    <div class="section-title__tagline-shape">
                                        <img src="{{asset('main-html/assets/images/shapes/section-title-tagline-shape-2.png')}}" alt="">
                                    </div>
                                    <span class="section-title__tagline">Our Faqs</span>
                                </div>
                                <h2 class="section-title__title title-animation">Frequently Asking Any Question</h2>
                            </div>
                            <div class="faq-one__img-box">
                                <div class="faq-one__img reveal">
                                    <img src="{{asset('main-html/assets/images/resources/faq-one-img-1.jpg')}}" alt="">
                                </div>
                                <div class="faq-one__experience-box">
                                    <div class="faq-one__experience-year">
                                        <h2 class="odometer" data-count="55">00</h2>
                                    </div>
                                    <p class="faq-one__experience-text">Year of <br> experience</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="faq-one__right">
                            <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                <div class="accrodion wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="accrodion-title">
                                        <h4>How old do I need to be to rent a car?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>From personalized solutions to expert execution, we prioritize quality,
                                                reliability, and customer satisfaction in everything we do. Let us be
                                                your trusted partner in achieving success.
                                            </p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion active wow fadeInRight" data-wow-delay="100ms"
                                    data-wow-duration="1500ms">
                                    <div class="accrodion-title">
                                        <h4>What documents do I need to rent a car?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>From personalized solutions to expert execution, we prioritize quality,
                                                reliability, and customer satisfaction in everything we do. Let us be
                                                your trusted partner in achieving success.
                                            </p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <div class="accrodion-title">
                                        <h4>What types of vehicles are available for rent?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>From personalized solutions to expert execution, we prioritize quality,
                                                reliability, and customer satisfaction in everything we do. Let us be
                                                your trusted partner in achieving success.
                                            </p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion wow fadeInRight" data-wow-delay="300ms"
                                    data-wow-duration="1500ms">
                                    <div class="accrodion-title">
                                        <h4>Can I rent a car with a debit card?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>From personalized solutions to expert execution, we prioritize quality,
                                                reliability, and customer satisfaction in everything we do. Let us be
                                                your trusted partner in achieving success.
                                            </p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion wow fadeInLeft" data-wow-delay="400ms" data-wow-duration="1500ms">
                                    <div class="accrodion-title">
                                        <h4>What is your fuel policy?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>From personalized solutions to expert execution, we prioritize quality,
                                                reliability, and customer satisfaction in everything we do. Let us be
                                                your trusted partner in achieving success.
                                            </p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Faq One End -->

        <!--Lets Talk Start -->
        <section class="lets-talk">
            <div class="lets-talk__bg" style="background-image: url(assets/images/backgrounds/lets-talk-bg.jpg);"></div>
            <div class="container">
                <div class="lets-talk__inner">
                    <div class="lets-talk__title">
                        <p>Rent Your Car</p>
                        <h2>Interested in Renting?</h2>
                    </div>
                    <div class="lets-talk__btn-boxes">
                        <div class="lets-talk__btn-1">
                            <a href="contact.html" class="thm-btn">Contact Us<span
                                    class="fas fa-arrow-right"></span></a>
                        </div>
                        <div class="lets-talk__btn-2">
                            <a href="car-list-v-1.html" class="thm-btn">Rent Now<span
                                    class="fas fa-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Lets Talk End -->


        <!--Team One Start -->
        <section class="team-one">
            <div class="team-one__shape-1"></div>
            <div class="team-one__shape-2"></div>
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style1">
                    <div class="section-title__tagline-box justify-content-center">
                        <div class="section-title__tagline-shape">
                            <img src="{{asset('main-html/assets/images/shapes/section-title-tagline-shape-2.png')}}" alt="">
                        </div>
                        <span class="section-title__tagline">Our Drivers</span>
                    </div>
                    <h2 class="section-title__title title-animation">Meet Our Premium Drivers</h2>
                </div>
                <div class="team-one__inner">
                    <div class="team-one__main-tab-box tabs-box">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5">
                                <div class="team-one__tab-buttons-box-one">
                                    <ul class="tab-buttons list-unstyled">
                                        <li data-tab="#team-1" class="tab-btn active-btn">
                                            <div class="team-one__buttons">
                                                <div class="team-one__buttons-experience-years">
                                                    <div class="team-one__buttons-experience-years-count">
                                                        <h3>05</h3>
                                                    </div>
                                                    <p class="team-one__buttons-experience-years-text">Years <br>
                                                        Experience</p>
                                                </div>
                                                <div class="team-one__buttons-content-box">
                                                    <div class="team-one__buttons-img-box">
                                                        <div class="team-one__buttons-img">
                                                            <img src="{{asset('main-html/assets/images/team/team-one-buttons-img-1-1.jpg')}}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="team-one__buttons-content">
                                                        <div class="team-one__buttons-title-box">
                                                            <h4 class="team-one__buttons-title"><a
                                                                    href="driver-details.html">Olivia Grace</a></h4>
                                                            <p class="team-one__buttons-sub-title">SR. Driver</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-tab="#team-2" class="tab-btn">
                                            <div class="team-one__buttons">
                                                <div class="team-one__buttons-experience-years">
                                                    <div class="team-one__buttons-experience-years-count">
                                                        <h3>08</h3>
                                                    </div>
                                                    <p class="team-one__buttons-experience-years-text">Years <br>
                                                        Experience</p>
                                                </div>
                                                <div class="team-one__buttons-content-box">
                                                    <div class="team-one__buttons-img-box">
                                                        <div class="team-one__buttons-img">
                                                            <img src="{{asset('main-html/assets/images/team/team-one-buttons-img-1-2.jpg')}}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="team-one__buttons-content">
                                                        <div class="team-one__buttons-title-box">
                                                            <h4 class="team-one__buttons-title"><a
                                                                    href="driver-details.html">Olivia Smith</a></h4>
                                                            <p class="team-one__buttons-sub-title">Premium Driver</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-tab="#team-3" class="tab-btn">
                                            <div class="team-one__buttons">
                                                <div class="team-one__buttons-experience-years">
                                                    <div class="team-one__buttons-experience-years-count">
                                                        <h3>04</h3>
                                                    </div>
                                                    <p class="team-one__buttons-experience-years-text">Years <br>
                                                        Experience</p>
                                                </div>
                                                <div class="team-one__buttons-content-box">
                                                    <div class="team-one__buttons-img-box">
                                                        <div class="team-one__buttons-img">
                                                            <img src="{{asset('main-html/assets/images/team/team-one-buttons-img-1-3.jpg')}}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="team-one__buttons-content">
                                                        <div class="team-one__buttons-title-box">
                                                            <h4 class="team-one__buttons-title"><a
                                                                    href="driver-details.html">James Olivia</a></h4>
                                                            <p class="team-one__buttons-sub-title">JR. Driver</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-tab="#team-4" class="tab-btn">
                                            <div class="team-one__buttons">
                                                <div class="team-one__buttons-experience-years">
                                                    <div class="team-one__buttons-experience-years-count">
                                                        <h3>07</h3>
                                                    </div>
                                                    <p class="team-one__buttons-experience-years-text">Years <br>
                                                        Experience</p>
                                                </div>
                                                <div class="team-one__buttons-content-box">
                                                    <div class="team-one__buttons-img-box">
                                                        <div class="team-one__buttons-img">
                                                            <img src="{{asset('main-html/assets/images/team/team-one-buttons-img-1-4.jpg')}}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="team-one__buttons-content">
                                                        <div class="team-one__buttons-title-box">
                                                            <h4 class="team-one__buttons-title"><a
                                                                    href="driver-details.html">Jason Ray</a></h4>
                                                            <p class="team-one__buttons-sub-title">SR. Driver</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-tab="#team-5" class="tab-btn">
                                            <div class="team-one__buttons">
                                                <div class="team-one__buttons-experience-years">
                                                    <div class="team-one__buttons-experience-years-count">
                                                        <h3>03</h3>
                                                    </div>
                                                    <p class="team-one__buttons-experience-years-text">Years <br>
                                                        Experience</p>
                                                </div>
                                                <div class="team-one__buttons-content-box">
                                                    <div class="team-one__buttons-img-box">
                                                        <div class="team-one__buttons-img">
                                                            <img src="{{asset('main-html/assets/images/team/team-one-buttons-img-1-5.jpg')}}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="team-one__buttons-content">
                                                        <div class="team-one__buttons-title-box">
                                                            <h4 class="team-one__buttons-title"><a
                                                                    href="driver-details.html">James Vince</a></h4>
                                                            <p class="team-one__buttons-sub-title">Customer Service
                                                                Coordinator
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7">
                                <div class="team-one__tabs-content-outer">
                                    <div class="tabs-content">
                                        <div class="tab active-tab" id="team-1">
                                            <div class="team-one__tabs-content-box">
                                                <div class="team-one__img-box">
                                                    <div class="team-one__img">
                                                        <img src="{{asset('main-html/assets/images/team/team-one-1-1.jpg')}}" alt="">
                                                        <div class="team-one__social">
                                                            <a href="driver-details.html"><span
                                                                    class="icon-facebook"></span></a>
                                                            <a href="driver-details.html"><span
                                                                    class="icon-twitter"></span></a>
                                                            <a href="driver-details.html"><span
                                                                    class="icon-instagram-1"></span></a>
                                                            <a href="driver-details.html"><span
                                                                    class="icon-instagram"></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab" id="team-2">
                                            <div class="team-one__tabs-content-box">
                                                <div class="team-one__img-box">
                                                    <div class="team-one__img">
                                                        <img src="{{asset('main-html/assets/images/team/team-one-1-2.jpg')}}" alt="">
                                                        <div class="team-one__social">
                                                            <a href="driver-details.html"><span
                                                                    class="icon-facebook"></span></a>
                                                            <a href="driver-details.html"><span
                                                                    class="icon-twitter"></span></a>
                                                            <a href="driver-details.html"><span
                                                                    class="icon-instagram-1"></span></a>
                                                            <a href="driver-details.html"><span
                                                                    class="icon-instagram"></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab" id="team-3">
                                            <div class="team-one__tabs-content-box">
                                                <div class="team-one__img-box">
                                                    <div class="team-one__img">
                                                        <img src="{{asset('main-html/assets/images/team/team-one-1-3.jpg')}}" alt="">
                                                        <div class="team-one__social">
                                                            <a href="driver-details.html"><span
                                                                    class="icon-facebook"></span></a>
                                                            <a href="driver-details.html"><span
                                                                    class="icon-twitter"></span></a>
                                                            <a href="driver-details.html"><span
                                                                    class="icon-instagram-1"></span></a>
                                                            <a href="driver-details.html"><span
                                                                    class="icon-instagram"></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab" id="team-4">
                                            <div class="team-one__tabs-content-box">
                                                <div class="team-one__img-box">
                                                    <div class="team-one__img">
                                                        <img src="{{asset('main-html/assets/images/team/team-one-1-4.jpg')}}" alt="">
                                                        <div class="team-one__social">
                                                            <a href="driver-details.html"><span
                                                                    class="icon-facebook"></span></a>
                                                            <a href="driver-details.html"><span
                                                                    class="icon-twitter"></span></a>
                                                            <a href="driver-details.html"><span
                                                                    class="icon-instagram-1"></span></a>
                                                            <a href="driver-details.html"><span
                                                                    class="icon-instagram"></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab" id="team-5">
                                            <div class="team-one__tabs-content-box">
                                                <div class="team-one__img-box">
                                                    <div class="team-one__img">
                                                        <img src="{{asset('main-html/assets/images/team/team-one-1-5.jpg')}}" alt="">
                                                        <div class="team-one__social">
                                                            <a href="driver-details.html"><span
                                                                    class="icon-facebook"></span></a>
                                                            <a href="driver-details.html"><span
                                                                    class="icon-twitter"></span></a>
                                                            <a href="driver-details.html"><span
                                                                    class="icon-instagram-1"></span></a>
                                                            <a href="driver-details.html"><span
                                                                    class="icon-instagram"></span></a>
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
            </div>
        </section>
        <!--Team One End -->

        <!--Download App One Start -->
        <section class="download-app-one">
            <div class="download-app-one__bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url(assets/images/backgrounds/download-app-one-bg.jpg);"></div>
            <div class="container">
                <div class="download-app-one__inner">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7">
                            <div class="download-app-one__content sec-title-animation animation-style2">
                                <p class="download-app-one__sub-title">Download Our App</p>
                                <h2 class="download-app-one__title title-animation">Nuhi Great Travels User Friendly <br> App
                                    Available</h2>
                                <p class="download-app-one__text">Get our mobile app for easy and convenient usage</p>
                                <div class="download-app-one__google-and-app-store">
                                    <a href="contact.html"><img src="{{asset('main-html/assets/images/icon/download-app-img1.png')}}"
                                            alt=""></a>
                                    <a href="contact.html"><img src="{{asset('main-html/assets/images/icon/download-app-img2.png')}}"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5">
                            <div class="download-app-one__right">
                                <div class="download-app-one__img">
                                    <div class="download-app-one__img1 reveal">
                                        <img src="{{asset('main-html/assets/images/resources/download-app-img-1.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="download-app-one-car__img float-bob-x">
                                    <img src="{{asset('main-html/assets/images/resources/download-app-car-img-1.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Download App One End -->

        <!--Brand One Start -->
        <section class="brand-one">
            <div class="container">
                <div class="brand-one__carousel owl-theme owl-carousel">
                    <!--Brand One Single Start-->
                    <div class="item">
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <a href="#"><img src="{{asset('main-html/assets/images/brand/brand-1-1.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!--Brand One Single End-->
                    <!--Brand One Single Start-->
                    <div class="item">
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <a href="#"><img src="{{asset('main-html/assets/images/brand/brand-1-2.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!--Brand One Single End-->
                    <!--Brand One Single Start-->
                    <div class="item">
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <a href="#"><img src="{{asset('main-html/assets/images/brand/brand-1-3.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!--Brand One Single End-->
                    <!--Brand One Single Start-->
                    <div class="item">
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <a href="#"><img src="{{asset('main-html/assets/images/brand/brand-1-4.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!--Brand One Single End-->
                    <!--Brand One Single Start-->
                    <div class="item">
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <a href="#"><img src="{{asset('main-html/assets/images/brand/brand-1-5.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!--Brand One Single End-->
                    <!--Brand One Single Start-->
                    <div class="item">
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <a href="#"><img src="{{asset('main-html/assets/images/brand/brand-1-6.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!--Brand One Single End-->
                </div>
            </div>
        </section>
        <!--Brand One End -->

        <!--Blog One Start-->
        <section class="blog-one">
            <div class="blog-one__shape-1"></div>
            <div class="blog-one__shape-2"></div>
            <div class="container">
                <div class="section-title text-left sec-title-animation animation-style2">
                    <div class="section-title__tagline-box">
                        <div class="section-title__tagline-shape">
                            <img src="{{asset('main-html/assets/images/shapes/section-title-tagline-shape-2.png')}}" alt="">
                        </div>
                        <span class="section-title__tagline">Our Blog</span>
                    </div>
                    <h2 class="section-title__title title-animation">Our Latest Blog</h2>
                </div>
                <div class="blog-one__carousel owl-carousel owl-theme">
                    <!--Blog One Single Start-->
                    <div class="item">
                        <div class="blog-one__single">
                            <div class="blog-one__img-box">
                                <div class="blog-one__img">
                                    <img src="{{asset('main-html/assets/images/blog/blog-1-1.jpg')}}" alt="">
                                    <div class="blog-one__tags">
                                        <span>Car Showcase</span>
                                    </div>
                                </div>
                                <div class="blog-one__date">
                                    <p>10</p>
                                    <span>Nov</span>
                                </div>
                            </div>
                            <div class="blog-one__content">
                                <ul class="blog-one__meta list-unstyled">
                                    <li>
                                        <a href="blog-details.html">
                                            <span class="fas fa-user"></span>Admin
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html">
                                            <span class="fas fa-comments"></span>Comment
                                        </a>
                                    </li>
                                </ul>
                                <h3 class="blog-one__title"><a href="blog-details.html">Documents required for car
                                        rental services</a></h3>
                                <p class="blog-one__text">Car Is Where Early Adopters And Innovation Seekers Find Lively
                                    Imaginative Tech.</p>
                                <a href="blog-details.html" class="blog-one__read-more">Read More <span
                                        class="fas fa-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <!--Blog One Single End-->
                    <!--Blog One Single Start-->
                    <div class="item">
                        <div class="blog-one__single">
                            <div class="blog-one__img-box">
                                <div class="blog-one__img">
                                    <img src="{{asset('main-html/assets/images/blog/blog-1-2.jpg')}}" alt="">
                                    <div class="blog-one__tags">
                                        <span>Car Showcase</span>
                                    </div>
                                </div>
                                <div class="blog-one__date">
                                    <p>10</p>
                                    <span>Nov</span>
                                </div>
                            </div>
                            <div class="blog-one__content">
                                <ul class="blog-one__meta list-unstyled">
                                    <li>
                                        <a href="blog-details.html">
                                            <span class="fas fa-user"></span>Admin
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html">
                                            <span class="fas fa-comments"></span>Comment
                                        </a>
                                    </li>
                                </ul>
                                <h3 class="blog-one__title"><a href="blog-details.html">One of the most effective car
                                        rental
                                        blog topic</a></h3>
                                <p class="blog-one__text">Car Is Where Early Adopters And Innovation Seekers Find Lively
                                    Imaginative Tech.</p>
                                <a href="blog-details.html" class="blog-one__read-more">Read More <span
                                        class="fas fa-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <!--Blog One Single End-->
                    <!--Blog One Single Start-->
                    <div class="item">
                        <div class="blog-one__single">
                            <div class="blog-one__img-box">
                                <div class="blog-one__img">
                                    <img src="{{asset('main-html/assets/images/blog/blog-1-3.jpg')}}" alt="">
                                    <div class="blog-one__tags">
                                        <span>Car Showcase</span>
                                    </div>
                                </div>
                                <div class="blog-one__date">
                                    <p>10</p>
                                    <span>Nov</span>
                                </div>
                            </div>
                            <div class="blog-one__content">
                                <ul class="blog-one__meta list-unstyled">
                                    <li>
                                        <a href="blog-details.html">
                                            <span class="fas fa-user"></span>Admin
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html">
                                            <span class="fas fa-comments"></span>Comment
                                        </a>
                                    </li>
                                </ul>
                                <h3 class="blog-one__title"><a href="blog-details.html">Rental cost of sport and other
                                        cars</a></h3>
                                <p class="blog-one__text">Car Is Where Early Adopters And Innovation Seekers Find Lively
                                    Imaginative Tech.</p>
                                <a href="blog-details.html" class="blog-one__read-more">Read More <span
                                        class="fas fa-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <!--Blog One Single End-->
                    <!--Blog One Single Start-->
                    <div class="item">
                        <div class="blog-one__single">
                            <div class="blog-one__img-box">
                                <div class="blog-one__img">
                                    <img src="{{asset('main-html/assets/images/blog/blog-1-4.jpg')}}" alt="">
                                    <div class="blog-one__tags">
                                        <span>Car Showcase</span>
                                    </div>
                                </div>
                                <div class="blog-one__date">
                                    <p>10</p>
                                    <span>Nov</span>
                                </div>
                            </div>
                            <div class="blog-one__content">
                                <ul class="blog-one__meta list-unstyled">
                                    <li>
                                        <a href="blog-details.html">
                                            <span class="fas fa-user"></span>Admin
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html">
                                            <span class="fas fa-comments"></span>Comment
                                        </a>
                                    </li>
                                </ul>
                                <h3 class="blog-one__title"><a href="blog-details.html">Rental cars how to check driving
                                        fines?</a></h3>
                                <p class="blog-one__text">Car Is Where Early Adopters And Innovation Seekers Find Lively
                                    Imaginative Tech.</p>
                                <a href="blog-details.html" class="blog-one__read-more">Read More <span
                                        class="fas fa-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <!--Blog One Single End-->
                    <!--Blog One Single Start-->
                    <div class="item">
                        <div class="blog-one__single">
                            <div class="blog-one__img-box">
                                <div class="blog-one__img">
                                    <img src="{{asset('main-html/assets/images/blog/blog-1-5.jpg')}}" alt="">
                                    <div class="blog-one__tags">
                                        <span>Car Showcase</span>
                                    </div>
                                </div>
                                <div class="blog-one__date">
                                    <p>10</p>
                                    <span>Nov</span>
                                </div>
                            </div>
                            <div class="blog-one__content">
                                <ul class="blog-one__meta list-unstyled">
                                    <li>
                                        <a href="blog-details.html">
                                            <span class="fas fa-user"></span>Admin
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html">
                                            <span class="fas fa-comments"></span>Comment
                                        </a>
                                    </li>
                                </ul>
                                <h3 class="blog-one__title"><a href="blog-details.html">How to Rent a Car at the Airport
                                        Terminal?</a></h3>
                                <p class="blog-one__text">Car Is Where Early Adopters And Innovation Seekers Find Lively
                                    Imaginative Tech.</p>
                                <a href="blog-details.html" class="blog-one__read-more">Read More <span
                                        class="fas fa-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <!--Blog One Single End-->
                    <!--Blog One Single Start-->
                    <div class="item">
                        <div class="blog-one__single">
                            <div class="blog-one__img-box">
                                <div class="blog-one__img">
                                    <img src="{{asset('main-html/assets/images/blog/blog-1-6.jpg')}}" alt="">
                                    <div class="blog-one__tags">
                                        <span>Car Showcase</span>
                                    </div>
                                </div>
                                <div class="blog-one__date">
                                    <p>10</p>
                                    <span>Nov</span>
                                </div>
                            </div>
                            <div class="blog-one__content">
                                <ul class="blog-one__meta list-unstyled">
                                    <li>
                                        <a href="blog-details.html">
                                            <span class="fas fa-user"></span>Admin
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html">
                                            <span class="fas fa-comments"></span>Comment
                                        </a>
                                    </li>
                                </ul>
                                <h3 class="blog-one__title"><a href="blog-details.html">Penalties for violating the
                                        rules in rental cars</a></h3>
                                <p class="blog-one__text">Car Is Where Early Adopters And Innovation Seekers Find Lively
                                    Imaginative Tech.</p>
                                <a href="blog-details.html" class="blog-one__read-more">Read More <span
                                        class="fas fa-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <!--Blog One Single End-->
                </div>
            </div>
        </section>
        <!--Blog One End-->

        <!--Gallery One Start -->
        <section class="gallery-one">
            <div class="gallery-one__carousel owl-theme owl-carousel">
                <!--Gallery One Single Start-->
                <div class="item">
                    <div class="gallery-one__single">
                        <div class="gallery-one__img">
                            <img src="{{asset('main-html/assets/images/gallery/gallery-1-1.jpg')}}" alt="">
                            <a href="cars.html"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!--Gallery One Single End-->
                <!--Gallery One Single Start-->
                <div class="item">
                    <div class="gallery-one__single">
                        <div class="gallery-one__img">
                            <img src="{{asset('main-html/assets/images/gallery/gallery-1-2.jpg')}}" alt="">
                            <a href="cars.html"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!--Gallery One Single End-->
                <!--Gallery One Single Start-->
                <div class="item">
                    <div class="gallery-one__single">
                        <div class="gallery-one__img">
                            <img src="{{asset('main-html/assets/images/gallery/gallery-1-3.jpg')}}" alt="">
                            <a href="cart.html"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!--Gallery One Single End-->
                <!--Gallery One Single Start-->
                <div class="item">
                    <div class="gallery-one__single">
                        <div class="gallery-one__img">
                            <img src="{{asset('main-html/assets/images/gallery/gallery-1-4.jpg')}}" alt="">
                            <a href="cart.html"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!--Gallery One Single End-->
                <!--Gallery One Single Start-->
                <div class="item">
                    <div class="gallery-one__single">
                        <div class="gallery-one__img">
                            <img src="{{asset('main-html/assets/images/gallery/gallery-1-5.jpg')}}" alt="">
                            <a href="cart.html"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!--Gallery One Single End-->
                <!--Gallery One Single Start-->
                <div class="item">
                    <div class="gallery-one__single">
                        <div class="gallery-one__img">
                            <img src="{{asset('main-html/assets/images/gallery/gallery-1-6.jpg')}}" alt="">
                            <a href="cart.html"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!--Gallery One Single End-->
            </div>
        </section>
        <!--Gallery One End -->
@endsection