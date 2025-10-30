@extends('layouts.master')

@section('content')

    <div class="space-for-header"></div>
    <!-- start: Breadcrumb Section -->
    <section class="tj-page-header section-gap-x" data-bg-image="{{asset('uploads/ubuntu.webp')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tj-page-header-content text-center">
                        <h1 class="tj-page-title">Acorn Teacher’s Training</h1>
                        <div class="tj-page-link">
                            <span><i class="tji-home"></i></span>
                            <span>
                                <a href="{{url('/')}}">Home</a>
                            </span>
                            <span><i class="tji-arrow-right"></i></span>
                            <span>
                                <span>Teacher’s Training</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-header-overlay" data-bg-image="{{asset('acorn/assets/images/shape/pheader-overlay.webp')}}"></div>
    </section>
    <!-- end: Breadcrumb Section -->

    <!-- start: Trainings Section -->
    <section class="section-gap">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="p-4 rounded border shadow-lg" style="background:linear-gradient(180deg,#ffffff, #fbfbfb)">
                        <div class="sec-heading style-4">
                            <span class="sub-title"><i class="tji-box"></i>Programs & Reach</span>
                            <h2 class="sec-title title-anim">Acorn Teacher’s Training Participation</h2>
                            <p class="mt-2 mb-0 text-muted">A snapshot of partner schools and total teachers reached across cohorts and dedicated trainings.</p>
                            <div class="about-btn-area-2 mt-3">
                                <a class="tj-primary-btn" href="{{ route('gallery.context', ['type'=>'trainings']) }}">
                                  <span class="btn-text"><span>View Gallery</span></span>
                                  <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                                </a>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="d-flex justify-content-between align-items-start mb-3 pb-3 border-bottom">
                                <div>
                                    <h5 class="mb-1">Nyarai Caregivers Training</h5>
                                    <small class="text-muted">Caregivers training</small>
                                </div>
                                <div><span class="badge bg-warning text-dark" style="font-size:14px">10</span></div>
                            </div>

                            <div class="mb-4 pb-3 border-bottom">
                                <div class="d-flex justify-content-between align-items-start">
                                    <h5 class="mb-2">Acorn Teachers Training – Cohort 1</h5>
                                    <div><span class="badge bg-warning text-dark" style="font-size:14px">17</span></div>
                                </div>
                                <ul class="mb-0 ps-3">
                                    <li>Acorn Special Tutorials</li>
                                    <li>Marion Schools</li>
                                    <li>Kinderville</li>
                                    <li>Spleng School</li>
                                    <li>Eaglecrest</li>
                                    <li>Teule School</li>
                                    <li>Green Yard School</li>
                                </ul>
                            </div>

                            <div class="d-flex justify-content-between align-items-start mb-3 pb-3 border-bottom">
                                <div>
                                    <h5 class="mb-1">St. Nicholas School</h5>
                                </div>
                                <div><span class="badge bg-warning text-dark" style="font-size:14px">21</span></div>
                            </div>

                            <div class="mb-4 pb-3 border-bottom">
                                <div class="d-flex justify-content-between align-items-start">
                                    <h5 class="mb-2">Acorn Teachers Training – Cohort 2 (Virtual)</h5>
                                    <div><span class="badge bg-warning text-dark" style="font-size:14px">18</span></div>
                                </div>
                                <ul class="mb-0 ps-3">
                                    <li>Acorn Special Tutorials</li>
                                    <li>Riara Schools</li>
                                    <li>Acacia Crest School</li>
                                    <li>KCCL</li>
                                    <li>Marion School</li>
                                </ul>
                            </div>

                            <div class="mb-4 pb-3 border-bottom">
                                <div class="d-flex justify-content-between align-items-start">
                                    <h5 class="mb-2">Acorn Teachers Training – Cohort 3</h5>
                                    <div><span class="badge bg-warning text-dark" style="font-size:14px">38</span></div>
                                </div>
                                <ul class="mb-0 ps-3">
                                    <li>Acorn Special Tutorials</li>
                                    <li>Juja Preparatory Schools</li>
                                    <li>Kanzi School</li>
                                    <li>Fountain School</li>
                                    <li>Butterfly House</li>
                                    <li>Jewel House School</li>
                                    <li>Kirawa Road Side School</li>
                                    <li>Makena School</li>
                                </ul>
                            </div>

                            <div class="d-flex justify-content-between align-items-start mb-3 pb-3 border-bottom">
                                <h5 class="mb-0">Bakhita Kindergarten Sabaki</h5>
                                <div><span class="badge bg-warning text-dark" style="font-size:14px">25</span></div>
                            </div>

                            <div class="d-flex justify-content-between align-items-start mb-3 pb-3 border-bottom">
                                <h5 class="mb-0">Bakhita Kindergarten Eagles Plain</h5>
                                <div><span class="badge bg-warning text-dark" style="font-size:14px">27</span></div>
                            </div>

                            <div class="d-flex justify-content-between align-items-start mb-3 pb-3 border-bottom">
                                <h5 class="mb-0">Bakhita Primary School</h5>
                                <div><span class="badge bg-warning text-dark" style="font-size:14px">33</span></div>
                            </div>

                            <div class="d-flex justify-content-between align-items-start mb-3 pb-3 border-bottom">
                                <h5 class="mb-0">Juja Preparatory</h5>
                                <div><span class="badge bg-warning text-dark" style="font-size:14px">39</span></div>
                            </div>

                            <div class="d-flex justify-content-between align-items-start mb-3 pb-3 border-bottom">
                                <h5 class="mb-0">Green Acorn Kindergarten</h5>
                                <div><span class="badge bg-warning text-dark" style="font-size:14px">42</span></div>
                            </div>

                            <div class="d-flex justify-content-between align-items-start mb-3 pb-3 border-bottom">
                                <h5 class="mb-0">Gashie Teachers Training</h5>
                                <div><span class="badge bg-warning text-dark" style="font-size:14px">49</span></div>
                            </div>

                            <div class="mb-3">
                                <h5 class="mb-1">Kenya Private School Association AGM 2022</h5>
                                <small class="text-muted">Engagement</small>
                            </div>
                            <div class="mb-4 pb-2 border-bottom">
                                <h5 class="mb-1">Kenya Private School Association AGM 2023</h5>
                                <small class="text-muted">Engagement</small>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Total Teachers Reached</h5>
                                <div><span class="badge bg-dark" style="font-size:14px">319</span></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="p-4 rounded border shadow-lg" style="background:linear-gradient(180deg,#ffffff, #faf9f6)">
                        <h4 class="mb-3">Topics Covered</h4>
                        <ol class="ps-3 mb-0">
                            <li>The 21st Century Teacher</li>
                            <li>Behaviour Modification</li>
                            <li>Introduction to Neurodiversity</li>
                            <li>Law, Myths &amp; Misconception</li>
                            <li>Multiple Intelligence</li>
                            <li>Universal Design for Learning</li>
                            <li>Assessments</li>
                            <li>Individualised Educational Program (I.E.P)</li>
                            <li>Inclusive Education</li>
                            <li>Inclusive Practical Strategies</li>
                            <li>Caregivers Training Manual</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end: Trainings Section -->

@endsection


