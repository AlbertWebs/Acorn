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
                  <h1 class="tj-page-title">{{$histories->title}}</h1>
                  <div class="tj-page-link">
                    <span><i class="tji-home"></i></span>
                    <span>
                      <a href="index.html">Home</a>
                    </span>
                    <span><i class="tji-arrow-right"></i></span>
                    <span>
                      <span>{{$histories->title}}</span>
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
                  <span class="sub-title wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i>History</span>
                  <div class="heading-wrap-content">
                    <div class="sec-heading">
                      <h2 class="sec-title title-anim"><span>{{$histories->year}}</span></h2>
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
            <div class="row row-gap-4 rightSwipeWrap">
              <div class="col-lg-12">
                <div class="choose-box right-swipe">
                  <div class="choose-content">

                    <p class="desc">{!!$histories->description!!}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Choose Section -->


      </main>



@endsection
