@extends('layouts.master')

@section('content')


    <div class="space-for-header"></div>
    <!-- start: Breadcrumb Section -->
    <section class="tj-page-header section-gap-x" data-bg-image="{{asset('uploads/ubuntu.webp')}}">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="tj-page-header-content text-center">
                <h1 class="tj-page-title">Events</h1>
                <div class="tj-page-link">
                <span><i class="tji-home"></i></span>
                <span>
                    <a href="{{url('/')}}">Home</a>
                </span>
                <span><i class="tji-arrow-right"></i></span>
                <span>
                    <span>Events</span>
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
      @forelse($events as $event)
        <div class="col-xl-4 col-md-6">
          <div class="blog-item wow fadeInUp" data-wow-delay=".1s">
            <div class="blog-thumb">
              <img src="{{ $event->featured_image ? asset('storage/' . $event->featured_image) : asset('acorn/assets/images/blog/blog-1.webp') }}" alt="{{ $event->title }}">
              <div class="blog-date">
                <span class="date">{{ $event->created_at->format('d') }}</span>
                <span class="month">{{ $event->created_at->format('M') }}</span>
              </div>
            </div>
            <div class="blog-content">
              <div class="blog-meta">
                <span class="categories">
                  <span>Event</span>
                </span>
                @if($event->author)
                  <span>By <a href="#">{{ $event->author }}</a></span>
                @endif
              </div>
              <h4 class="title"><a href="{{ route('events.show', $event->slug) }}">{{ $event->title }}</a></h4>
              <p>{{ Str::limit($event->excerpt ?? strip_tags($event->content), 100) }}</p>

              <a class="tj-primary-btn mt-2" href="{{ route('events.show', $event->slug) }}">
                <span class="btn-text"><span>Book This Event</span></span>
                <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
              </a>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-5">
          <p>No events available at the moment. Please check back soon.</p>
        </div>
      @endforelse
    </div>

    <!-- post pagination -->
    <div class="tj-pagination d-flex justify-content-center mt-5">
      {{ $events->links('pagination::bootstrap-5') }}
    </div>
  </div>
</section>
<!-- end: Listing Section -->


@endsection


