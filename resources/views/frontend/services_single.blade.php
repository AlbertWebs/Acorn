@extends('layouts.master-service')

@section('content')

<main id="primary" class="site-main">

        <div class="space-for-header"></div>
        <!-- start: Breadcrumb Section -->
        <section class="tj-page-header section-gap-x" data-bg-image="{{asset('uploads/ubuntu.webp')}}">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="tj-page-header-content text-center">
                  <h1 class="tj-page-title">{{$service->title}}</h1>
                  <div class="tj-page-link">
                    <span><i class="tji-home"></i></span>
                    <span>
                      <a href="index.html">Home</a>
                    </span>
                    <span><i class="tji-arrow-right"></i></span>
                    <span>
                      <span>{{$service->title}}</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="page-header-overlay" data-bg-image="{{asset('acorn/assets/images/shape/pheader-overlay.webp')}}"></div>
        </section>
        <!-- end: Breadcrumb Section -->

         <!-- start: Blog Section -->
        <section class="tj-blog-section section-gap slidebar-stickiy-container">
        <div class="container">
            <div class="row row-gap-5">
            <!-- Main content -->
            <div class="col-lg-8">
                <div class="post-details-wrapper">

                <!-- Service image -->
                @if($service->image)
                    <div class="blog-images wow fadeInUp" data-wow-delay=".1s">
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}">
                    </div>
                @endif

                <!-- Service title -->
                <h2 class="title title-anim">{{ $service->title }}</h2>

                <!-- Description -->
                <div class="blog-text">
                    <p class="wow fadeInUp" data-wow-delay=".3s">
                    {!! $service->description !!}
                    </p>
                </div>

                <!-- Optional: Related services navigation -->
                <div class="tj-post__navigation mb-0 wow fadeInUp" data-wow-delay=".3s">
                    <!-- Previous post -->
                    <div class="tj-nav__post previous">
                        @if ($previous)
                            <div class="tj-nav-post__nav prev_post">
                                <a href="{{ route('services-single', $previous->slug) }}">
                                    <span><i class="tji-arrow-left"></i></span>Previous
                                </a>
                            </div>
                        @endif
                    </div>

                    <div class="tj-nav-post__grid">
                        <a href="{{ route('frontend.services') }}"><i class="tji-window"></i></a>
                    </div>

                    <!-- Next post -->
                    <div class="tj-nav__post next">
                        @if ($next)
                            <div class="tj-nav-post__nav next_post">
                                <a href="{{ route('services-single', $next->slug) }}">
                                    Next<span><i class="tji-arrow-right"></i></span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>


                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="tj-main-sidebar slidebar-stickiy">
                <div class="tj-sidebar-widget service-categories wow fadeInUp" data-wow-delay=".1s">
                    <h4 class="widget-title">More Services</h4>
                    <ul>
                    @foreach(\App\Models\Service::where('id', '!=', $service->id)->take(6)->get() as $service)
                        <li>
                        <a href="{{ route('services-single', $service->slug) }}">
                            {{ $service->title }}
                            <span class="icon"><i class="tji-arrow-right"></i></span>
                        </a>
                        </li>
                    @endforeach
                    </ul>
                </div>

                <!-- Optional: Feature box -->
                <div class="tj-sidebar-widget widget-feature-item wow fadeInUp" data-wow-delay=".3s">
                    <div class="feature-box">
                    <div class="feature-content">
                        <h2 class="title">Need Help?</h2>
                        <span>Talk to us today</span>
                        <a class="read-more feature-contact" href="tel:{{ $Settings->phone ?? '0700-000-000' }}">
                        <i class="tji-phone-3"></i>
                        <span>{{ $Settings->mobile ?? '+254 700 000 000' }}</span>
                        </a>
                    </div>
                    <div class="feature-images">
                        <img src="{{ asset('frontend/assets/images/service/service-ad.webp') }}" alt="Ad">
                    </div>
                    </div>
                </div>

                </div>
            </div>

            </div>
        </div>
        </section>
        <!-- end: Blog Section -->

</main>



@endsection
