@extends('layouts.main')

@section('content')

    <!-- ===== HERO ABOUT ===== -->
    <section class="about-hero">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1>{{ __('about.hero_title') }}</h1>
            <p>{{ __('about.hero_subtitle') }}</p>
        </div>
    </section>


    <!-- ===== ABOUT LINKS ===== -->
    <section class="mission">
        <div class="container">
            <div class="mission-inner">

                <div class="mission-text">
                    <h2>{{ __('about.online_title') }}</h2>
                    <p>{{ __('about.online_desc') }}</p>

                    <ul class="about-links">
                        <li>
                            <a href="{{ route('partners') }}">
                                {{ __('about.link1') }}
                            </a>
                        </li>
                    </ul>

                </div>

                <div class="mission-image">
                    <div class="image-wrapper">
                        <img src="{{ asset('assets/img/mission.webp') }}" alt="Mission">
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ===== DIGITECH IN NUMBERS ===== -->
    <section class="stats reveal">
        <div class="container">
            <h2 class="section-title"><span>{{ __('about.stats_title') }}</span></h2>

            <div class="stats-grid">
                <div class="stat">
                    <span class="number" data-target="8">0</span>
                    <p>{{ __('about.stat_universities') }}</p>
                </div>

                <div class="stat">
                    <span class="number" data-target="6">0</span>
                    <p>{{ __('about.stat_labs') }}</p>
                </div>

                <div class="stat">
                    <span class="number" data-target="120">0</span>
                    <p>{{ __('about.stat_students') }}</p>
                </div>

                <div class="stat">
                    <span class="number" data-target="4">0</span>
                    <p>{{ __('about.stat_events') }}</p>
                </div>
            </div>
        </div>
    </section>


    <!-- ===== PROJECT JOURNEY ===== -->
    <section class="timeline reveal">
        <div class="container">
            <h2 class="section-title"><span>{{ __('about.timeline_title') }}</span></h2>

            <div class="timeline-wrapper">
                <div class="tl-item"><span class="tl-year">2025</span><p>{{ __('about.tl_start') }}</p></div>
                <div class="tl-item"><span class="tl-year">2025</span><p>{{ __('about.tl_website') }}</p></div>
                <div class="tl-item"><span class="tl-year">2026</span><p>{{ __('about.tl_kickoff') }}</p></div>
                <div class="tl-item"><span class="tl-year">2026</span><p>{{ __('about.tl_agreement') }}</p></div>
                <div class="tl-item"><span class="tl-year">2026</span><p>{{ __('about.tl_maribor') }}</p></div>
                <div class="tl-item"><span class="tl-year">2026</span><p>{{ __('about.tl_hamburg') }}</p></div>
                <div class="tl-item"><span class="tl-year">2026</span><p>{{ __('about.tl_labs') }}</p></div>
                <div class="tl-item"><span class="tl-year">2027</span><p>{{ __('about.tl_training') }}</p></div>
                <div class="tl-item"><span class="tl-year">2028</span><p>{{ __('about.tl_license') }}</p></div>
                <div class="tl-item"><span class="tl-year">2028</span><p>{{ __('about.tl_launch') }}</p></div>
            </div>
        </div>
    </section>



@endsection
