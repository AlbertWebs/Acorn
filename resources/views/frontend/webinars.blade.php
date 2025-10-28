@extends('layouts.master')

@section('content')


    <div class="space-for-header"></div>
    <!-- start: Breadcrumb Section -->
    <section class="tj-page-header section-gap-x" data-bg-image="{{asset('uploads/ubuntu.webp')}}">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="tj-page-header-content text-center">
                <h1 class="tj-page-title">Webinars</h1>
                <div class="tj-page-link">
                <span><i class="tji-home"></i></span>
                <span>
                    <a href="{{url('/')}}">Home</a>
                </span>
                <span><i class="tji-arrow-right"></i></span>
                <span>
                    <span>Webinars</span>
                </span>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="page-header-overlay" data-bg-image="{{asset('acorn/assets/images/shape/pheader-overlay.webp')}}"></div>
    </section>
    <!-- end: Breadcrumb Section -->


    <!-- start: Listing Section -->
<section class="tj-blog-section section-gap">
  <div class="container">
    <div class="row row-gap-4">
      @forelse($webinars as $webinar)
        <div class="col-xl-4 col-md-6">
          <div class="blog-item wow fadeInUp" data-wow-delay=".1s">
            <div class="blog-thumb">
              <img src="{{ $webinar->featured_image ? asset('storage/' . $webinar->featured_image) : asset('acorn/assets/images/blog/blog-1.webp') }}" alt="{{ $webinar->title }}">
              <div class="blog-date">
                <span class="date">{{ $webinar->created_at->format('d') }}</span>
                <span class="month">{{ $webinar->created_at->format('M') }}</span>
              </div>
            </div>
            <div class="blog-content">
              <div class="blog-meta">
                <span class="categories">
                  <span>Webinar</span>
                </span>
                @if($webinar->author)
                  <span>By <a href="#">{{ $webinar->author }}</a></span>
                @endif
              </div>
              <h4 class="title">{{ $webinar->title }}</h4>
              <p>{{ Str::limit($webinar->excerpt ?? strip_tags($webinar->content), 100) }}</p>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-5">
          <p>No webinars available at the moment. Please check back soon.</p>
        </div>
      @endforelse
    </div>

    <!-- post pagination -->
    <div class="tj-pagination d-flex justify-content-center mt-5">
      {{ $webinars->links('pagination::bootstrap-5') }}
    </div>
  </div>
</section>
<!-- end: Listing Section -->


@endsection


