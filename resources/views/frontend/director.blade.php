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
                  <h1 class="tj-page-title">{{$founder->name}}</h1>
                  <div class="tj-page-link">
                    <span><i class="tji-home"></i></span>
                    <span>
                      <a href="index.html">Home</a>
                    </span>
                    <span><i class="tji-arrow-right"></i></span>
                    <span>
                      <span>{{$founder->name}}</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="page-header-overlay" data-bg-image="{{asset('acorn/assets/images/shape/pheader-overlay.webp')}}"></div>
        </section>
        <!-- end: Breadcrumb Section -->

    <!-- start: Team Details Section -->
    <section class="team-details slidebar-stickiy-container">
        <div class="container">
            <div class="row justify-content-center">
            <!-- Left -->
            <div class="col-12 col-md-8 col-lg-5">
                <div class="team-details__img slidebar-stickiy wow fadeInUp" data-wow-delay=".1s">
                @if($founder && $founder->image)
                    <img src="{{ asset($founder->image) }}" alt="{{ $founder->name }}">
                @else
                    <img src="{{ asset('assets/images/team/default.webp') }}" alt="Founder">
                @endif
                </div>
            </div>

            <!-- Right -->
            <div class="col-12 col-lg-7">
                <div class="team-details__content">
                @if($founder)
                    <h2 class="team-details__name title-anim">Hello, I am {{ $founder->name }}</h2>

                    @if($founder->title)
                    <span class="team-details__desig wow fadeInUp" data-wow-delay=".1s">{{ $founder->title }}</span>
                    @endif

                    @if($founder->roles)
                    <p class="wow fadeInUp" data-wow-delay=".2s"><strong>{{ $founder->roles }}</strong></p>
                    @endif

                    @if($founder->about)
                    <p class="wow fadeInUp" data-wow-delay=".3s">{!! $founder->about !!}</p>
                    @endif

                    <div class="social-links wow fadeInUp" data-wow-delay=".5s">
                    <ul>
                        @if($founder->facebook)
                        <li><a href="{{ $founder->facebook }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                        @endif
                        @if($founder->instagram)
                        <li><a href="{{ $founder->instagram }}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                        @endif
                        @if($founder->twitter)
                        <li><a href="{{ $founder->twitter }}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                        @endif
                        @if($founder->linkedin)
                        <li><a href="{{ $founder->linkedin }}" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        @endif
                    </ul>
                    </div>

                    <div class="team-details__experience mt-5">
                    @if($founder->catalyst_for_change)
                        <h4 class="team-details__subtitle wow fadeInUp" data-wow-delay=".3s">Catalyst for Change</h4>
                        <p class="wow fadeInUp" data-wow-delay=".3s">{!! $founder->catalyst_for_change !!}</p>
                    @endif

                    @if($founder->community_impact)
                        <h4 class="team-details__subtitle wow fadeInUp" data-wow-delay=".3s">Community Impact</h4>
                        <p class="wow fadeInUp" data-wow-delay=".3s">{!! $founder->community_impact !!}</p>
                    @endif

                    @if($founder->leadership)
                        <h4 class="team-details__subtitle wow fadeInUp" data-wow-delay=".3s">Leadership</h4>
                        <p class="wow fadeInUp" data-wow-delay=".3s">{!! $founder->leadership !!}</p>
                    @endif
                    </div>
                @else
                    <p class="text-gray-500">Founder information is not available yet.</p>
                @endif
                </div>
            </div>
            </div>
        </div>
    </section>

        <!-- end: Team Details Section -->



      </main>



@endsection
