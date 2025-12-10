@extends('layouts.main')

@section('content')

    <!-- HERO -->
    <section class="hero">
        <div class="hero-content">
            <h1>DigiTech Project</h1>
            <p>Digital Education & Research Development in Kyrgyzstan</p>
            <a href="#welcome" class="btn">Learn More</a>
        </div>
        <div class="scroll-down">⌄</div>
    </section>


    <!-- WELCOME -->
    <section id="welcome" class="section welcome">
        <div class="container welcome-inner">

            <div class="welcome-text">
                <h2>Welcome to <span class="highlight">DigiTech</span></h2>

                <p>
                    DigiTech is an international initiative focused on strengthening digital education,
                    research capacity, and innovation across Kyrgyzstan,
                    in collaboration with leading European universities.
                </p>

                <div class="stats">
                    <div><b>8+</b><span>Universities</span></div>
                    <div><b>12</b><span>Training Programs</span></div>
                    <div><b>200+</b><span>Researchers Involved</span></div>
                </div>

                <a href="{{ url('/about') }}" class="btn-secondary">Learn more</a>
            </div>

            <img
                src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&auto=format&fit=crop"
                alt="Digital Lab"
                class="welcome-img"
            />

        </div>
    </section>


    <!-- MAIN OBJECTIVES -->
    <section class="section">
        <div class="container">
            <h2 style="color: #0f172a;">Main Objectives</h2>
            <p class="muted">Core focus areas of the DigiTech project</p>

            <div class="cards">

                <div class="card">
                    <div class="icon-circle">🎓</div>
                    <b>Modernize Education</b>
                    <p>Develop digital curricula aligned with EU standards to transform teaching and learning.</p>
                </div>

                <div class="card">
                    <div class="icon-circle">💻</div>
                    <b>Digital Research Tools</b>
                    <p>Introduce advanced software and open-access tools to boost scientific productivity.</p>
                </div>

                <div class="card">
                    <div class="icon-circle">🤝</div>
                    <b>International Collaboration</b>
                    <p>Build lasting partnerships between Kyrgyz and European universities for sustainable growth.</p>
                </div>

                <div class="card">
                    <div class="icon-circle">🌍</div>
                    <b>Global Research Culture</b>
                    <p>Encourage academic mobility, open science, and high ethical standards in research.</p>
                </div>

            </div>
        </div>
    </section>


    <!-- LATEST EVENTS -->
    <section class="section">
        <div class="container">
            <h2>Latest Events</h2>

            <div class="events-grid">

                <div class="event-card">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&auto=format&fit=crop">
                    <div class="event-body">
                        <b>Kick-off Meeting in Bishkek</b>
                        <span class="muted">October 2024</span>
                        <a href="#">Read more</a>
                    </div>
                </div>

                <div class="event-card">
                    <img src="https://images.unsplash.com/photo-1591115765373-5207764f72e7?w=800&auto=format&fit=crop">
                    <div class="event-body">
                        <b>Digital Workshop in Osh</b>
                        <span class="muted">August 2024</span>
                        <a href="#">Read more</a>
                    </div>
                </div>

                <div class="event-card">
                    <img src="https://images.unsplash.com/photo-1588196749597-9ff075ee6b5b?w=800&auto=format&fit=crop">
                    <div class="event-body">
                        <b>Online Research Webinar</b>
                        <span class="muted">June 2024</span>
                        <a href="#">Read more</a>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- PARTNERS -->
    <section class="partners">
        <div class="container">
            <h2>Our Partners</h2>
            <p class="muted">Supported by European and Kyrgyz institutions</p>

            <div class="partners-slider">
                <div class="slider-edge-left"></div>
                <div class="slider-edge-right"></div>

                <div class="partners-track">

                    <div class="logo-card"><img src="{{ asset('assets/img/eu.jpg') }}"></div>
                    <div class="logo-card"><img src="{{ asset('assets/img/erasmus.jpg') }}"></div>
                    <div class="logo-card"><img src="{{ asset('assets/img/univer1.jpg') }}"></div>
                    <div class="logo-card"><img src="{{ asset('assets/img/univer2.png') }}"></div>
                    <div class="logo-card"><img src="{{ asset('assets/img/univer3.webp') }}"></div>
                    <div class="logo-card"><img src="{{ asset('assets/img/univer4.jpg') }}"></div>

                    {{-- Duplicate for scrolling --}}
                    <div class="logo-card"><img src="{{ asset('assets/img/eu.jpg') }}"></div>
                    <div class="logo-card"><img src="{{ asset('assets/img/erasmus.jpg') }}"></div>
                    <div class="logo-card"><img src="{{ asset('assets/img/univer1.jpg') }}"></div>
                    <div class="logo-card"><img src="{{ asset('assets/img/univer2.png') }}"></div>
                    <div class="logo-card"><img src="{{ asset('assets/img/univer3.webp') }}"></div>
                    <div class="logo-card"><img src="{{ asset('assets/img/univer4.jpg') }}"></div>

                </div>
            </div>

            <div class="trust-badge">
                Trusted by leading institutions worldwide
            </div>

        </div>
    </section>

@endsection
