@extends('layouts.master')

@section('content')

    <div class="space-for-header"></div>
    <!-- start: Breadcrumb Section -->
    <section class="tj-page-header section-gap-x" data-bg-image="{{asset('uploads/ubuntu.webp')}}">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="tj-page-header-content text-center">
                <h1 class="tj-page-title">Corporate Social Responsibility</h1>
                <div class="tj-page-link">
                <span><i class="tji-home"></i></span>
                <span>
                    <a href="{{url('/')}}">Home</a>
                </span>
                <span><i class="tji-arrow-right"></i></span>
                <span>
                    <span>CSR</span>
                </span>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="page-header-overlay" data-bg-image="{{asset('acorn/assets/images/shape/pheader-overlay.webp')}}"></div>
    </section>
    <!-- end: Breadcrumb Section -->

    <!-- start: CSR Section -->
    <section class="tj-blog-section section-gap">
        <div class="container">
            @forelse($csrs as $csr)
                <div class="row mb-5 pb-5 border-bottom">
                    <div class="col-lg-12">
                        <div class="blog-item wow fadeInUp">
                            <div class="blog-content">
                                <h2 class="title mb-3">
                                    <a href="{{ route('csr.show', $csr->slug) }}" class="text-decoration-none">{{ $csr->title }}</a>
                                </h2>
                                
                                @if($csr->description)
                                    <div class="mb-4">
                                        {!! Str::limit(strip_tags($csr->description), 200) !!}
                                    </div>
                                @endif

                                <!-- Gallery Images -->
                                @php
                                    $galleryImages = \App\Models\Gallery::where('context_type', 'csr')
                                        ->where('context_slug', (string)$csr->id)
                                        ->where('is_active', true)
                                        ->get();
                                @endphp

                                @if($galleryImages->count() > 0)
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <h4 class="mb-3">Gallery</h4>
                                            <div class="row">
                                                @foreach($galleryImages->take(4) as $image)
                                                    <div class="col-md-3 col-sm-6 mb-3">
                                                        <a href="{{ asset('storage/' . $image->image) }}" data-lightbox="csr-gallery-{{ $csr->id }}">
                                                            <img src="{{ asset('storage/' . $image->image) }}" 
                                                                 alt="{{ $csr->title }}" 
                                                                 class="img-fluid rounded shadow-sm" 
                                                                 style="width: 100%; height: 200px; object-fit: cover;">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @if($galleryImages->count() > 4)
                                                <p class="text-muted small">+{{ $galleryImages->count() - 4 }} more images</p>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                <!-- Read More & PDF Download -->
                                <div class="mt-4 d-flex gap-3">
                                    <a href="{{ route('csr.show', $csr->slug) }}" class="tj-primary-btn">
                                        <span class="btn-text">
                                            <span>Read More</span>
                                        </span>
                                        <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                                    </a>
                                    @if($csr->pdf_file)
                                        <a href="{{ asset('storage/' . $csr->pdf_file) }}" 
                                           target="_blank" 
                                           class="tj-primary-btn">
                                            <span class="btn-text">
                                                <span><i class="fas fa-file-pdf mr-2"></i>Download PDF</span>
                                            </span>
                                            <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="row">
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">No CSR information available at the moment. Please check back soon.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </section>
    <!-- end: CSR Section -->

@endsection

