@extends('layouts.master')

@section('content')

    <div class="space-for-header"></div>
    <section class="tj-page-header section-gap-x" data-bg-image="{{asset('uploads/ubuntu.webp')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tj-page-header-content text-center">
                        <h1 class="tj-page-title">{{ $page_title }}</h1>
                        <div class="tj-page-link">
                            <span><i class="tji-home"></i></span>
                            <span><a href="{{url('/')}}">Home</a></span>
                            <span><i class="tji-arrow-right"></i></span>
                            <span><span>Gallery</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-header-overlay" data-bg-image="{{asset('acorn/assets/images/shape/pheader-overlay.webp')}}"></div>
    </section>

    <section class="section-gap">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 d-flex gap-2 flex-wrap">
                    <a class="tj-primary-btn {{ !$type ? 'is-active' : '' }}" href="{{ route('gallery') }}">
                        <span class="btn-text"><span>All</span></span>
                        <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                    </a>
                    <a class="tj-primary-btn {{ $type==='trainings' ? 'is-active' : '' }}" href="{{ route('gallery.context', ['type'=>'trainings']) }}">
                        <span class="btn-text"><span>Trainings</span></span>
                        <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                    </a>
                    <a class="tj-primary-btn {{ $type==='history' ? 'is-active' : '' }}" href="{{ route('gallery.context', ['type'=>'history']) }}">
                        <span class="btn-text"><span>History</span></span>
                        <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                    </a>
                    <a class="tj-primary-btn {{ $type==='event' ? 'is-active' : '' }}" href="{{ route('gallery.context', ['type'=>'event']) }}">
                        <span class="btn-text"><span>Events</span></span>
                        <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                    </a>
                </div>
            </div>

            <div class="row g-4">
                @forelse($items as $img)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card shadow-sm border-0 h-100">
                            <a href="{{ asset('storage/'.$img->image) }}" class="venobox" data-gall="gal">
                                <img src="{{ asset('storage/'.$img->image) }}" alt="{{ $img->title ?? 'Image' }}" class="card-img-top" style="height:200px;object-fit:cover;">
                            </a>
                            <div class="card-body p-2">
                                @if($img->title)
                                    <h6 class="mb-0">{{ $img->title }}</h6>
                                @endif
                                @if($img->caption)
                                    <p class="text-muted mb-0" style="font-size:12px">{{ $img->caption }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">No images found.</div>
                @endforelse
            </div>

            <div class="row mt-4">
                <div class="col-sm-12">
                    <div class="basic-pagination text-start">
                        <nav class=" tj-pagination shop">
                            <ul class="page-numbers">
                                @for ($page = 1; $page <= $items->lastPage(); $page++)
                                    @if ($page === $items->currentPage())
                                        <li><span class="page-numbers current">{{ $page }}</span></li>
                                    @else
                                        <li>
                                            <a aria-label="Page {{ $page }}" class="page-numbers" href="{{ $items->appends(request()->query())->url($page) }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endfor
                                @if ($items->hasMorePages())
                                    <li>
                                        <a class="next page-numbers" href="{{ $items->nextPageUrl() }}">
                                            <i class="tji-arrow-right"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <link rel="stylesheet" href="{{asset('acorn/assets/css/venobox.min.css')}}">
    <script src="{{asset('acorn/assets/js/venobox.min.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            if (window.VenoBox) new VenoBox({ selector: '.venobox' });
        });
    </script>

@endsection


