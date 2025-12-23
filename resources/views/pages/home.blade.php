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
                    <img src="{{ asset('assets/img/welcome.png') }}" alt="DIGITECH">
                </div>

            </div>
        </div>
    </section>


    {{-- ================= PROJECT AIMS ================= --}}
    <section class="objectives">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">{{ __('home.objectives_title') }}</h2>
            </div>

            <div class="objectives-grid">

                <!-- Card 1 -->
                <div class="objective-card">
                    <span class="card-number">1</span>
                    <div class="icon-wrapper">
                        <!-- Education & Industry -->
                        <svg class="obj-icon" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 14L21 9L12 4L3 9L12 14Z"
                                  stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 14V20"
                                  stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="content-wrapper">
                        <h3>{{ __('home.objective_1_title') }}</h3>
                        <p>{{ __('home.objective_1_text') }}</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="objective-card">
                    <span class="card-number">2</span>
                    <div class="icon-wrapper">
                        <!-- People / Employability -->
                        <svg class="obj-icon" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <circle cx="9" cy="7" r="4"
                                    stroke="currentColor" stroke-width="2"/>
                            <path d="M1 21V19C1 16.8 3 15 5 15H13C15 15 17 16.8 17 19V21"
                                  stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round"/>
                            <path d="M16 3.5C17.5 4.2 18.5 5.7 18.5 7.5"
                                  stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="content-wrapper">
                        <h3>{{ __('home.objective_2_title') }}</h3>
                        <p>{{ __('home.objective_2_text') }}</p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="objective-card">
                    <span class="card-number">3</span>
                    <div class="icon-wrapper">
                        <!-- Industry 4.0 / Digital -->
                        <svg class="obj-icon" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <rect x="2" y="3" width="20" height="14" rx="2"
                                  stroke="currentColor" stroke-width="2"/>
                            <path d="M8 21H16"
                                  stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round"/>
                            <path d="M12 17V21"
                                  stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="content-wrapper">
                        <h3>{{ __('home.objective_3_title') }}</h3>
                        <p>{{ __('home.objective_3_text') }}</p>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="objective-card">
                    <span class="card-number">4</span>
                    <div class="icon-wrapper">
                        <!-- Sustainability / Europe -->
                        <svg class="obj-icon" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="2"/>
                            <path d="M12 6V12L16 14"
                                  stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="content-wrapper">
                        <h3>{{ __('home.objective_4_title') }}</h3>
                        <p>{{ __('home.objective_4_text') }}</p>
                    </div>
                </div>

            </div>
        </div>
    </section>



    {{-- ================= MAIN OBJECTIVES ================= --}}
    <section class="main-objectives">
        <div class="main-objectives__container">

            <div class="main-objectives__header">
                <h2 class="main-objectives__title">{{ __('home.main_objectives_title') }}</h2>
                <p class="main-objectives__subtitle">
                    {{ __('home.main_objectives_subtitle') }}
                </p>
            </div>

            <div class="main-objectives__orbit">

                <div class="main-objectives__card">
                    <span class="main-objectives__number">1</span>
                    <h3>{{ __('home.main_1_title') }}</h3>
                    <p>{{ __('home.main_1_text_1') }}</p>
                    <p>{{ __('home.main_1_text_2') }}</p>
                </div>

                <div class="main-objectives__card">
                    <span class="main-objectives__number">2</span>
                    <h3>{{ __('home.main_2_title') }}</h3>
                    <p>{{ __('home.main_2_text_1') }}</p>
                    <p>{{ __('home.main_2_text_2') }}</p>
                </div>

                <div class="main-objectives__card">
                    <span class="main-objectives__number">3</span>
                    <h3>{{ __('home.main_3_title') }}</h3>
                    <p>{{ __('home.main_3_text') }}</p>
                </div>

                <div class="main-objectives__card">
                    <span class="main-objectives__number">4</span>
                    <h3>{{ __('home.main_4_title') }}</h3>
                    <p>{{ __('home.main_4_text_1') }}</p>
                    <p>{{ __('home.main_4_text_2') }}</p>
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

        <div class="container">
            <div class="events-grid">

                @php
                    $locale = app()->getLocale();          // ru | en | ky | de
                    $dbLocale = $locale === 'ky' ? 'kg' : $locale; // kg для БД
                @endphp

                @forelse($latestEvents as $event)
                    <div class="event-card" data-aos="fade-up">

                        <div class="event-image">
                            @if($event->image_path)
                                <img
                                    src="{{ asset('storage/'.$event->image_path) }}"
                                    alt="{{ $event->{'title_'.$dbLocale} ?? $event->title_en }}"
                                >
                            @else
                                <img src="{{ asset('assets/img/event1.jpg') }}" alt="Event">
                            @endif
                        </div>

                        <div class="event-date">
                            {{ optional($event->published_at)->format('Y') }}
                        </div>

                        <h3>
                            <a href="{{ route('event-detail', $event->slug) }}">
                                {{ $event->{'title_'.$dbLocale} ?? $event->title_en }}
                            </a>
                        </h3>

                        <p>
                            {{
                                $event->{'excerpt_'.$dbLocale}
                                ?? \Illuminate\Support\Str::limit(
                                    strip_tags($event->{'content_'.$dbLocale} ?? $event->content_en),
                                    80
                                )
                            }}
                        </p>

                    </div>
                @empty
                    <p>{{ __('events.empty') }}</p>
                @endforelse

            </div>
        </div>
    </section>



    {{-- ================= PARTNERS ================= --}}
    <section class="partners">
        <h2 class="section-title">{{ __('home.partners_title') }}</h2>


        <div class="partners-carousel">
            <img src="{{ asset('assets/img/partners/haw.png') }}">
            <img src="{{ asset('assets/img/partners/maribor.png') }}">
            <img src="{{ asset('assets/img/partners/inai.png') }}">
            <img src="{{ asset('assets/img/partners/ysu.png') }}">
            <img src="{{ asset('assets/img/partners/asue.png') }}">
            <img src="{{ asset('assets/img/partners/gtu.png') }}">
            <img src="{{ asset('assets/img/partners/btu.png') }}">
        </div>

    </section>

@endsection
