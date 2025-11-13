@extends('layouts.master')

@section('content')

<div class="space-for-header"></div>

<!-- start: Breadcrumb Section -->
<section class="tj-page-header section-gap-x" data-bg-image="{{ asset('uploads/ubuntu.webp') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tj-page-header-content text-center">
                    <h1 class="tj-page-title">{{ $blogs->title ?? 'Events & Updates' }}</h1>
                    <div class="tj-page-link">
                        <span><i class="tji-home"></i></span>
                        <span><a href="{{ url('/') }}">Home</a></span>
                        <span><i class="tji-arrow-right"></i></span>
                        <span><span>{{ $blogs->title ?? 'Events & Updates' }}</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-header-overlay" data-bg-image="{{ asset('acorn/assets/images/shape/pheader-overlay.webp') }}"></div>
</section>
<!-- end: Breadcrumb Section -->

<!-- start: Blog Section -->
<section class="tj-blog-section section-gap slidebar-stickiy-container">
  <div class="container">
    <div class="row row-gap-5">
      <div class="col-lg-8">
        <div class="post-details-wrapper">
       

          <div class="blog-images wow fadeInUp" data-wow-delay=".1s">
            <img src="{{ asset('storage/' . $blogs->featured_image ?? 'assets/images/blog/blog-1.webp') }}" alt="{{ $blogs->title }}">
          </div>

          <h2 class="title title-anim">
            {{ $blogs->title }}
          </h2>

          <div class="blog-category-two wow fadeInUp" data-wow-delay=".3s">
            <div class="category-item">
              <div class="cate-images">
                @if(!empty($authorAvatar))
                  <img src="{{ asset('storage/' . $authorAvatar) }}" alt="{{ $blogs->author }}">
                @else
                  <div class="h-12 w-12 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center font-semibold">
                    {{ $authorInitial }}
                  </div>
                @endif
              </div>
              <div class="cate-text">
                <span class="degination">Authored by</span>
                <h6 class="title"><a href="#">{{ $blogs->author ?? 'Admin' }}</a></h6>
              </div>
            </div>

            <div class="category-item">
              <div class="cate-icons">
                <i class="tji-calendar"></i>
              </div>
              <div class="cate-text">
                <span class="degination">Date Released</span>
                <h6 class="text">{{ $blogs->created_at->format('d F, Y') }}</h6>
              </div>
            </div>

            <div class="category-item">
              <div class="cate-icons">
                <i class="tji-comment"></i>
              </div>
              <div class="cate-text">
                <span class="degination">Comments</span>
                <h6 class="text">03 Comments</h6>
              </div>
            </div>
          </div>

          <div class="blog-text">
            

            {{-- Full content --}}
            <div class="wow fadeInUp" data-wow-delay=".3s">
              {!! $blogs->content !!}
            </div>
          </div>

          <div class="tj-tags-post wow fadeInUp" data-wow-delay=".3s">
            <div class="tagcloud">
              <span>Tags:</span>
              <a href="#">Growth</a>
              <a href="#">Success</a>
              <a href="#">Innovate</a>
            </div>
            <div class="post-share">
              <ul>
                <li>Share:</li>
                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
              </ul>
            </div>
          </div>

        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        <div class="tj-main-sidebar slidebar-stickiy">

          <div class="tj-sidebar-widget widget-search wow fadeInUp" data-wow-delay=".1s">
            <h4 class="widget-title">Search here</h4>
            <div class="search-box">
              <form action="#">
                <input type="search" name="search" placeholder="Search here">
                <button type="submit"><i class="tji-search"></i></button>
              </form>
            </div>
          </div>

          <div class="tj-sidebar-widget widget-tag-cloud wow fadeInUp" data-wow-delay=".7s">
            <h4 class="widget-title">Tags</h4>
            <nav>
              <div class="tagcloud">
                <a href="#">Growth</a>
                <a href="#">Success</a>
                <a href="#">Innovate</a>
                <a href="#">Lead</a>
                <a href="#">Impact</a>
              </div>
            </nav>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
<!-- end: Blog Section -->

@endsection
