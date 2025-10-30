@extends('layouts.master')

@section('content')
<style>
 .choose-box {
  border-radius: 20px;
  overflow: hidden;
}

.choose-image div {
  flex: 1;
  overflow: hidden;
}

.choose-image div:first-child {
  margin-bottom: 6px;
  border-radius: 20px 0 0 0;
}

.choose-image div:last-child {
  margin-top: 6px;
  border-radius: 0 0 0 20px;
}

.choose-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.choose-content {
  padding: 35px;
  display: flex;
  align-items: center;
}

</style>

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
            <!--  -->
            <div class="row row-gap-4 rightSwipeWrap">
            <div class="row">
  <!-- Images Column -->
  <div class="col-12 col-lg-6 d-flex flex-column mb-3 mb-lg-0" style="gap:8px;">
    <div class="flex-fill overflow-hidden rounded" style="height:50%;">
      <img src="{{ asset('storage/' . $histories->image_one) }}" 
           class="w-100 h-100" 
           style="object-fit:cover;" 
           alt="">
    </div>

    <div class="flex-fill overflow-hidden rounded" style="height:50%;">
      <img src="{{ asset('storage/' . $histories->image_two) }}" 
           class="w-100 h-100" 
           style="object-fit:cover;" 
           alt="">
    </div>
  </div>

  <!-- Text Column -->
  <div class="col-12 col-lg-6 d-flex align-items-center">
    <div style="padding:25px;">
      <p class="mb-0" style="font-size:17px; line-height:1.7;">
        {!! $histories->description !!}
      </p>
    </div>
  </div>
</div>


            </div>

            <!--  -->
          </div>
        </section>
        <!-- end: Choose Section -->


      </main>



@endsection
