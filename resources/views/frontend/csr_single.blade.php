@extends('layouts.master')

@section('content')

    <div class="space-for-header"></div>
    <!-- start: Breadcrumb Section -->
    <section class="tj-page-header section-gap-x" data-bg-image="{{asset('uploads/ubuntu.webp')}}">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="tj-page-header-content text-center">
                <h1 class="tj-page-title">{{ $csr->title }}</h1>
                <div class="tj-page-link">
                <span><i class="tji-home"></i></span>
                <span>
                    <a href="{{url('/')}}">Home</a>
                </span>
                <span><i class="tji-arrow-right"></i></span>
                <span>
                    <a href="{{ route('csr') }}">CSR</a>
                </span>
                <span><i class="tji-arrow-right"></i></span>
                <span>
                    <span>{{ $csr->title }}</span>
                </span>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="page-header-overlay" data-bg-image="{{asset('acorn/assets/images/shape/pheader-overlay.webp')}}"></div>
    </section>
    <!-- end: Breadcrumb Section -->

    <!-- start: CSR Single Section -->
    <section class="section-gap">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">
                    <article class="tj-post-details">
                        <h2 class="mb-4">{{ $csr->title }}</h2>
                        
                        @if($csr->description)
                            <div class="content mb-4">
                                {!! $csr->description !!}
                            </div>
                        @endif

                        <!-- Gallery Images -->
                        @if($galleryImages->count() > 0)
                            <div class="mb-5">
                                <h3 class="mb-4">Gallery</h3>
                                <div class="row g-3">
                                    @foreach($galleryImages as $image)
                                        <div class="col-md-4 col-sm-6">
                                            <a href="{{ asset('storage/' . $image->image) }}" data-lightbox="csr-gallery">
                                                <img src="{{ asset('storage/' . $image->image) }}" 
                                                     alt="{{ $csr->title }}" 
                                                     class="img-fluid rounded shadow-sm" 
                                                     style="width: 100%; height: 250px; object-fit: cover;">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- PDF Download -->
                        @if($csr->pdf_file)
                            <div class="mt-4">
                                <a href="{{ asset('storage/' . $csr->pdf_file) }}" 
                                   target="_blank" 
                                   class="tj-primary-btn">
                                    <span class="btn-text">
                                        <span><i class="fas fa-file-pdf mr-2"></i>Download PDF</span>
                                    </span>
                                    <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                                </a>
                            </div>
                        @endif
                    </article>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="p-4 rounded border">
                        <h4 class="mb-3">Other CSR Initiatives</h4>
                        @php
                            $otherCsrs = \App\Models\Csr::where('is_active', true)
                                ->where('id', '!=', $csr->id)
                                ->latest()
                                ->take(5)
                                ->get();
                        @endphp
                        @if($otherCsrs->count() > 0)
                            <ul class="list-unstyled">
                                @foreach($otherCsrs as $other)
                                    <li class="mb-3 pb-3 border-bottom">
                                        <a href="{{ route('csr.show', $other->slug) }}" class="text-decoration-none">
                                            <h5 class="mb-1">{{ $other->title }}</h5>
                                            @if($other->description)
                                                <p class="text-muted small mb-0">{{ Str::limit(strip_tags($other->description), 80) }}</p>
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">No other CSR initiatives available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end: CSR Single Section -->

@endsection

