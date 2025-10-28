@extends('layouts.master')

@section('content')


    <div class="space-for-header"></div>
    <!-- start: Breadcrumb Section -->
    <section class="tj-page-header section-gap-x" data-bg-image="{{asset('uploads/ubuntu.webp')}}">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="tj-page-header-content text-center">
                <h1 class="tj-page-title">Events & Updates</h1>
                <div class="tj-page-link">
                <span><i class="tji-home"></i></span>
                <span>
                    <a href="{{url('/')}}">Home</a>
                </span>
                <span><i class="tji-arrow-right"></i></span>
                <span>
                    <span>Events & Updates</span>
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
        <!-- start: Blog Section -->
<section class="tj-blog-section section-gap">
  <div class="container">
    <div class="row row-gap-4">
      @forelse($blogs as $blog)
        <div class="col-xl-4 col-md-6">
          <div class="blog-item wow fadeInUp" data-wow-delay=".1s">
            <div class="blog-thumb">
              <a href="{{ route('blog.show', $blog->slug) }}">
                <img style="height: 300px; width: 100%; object-fit: cover;" src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}">
              </a>
              <div class="blog-date">
                <span class="date">{{ $blog->created_at->format('d') }}</span>
                <span class="month">{{ $blog->created_at->format('M') }}</span>
              </div>
            </div>
            <div class="blog-content">
              <div class="blog-meta">
                <span class="categories">
                  <a href="{{ route('blog.show', $blog->slug) }}">Updates</a>
                </span>
                @if($blog->author)
                  <span>By <a href="#">{{ $blog->author }}</a></span>
                @endif
              </div>
              <h4 class="title">
                <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
              </h4>
              <p>{{ Str::limit($blog->excerpt ?? strip_tags($blog->content), 100) }}</p>
              <a class="text-btn" href="{{ route('blog.show', $blog->slug) }}">
                <span class="btn-text"><span>Read More</span></span>
                <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
              </a>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-5">
          <p>No blog posts available at the moment. Please check back soon.</p>
        </div>
      @endforelse
    </div>

    <!-- post pagination -->
    <div class="tj-pagination d-flex justify-content-center mt-5">
      {{ $blogs->links('pagination::bootstrap-5') }}
    </div>
  </div>
</section>
<!-- end: Blog Section -->

        <!-- end: Blog Section -->


@endsection
