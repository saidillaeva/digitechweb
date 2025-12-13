@extends('layouts.main')

@section('content')

    {{-- HERO --}}
    <section class="hero hero-events"
             style="
                background: #ffffff;
                padding: 80px 20px;
                text-align: center;
                border-bottom: 1px solid #e5e7eb;
             ">
        <h1 style="
            color: #0f172a;
            font-size: 3rem;
            font-weight: 700;
            margin: 0;
        ">
            {{ $event->title }}
        </h1>
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
                    color: #475569;
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
