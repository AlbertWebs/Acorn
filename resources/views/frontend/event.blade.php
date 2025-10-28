@extends('layouts.master')

@section('content')


    <div class="space-for-header"></div>
    <!-- start: Breadcrumb Section -->
    <section class="tj-page-header section-gap-x" data-bg-image="{{asset('uploads/ubuntu.webp')}}">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="tj-page-header-content text-center">
                <h1 class="tj-page-title">{{ $event->title }}</h1>
                <div class="tj-page-link">
                <span><i class="tji-home"></i></span>
                <span>
                    <a href="{{url('/')}}">Home</a>
                </span>
                <span><i class="tji-arrow-right"></i></span>
                <span>
                    <a href="{{ route('events') }}">Events</a>
                </span>
                <span><i class="tji-arrow-right"></i></span>
                <span>
                    <span>{{ $event->title }}</span>
                </span>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="page-header-overlay" data-bg-image="{{asset('acorn/assets/images/shape/pheader-overlay.webp')}}"></div>
    </section>
    <!-- end: Breadcrumb Section -->

    <section class="section-gap">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-8">
            <article class="tj-post-details">
              @if($event->featured_image)
                <img class="mb-4 rounded" src="{{ asset('storage/'.$event->featured_image) }}" alt="{{ $event->title }}">
              @endif
              <h2 class="mb-3">{{ $event->title }}</h2>
              @if($event->author)
                <p class="text-muted mb-2">By {{ $event->author }} • {{ $event->created_at->format('M d, Y') }}</p>
              @endif
              <div class="content">{!! $event->content !!}</div>
            </article>
          </div>

          <div class="col-lg-4">
            <div class="p-4 rounded border">
              <h4 class="mb-3">Book This Event</h4>
              @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
              @endif
              <form method="POST" action="{{ route('events.book') }}">
                @csrf
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <div class="mb-3">
                  <label class="form-label">Full Name</label>
                  <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Phone</label>
                  <input type="text" name="phone" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Notes (optional)</label>
                  <textarea name="notes" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="tj-primary-btn w-100">
                  <span class="btn-text"><span>Submit Booking</span></span>
                  <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection
