@extends('layouts.main')

@section('title', __('home.title'))

@section('content')

    {{-- ================= HERO ================= --}}
    <section class="hero-section">
        <div class="hero-overlay"></div>

        <div class="hero-content" data-aos="fade-up">
            <h1>{{ __('home.hero_title') }}</h1>
            <p>{{ __('home.hero_subtitle') }}</p>

            <a href="{{ route('about') }}" class="hero-btn">
                {{ __('home.learn_more') }}
            </a>
        </div>
    </section>


    {{-- ================= WELCOME ================= --}}
    <section class="welcome">
        <div class="container">
            <div class="welcome-inner" data-aos="fade-up">

                <div class="welcome-card">
                    <h2 class="welcome-title">
                        {{ __('home.welcome_title') }}
                    </h2>

                    <p class="welcome-text">
                        {{ __('home.welcome_text_1') }}
                    </p>

                    <p class="welcome-text">
                        {{ __('home.welcome_text_2') }}
                    </p>

                    <div class="stats-box">
                        <div class="stat-item">
                            <h3>8+</h3>
                            <p>{{ __('home.stats_partners') }}</p>
                        </div>

                        <div class="stat-item">
                            <h3>12+</h3>
                            <p>{{ __('home.stats_programs') }}</p>
                        </div>

                        <div class="stat-item">
                            <h3>200+</h3>
                            <p>{{ __('home.stats_beneficiaries') }}</p>
                        </div>
                    </div>

                    <a href="{{ route('about') }}" class="welcome-btn">
                        {{ __('home.learn_more') }}
                    </a>
                </div>

                <div class="welcome-image">
                    <img src="{{ asset('assets/img/welcome.jpg') }}" alt="DIGITECH">
                </div>

            </div>
        </div>
    </section>


    {{-- ================= PROJECT AIMS ================= --}}
    <section class="objectives">
        <h2 class="section-title">{{ __('home.aims_title') }}</h2>
        <p class="section-subtitle">{{ __('home.aims_subtitle') }}</p>

        <div class="container">
            <div class="objectives-grid">

                <div class="objective-card" data-aos="fade-up">
                    <img src="{{ asset('assets/icons/education.svg') }}" class="obj-icon">
                    <h3>Modernize Education</h3>
                    <p>
                        Integration of Big Data, Machine Learning and AI into technical education.
                    </p>
                </div>

                <div class="objective-card" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/icons/training.svg') }}" class="obj-icon">
                    <h3>High-Quality Training</h3>
                    <p>
                        Teacher training and continuous professional development.
                    </p>
                </div>

                <div class="objective-card" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('assets/icons/inclusion.svg') }}" class="obj-icon">
                    <h3>Inclusivity</h3>
                    <p>
                        Equal opportunities for all students and regions.
                    </p>
                </div>

                <div class="objective-card" data-aos="fade-up" data-aos-delay="300">
                    <img src="{{ asset('assets/icons/economy.svg') }}" class="obj-icon">
                    <h3>Economic Growth</h3>
                    <p>
                        Improving employability and sustainable development.
                    </p>
                </div>

            </div>
        </div>
    </section>


    {{-- ================= MAIN OBJECTIVE ================= --}}
    <section class="objectives light">
        <h2 class="section-title">{{ __('home.main_objective') }}</h2>
        <p class="section-subtitle">{{ __('home.main_subtitle') }}</p>

        <div class="container">
            <div class="objectives-grid">

                <div class="objective-card" data-aos="zoom-in">
                    <img src="{{ asset('assets/icons/bachelor.svg') }}" class="obj-icon">
                    <h3>Updated Bachelor Programs</h3>
                    <p>
                        New and updated curricula with AI, ML and Big Data.
                    </p>
                </div>

                <div class="objective-card" data-aos="zoom-in" data-aos-delay="150">
                    <img src="{{ asset('assets/icons/lab.svg') }}" class="obj-icon">
                    <h3>Digital Twin Labs</h3>
                    <p>
                        Establishment of Digital Twin laboratories at HEIs.
                    </p>
                </div>

            </div>
        </div>
    </section>


    {{-- ================= LATEST EVENTS ================= --}}
    <section class="events">
        <h2 class="section-title">
            <a href="{{ route('events') }}">
                {{ __('home.events_title') }}
            </a>
        </h2>

        <p class="section-subtitle">
            {{ __('home.events_subtitle') }}
        </p>

        <div class="container">
            <div class="events-grid">

                @forelse($latestEvents as $event)
                    <div class="event-card" data-aos="fade-up">

                        <div class="event-image">
                            @if($event->image_path)
                                <img src="{{ asset('storage/'.$event->image_path) }}"
                                     alt="{{ $event->title }}">
                            @else
                                <img src="{{ asset('assets/img/event1.jpg') }}" alt="Event">
                            @endif
                        </div>

                        <div class="event-date">
                            {{ optional($event->published_at)->format('Y') }}
                        </div>

                        <h3>
                            <a href="{{ route('event-detail', $event->slug) }}">
                                {{ $event->title }}
                            </a>
                        </h3>

                        <p>
                            {{ $event->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($event->content), 80) }}
                        </p>

                    </div>

                @empty
                    <p>No events yet.</p>
                @endforelse

            </div>
        </div>
    </section>



    {{-- ================= PARTNERS ================= --}}
    <section class="partners">
        <h2 class="section-title">{{ __('home.partners_title') }}</h2>
        <p class="section-subtitle">{{ __('home.partners_subtitle') }}</p>

        <div class="partners-carousel">
            <img src="{{ asset('assets/img/partners/haw.png') }}">
            <img src="{{ asset('assets/img/partners/maribor.png') }}">
            <img src="{{ asset('assets/img/partners/inai.png') }}">
            <img src="{{ asset('assets/img/partners/ysu.png') }}">
            <img src="{{ asset('assets/img/partners/asue.png') }}">
            <img src="{{ asset('assets/img/partners/gtu.png') }}">
            <img src="{{ asset('assets/img/partners/btu.png') }}">
        </div>

        <div class="partners-bottom">
            Trusted by leading universities and institutions
        </div>
    </section>

@endsection
