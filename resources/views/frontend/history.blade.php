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
                  <h1 class="tj-page-title">Our History</h1>
                  <div class="tj-page-link">
                    <span><i class="tji-home"></i></span>
                    <span>
                      <a href="index.html">Home</a>
                    </span>
                    <span><i class="tji-arrow-right"></i></span>
                    <span>
                      <span>Our History</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="page-header-overlay" data-bg-image="{{asset('acorn/assets/images/shape/pheader-overlay.webp')}}"></div>
        </section>
        <!-- end: Breadcrumb Section -->

         <!-- start: History title Section -->
        <section class="tj-history section-gap">
          <div class="container">
            <div class="row rg-30 justify-content-between">
              <div class="col-xl-5">
                <div class="sec-heading mb-0">
                  <span class="sub-title wow fadeInUp" data-wow-delay="0.1s"><i class="tji-box"></i> Our background
                  </span>
                  <h2 class="sec-title text-anim">
                    Discover how we’ve evolved Acorn’s <span>Legacy.</span>
                  </h2>

                </div>
              </div>
              <div class="col-xl-5">
                <div class="desc wow fadeInUp" data-wow-delay="0.3s">
                  <p>
                    Over the years, Acorn grew into a beacon of inclusive education in Kenya, rooted in the spirit of Ubuntu — <strong>“I am because we are.”</strong> Ubuntu shapes how we teach, how we listen, and how we walk alongside families, educators, and communities. It reminds us that no child should walk alone, and no family should be left behind.
                  </p>
                </div>
                <div class="history-btn mt-30 wow fadeInUp" data-wow-delay="0.5s">
                  <a class="tj-primary-btn" href="#">
                    <span class="btn-text"><span>What We DO</span></span>
                    <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                  </a>

                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: History tile Section -->

        <!-- start: History Section -->
        <section class="tj-history-area section-bottom-gap">
        <div class="container">
            <div class="row">
            <div class="col-12">
                <div class="timeline">
                @foreach ($histories as $index => $history)
                    <div class="timeline-inner wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                    <div class="date">{{ $history->year }}</div>
                        <div class="content">
                            <div class="top">
                            <span>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}.</span>
                            <h4 class="title">{{ $history->title }}</h4>
                            <p>{!! $history->meta !!}</p>
                            </div>
                            <div class="bottom">
                            @if ($history->image_one)
                                <img style="width:240px; height:200px; object-fit:cover" src="{{ asset('storage/' . $history->image_one) }}" alt="history">
                            @endif
                            @if ($history->image_two)
                                <img style="width:240px; height:200px; object-fit:cover" src="{{ asset('storage/' . $history->image_two) }}" alt="history">
                            @endif
                            </div>
                            <br>
                            {{--  --}}
                            <div style="display: flex; justify-content: center; align-items: center;">
                                <a class="tj-primary-btn" href="{{url('/')}}/our-history/{{$history->id}}" style="text-align: center;">
                                    <span class="btn-text"><span>View More</span></span>
                                    <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                                </a>
                            </div>

                            {{--  --}}
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            </div>
        </div>
        </section>

        <!-- end: History Section -->


      </main>



@endsection
