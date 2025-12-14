@extends('layouts.main')

@section('content')

    @push('styles')
        <style>
            /* ================= HERO EVENTS ================= */

            .hero-events {
                position: relative;
                height: 1100px;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                color: #fff;
            }

            /* 🔹 ФОН */
            .hero-events .hero-bg {
                position: absolute;
                top: -10%;
                left: 0;
                right: 0;
                bottom: -18%;

                background:
                    linear-gradient(
                        rgba(0, 0, 0, 0.25),
                        rgba(0, 0, 0, 0.55)
                    ),
                    url('{{ asset('assets/img/events.webp') }}') center / cover no-repeat;

                filter:
                    brightness(0.8)
                    contrast(1.05)
                    saturate(1.05);

                z-index: 0;
                transform: scale(1.18);
                animation: heroZoom 14s ease-in-out infinite alternate;
            }

            /* 🔹 ЧЁРНЫЙ OVERLAY */
            .hero-events .hero-overlay {
                position: absolute;
                inset: 0;
                background: linear-gradient(
                    rgba(0, 0, 0, 0.35),
                    rgba(0, 0, 0, 0.5)
                );
                z-index: 1;
            }

            /* 🔹 GLASS */
            .hero-events .hero-content {
                position: relative;
                z-index: 2;
                padding: 44px 56px;

                backdrop-filter: blur(8px);
                background: rgba(255, 255, 255, 0.08);
                border-radius: 18px;
                border: 1px solid rgba(255, 255, 255, 0.22);

                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.45);
            }

            /* 🔹 ТЕКСТ */
            .hero-events h1 {
                font-size: clamp(38px, 4vw, 56px);
                margin-bottom: 12px;
                text-shadow: 0 4px 16px rgba(0, 0, 0, 0.75);
            }

            /* 🔹 АНИМАЦИЯ */
            @keyframes heroZoom {
                from { transform: scale(1.12); }
                to   { transform: scale(1.24); }
            }
        </style>
    @endpush


    @section('content')

        {{-- HERO --}}
        <section class="hero hero-events">

            <!-- ФОН -->
            <div class="hero-bg"></div>

            <!-- ЧЁРНЫЙ OVERLAY -->
            <div class="hero-overlay"></div>

            <!-- GLASS ТЕКСТ -->
            <div class="hero-content">
                <h1>{{ $event->title }}</h1>
            </div>

        </section>


        {{-- CONTENT --}}
    <section class="event-detail"
             style="
                background: #ffffff;
                min-height: 100vh;
                padding: 60px 20px;
             ">

        <div class="container"
             style="
        max-width: 900px;
        margin: 0 auto;
        background: #c5d7ef; /* 👈 ВОТ ЗДЕСЬ МЕНЯЕМ ФОН ЭЛЕМЕНТА */
        border-radius: 16px;
        padding: 50px;
        box-shadow: 0 12px 40px rgba(0,0,0,0.08);
        border: 1px solid #e2e8f0;
     ">


        {{-- DATE --}}
            <p class="event-date"
               style="
                    color: #dde3ec;
                    font-size: 1rem;
                    font-weight: 500;
                    margin-bottom: 30px;
                    text-align: center;
               ">
                {{ optional($event->published_at)->format('F d, Y') }}
            </p>

            {{-- IMAGE --}}
            @if($event->image_path)
                <div class="event-image"
                     style="
                        margin: 40px 0;
                        border-radius: 14px;
                        overflow: hidden;
                        box-shadow: 0 8px 30px rgba(0,0,0,0.08);
                     ">
                    <img src="{{ asset('storage/'.$event->image_path) }}"
                         alt="{{ $event->title }}"
                         style="width: 100%; height: auto; display: block;">
                </div>
            @endif

            {{-- CONTENT --}}
            <div class="event-content"
                 style="
                    color: #1e293b;
                    font-size: 1.1rem;
                    line-height: 1.8;
                    margin: 40px 0;
                 ">
                {!! nl2br(e($event->content)) !!}
            </div>

            {{-- BACK BUTTON --}}
            <div style="text-align: center; margin-top: 50px;">
                <a href="{{ route('events') }}"
                   style="
                        display: inline-flex;
                        align-items: center;
                        gap: 10px;
                        color: #2563eb;
                        text-decoration: none;
                        font-size: 1rem;
                        font-weight: 600;
                        padding: 14px 28px;
                        background: #f8fafc;
                        border: 1px solid #dbeafe;
                        border-radius: 10px;
                        transition: all .25s ease;
                   "
                   onmouseover="
                        this.style.background='#eff6ff';
                        this.style.transform='translateY(-2px)';
                   "
                   onmouseout="
                        this.style.background='#f8fafc';
                        this.style.transform='translateY(0)';
                   ">
                    ← Back to events
                </a>
            </div>

        </div>
    </section>

    {{-- RESPONSIVE --}}
    <style>
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem !important;
            }
            .container {
                padding: 30px 20px !important;
            }
            .event-content {
                font-size: 1rem !important;
            }
        }
    </style>

@endsection
