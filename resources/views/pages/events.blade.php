@extends('layouts.main')

@section('content')

    <!-- HERO SECTION -->
    <section class="hero hero-events">
        <h1>Meetings and events</h1>
    </section>

    <!-- EVENTS LIST -->
    <section class="events-list">
        <div class="container">
            <div class="events-grid">

                <div class="event-card">
                    <div class="event-img-wrapper">
                        <img src="{{ asset('assets/img/event1.jpg') }}" alt="Development of PhD studies and research">
                    </div>
                    <div class="event-body">
                        <b>Development of PhD studies and research</b>
                        <p>November 2023 — Bishkek, Kyrgyzstan</p>
                        <a href="#" class="read-btn"><span>Read more…</span></a>
                    </div>
                </div>

                <div class="event-card">
                    <div class="event-img-wrapper">
                        <img src="{{ asset('assets/img/event2.jpg') }}" alt="DERECKA Continued Summer School at Brunel">
                    </div>
                    <div class="event-body">
                        <b>DERECKA Continued Summer School at Brunel</b>
                        <p>June 2023 — London, England</p>
                        <a href="#" class="read-btn"><span>Read more…</span></a>
                    </div>
                </div>

                <div class="event-card">
                    <div class="event-img-wrapper">
                        <img src="{{ asset('assets/img/event3.jpg') }}" alt="Yerevan Conference: Doctoral Studies in Public Health">
                    </div>
                    <div class="event-body">
                        <b>Yerevan Conference: Doctoral Studies in Public Health</b>
                        <p>September 2023 — Yerevan, Armenia</p>
                        <a href="#" class="read-btn"><span>Read more…</span></a>
                    </div>
                </div>

            </div>

            <!-- MORE ARTICLES -->
            <h2 class="more-title">More Articles ...</h2>

            <div class="more-links">
                <a href="#">6 Week Internship at Osh State University</a>
                <a href="#">New Year 2022 Meetings</a>
                <a href="#">DERECKA presentation at Kyrgyz National Agrarian University</a>
                <a href="#">PhD admissions at MFA KR (KY)</a>
            </div>

            <!-- PAGINATION -->
            <div class="pagination">
                <a class="active">1</a>
                <a>2</a>
                <a>3</a>
                <a>›</a>
                <a>»</a>
            </div>
        </div>
    </section>

    {{-- Подключаем events.css только на этой странице --}}
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/events.css') }}">
    @endpush

    {{-- JS (если нужен) --}}
    @push('scripts')
        <script src="{{ asset('assets/js/events.js') }}"></script>
    @endpush

@endsection
