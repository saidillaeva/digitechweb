@extends('layouts.main')

@section('content')

    <!-- HERO SECTION -->
    <section class="hero-events">
        <h1>Meetings and events</h1>
    </section>

    <!-- MAIN CONTENT -->
    <section class="event-detail">
        <div class="container">

            <a href="{{ url('/events') }}" class="back-btn">← Back to Events</a>

            <h2 class="event-title">Development of PhD Education and Research Potential</h2>
            <p class="muted">January 2025 — Bishkek, Kyrgyzstan</p>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pharetra,
                mauris id vestibulum mattis, lectus arcu porta nisl, vitae molestie lectus massa id arcu.
                Duis id quam sed lorem placerat interdum quis et sem.
            </p>

            <p>
                Curabitur dapibus mauris et orci fringilla, nec suscipit erat vehicula.
                Fusce vitae tellus auctor, posuere urna sed, consectetur orci. Sed euismod,
                quam sed finibus gravida, turpis ex auctor justo, eget feugiat lorem lacus in nisl.
                Integer pellentesque libero ut elementum dignissim.
            </p>

            <p>
                Donec porta, justo quis dapibus commodo, urna massa hendrerit ante, at pretium
                ex turpis non neque. Aenean varius pulvinar tincidunt. Nullam elementum pretium arcu,
                nec bibendum mi rutrum id. Cras nec iaculis lacus.
            </p>

            <h3>Objectives of the Event</h3>
            <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                <li>Fusce sit amet lorem ut ipsum iaculis finibus.</li>
                <li>Praesent tempus tortor vitae lacus faucibus, eget gravida arcu sollicitudin.</li>
            </ul>

            <!-- Gallery -->
            <h3>Gallery</h3>
            <div class="detail-gallery">
                <img src="{{ asset('assets/img/event1.jpg') }}" alt="">
                <img src="{{ asset('assets/img/event2.jpg') }}" alt="">
                <img src="{{ asset('assets/img/event3.jpg') }}" alt="">
                <img src="{{ asset('assets/img/event1.jpg') }}" alt="">
            </div>

        </div>
    </section>

    {{-- Подключаем CSS --}}
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/events.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/event-detail.css') }}">
    @endpush

    {{-- Подключаем JS --}}
    @push('scripts')
        <script src="{{ asset('assets/js/events.js') }}"></script>
    @endpush

@endsection
