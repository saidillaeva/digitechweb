@extends('layouts.main')

@section('content')

    <!-- ========== HERO ABOUT ========== -->
    <section class="about-hero">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>About DigiTech</h1>
            <p>Transforming education and research through digital innovation and global partnerships.</p>
        </div>
    </section>

    <!-- ========== MISSION ========== -->
    <section class="mission">
        <div class="container">
            <div class="mission-inner">

                <div class="mission-text">
                    <h2>Our Mission</h2>
                    <p>
                        We are dedicated to transforming businesses through innovative digital solutions.
                        Our team combines creativity, technology, and strategic thinking to deliver exceptional results
                        that drive growth and success. We believe in building lasting partnerships and creating value
                        that extends beyond traditional boundaries.
                    </p>
                </div>

                <div class="mission-image">
                    <div class="image-wrapper">
                        <img src="{{ asset('assets/img/mission.webp') }}" alt="Team collaboration">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ========== STATS WITH COUNTER ========== -->
    <section class="stats reveal">
        <div class="container">
            <h2 class="section-title"><span>DigiTech in Numbers</span></h2>

            <div class="stats-grid">
                <div class="stat">
                    <span class="number" data-target="12">0</span>
                    <p>Partner Universities</p>
                </div>

                <div class="stat">
                    <span class="number" data-target="4">0</span>
                    <p>Digital Laboratories</p>
                </div>

                <div class="stat">
                    <span class="number" data-target="120">0</span>
                    <p>PhD Students Trained</p>
                </div>

                <div class="stat">
                    <span class="number" data-target="15">0</span>
                    <p>International Events</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== TIMELINE ========== -->
    <section class="timeline reveal">
        <div class="container">
            <h2 class="section-title"><span>Project Journey</span></h2>

            <div class="timeline-wrapper">
                <div class="tl-item">
                    <span class="tl-year">2023</span>
                    <p>Project proposal submitted to Erasmus+.</p>
                </div>

                <div class="tl-item">
                    <span class="tl-year">2024</span>
                    <p>Kick-off meeting hosted in Bishkek, roadmap approved.</p>
                </div>

                <div class="tl-item">
                    <span class="tl-year">2025</span>
                    <p>Opening of digital PhD labs, student mobilities and research schools.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== VALUES ========== -->
    <section class="values reveal">
        <div class="container">
            <h2 class="section-title"><span>Why DigiTech Matters</span></h2>

            <div class="values-grid">
                <div class="value-box">
                    <span class="emoji">💡</span>
                    <span class="title">Innovation</span>
                    <span>Digital tools, AI, e-learning platforms</span>
                </div>

                <div class="value-box">
                    <span class="emoji">📚</span>
                    <span class="title">Open Science</span>
                    <span>Research ethics & publication support</span>
                </div>

                <div class="value-box">
                    <span class="emoji">🤝</span>
                    <span class="title">EU Partnerships</span>
                    <span>Joint programs with European universities</span>
                </div>

                <div class="value-box">
                    <span class="emoji">🚀</span>
                    <span class="title">Future Skills</span>
                    <span>Training next-generation researchers</span>
                </div>
            </div>

        </div>
    </section>

    {{-- JS files specific to About page --}}
    <script src="{{ asset('assets/js/counter.js') }}"></script>
    <script src="{{ asset('assets/js/scroll-reveal.js') }}"></script>

@endsection
