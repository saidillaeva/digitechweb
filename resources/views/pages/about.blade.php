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

    <!-- ===== ABOUT PAGE VISITS ===== -->
    <section class="about-visits reveal">
        <div class="container">
            <div class="visit-card">
                <h2>📊 {{ __('about.analytics_title') ?? 'Analytics' }}</h2>

                <p class="visit-count">
                    👀 {{ __('about.visits') ?? 'Page visits:' }}
                    <span id="about-visit-counter">0</span>
                </p>

                <p class="visit-note">
                    {{ __('about.analytics_note') ?? 'Statistics are updated automatically' }}
                </p>
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


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const counterEl = document.getElementById('about-visit-counter');
            if (!counterEl) return;

            let visits = localStorage.getItem('about_page_visits');

            if (!visits) {
                visits = 1;
            } else {
                visits = parseInt(visits) + 1;
            }

            localStorage.setItem('about_page_visits', visits);
            counterEl.textContent = visits;

            // Google Analytics event
            if (typeof gtag === 'function') {
                gtag('event', 'view_about_page', {
                    page_title: 'About DigiTech',
                    page_path: '/about',
                    visit_count: visits
                });
            }
        });
    </script>


@endsection
