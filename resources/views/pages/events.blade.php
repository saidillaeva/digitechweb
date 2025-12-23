@extends('layouts.main')

@push('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --dark-blue: #1e3a8a;
            --deep-blue: #1e40af;
            --blue-600: #2563eb;
            --purple: #7c3aed;
            --light-purple: #a78bfa;
            --ultra-light: #ddd6fe;
            --white: #ffffff;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --gray-900: #0f172a;
        }


        /* ==================== EVENTS LIST SECTION ==================== */
        .events-list {
            padding: 100px 20px;
            background: linear-gradient(to bottom, var(--gray-50) 0%, var(--white) 50%, var(--gray-50) 100%);
            position: relative;
        }

        .events-list::before {
            content: '';
            position: absolute;
            top: -100px;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(124, 58, 237, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* ==================== EVENTS GRID ==================== */
        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 40px;
            margin-bottom: 80px;
        }

        .event-card {
            background: var(--white);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(30, 58, 138, 0.08);
            border: 2px solid var(--gray-200);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            animation: slideUp 0.6s ease-out backwards;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .event-card:nth-child(1) { animation-delay: 0.1s; }
        .event-card:nth-child(2) { animation-delay: 0.2s; }
        .event-card:nth-child(3) { animation-delay: 0.3s; }
        .event-card:nth-child(4) { animation-delay: 0.4s; }
        .event-card:nth-child(5) { animation-delay: 0.5s; }
        .event-card:nth-child(6) { animation-delay: 0.6s; }

        .event-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--dark-blue), var(--purple), var(--light-purple));
            transform: scaleX(0);
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: left;
            z-index: 10;
        }

        .event-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 60px rgba(124, 58, 237, 0.25), 0 15px 40px rgba(30, 58, 138, 0.15);
            border-color: var(--light-purple);
        }

        .event-card:hover::before {
            transform: scaleX(1);
        }

        /* ==================== EVENT IMAGE ==================== */
        .event-img-wrapper {
            position: relative;
            width: 100%;
            height: 200px;
            overflow: hidden;
            background: linear-gradient(135deg, var(--gray-200), var(--gray-100));
        }

        .event-img-wrapper::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.3) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .event-card:hover .event-img-wrapper::after {
            opacity: 1;
        }

        .event-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .event-card:hover .event-img-wrapper img {
            transform: scale(1.1);
        }

        /* ==================== EVENT BODY ==================== */
        .event-body {
            padding: 35px 30px 40px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .event-body b {
            font-size: clamp(1.3rem, 2vw, 1.5rem);
            font-weight: 700;
            color: var(--gray-900);
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.3s ease;
        }

        .event-card:hover .event-body b {
            background: linear-gradient(135deg, var(--dark-blue) 0%, var(--purple) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .event-body > p {
            color: var(--gray-600);
            font-size: 0.95rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .event-body > p::before {
            content: '📅';
            font-size: 1rem;
        }

        /* ==================== READ MORE BUTTON ==================== */
        .read-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 14px 32px;
            background: linear-gradient(135deg, var(--dark-blue) 0%, var(--purple) 100%);
            color: var(--white);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 6px 20px rgba(124, 58, 237, 0.3);
            align-self: flex-start;
            position: relative;
            overflow: hidden;
            margin-top: 8px;
        }

        .read-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s;
        }

        .read-btn:hover {
            transform: translateX(5px);
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.4);
            background: linear-gradient(135deg, var(--purple) 0%, var(--light-purple) 100%);
        }

        .read-btn:hover::before {
            left: 100%;
        }

        .read-btn span {
            position: relative;
            z-index: 1;
        }

        .read-btn::after {
            content: '→';
            margin-left: 8px;
            transition: transform 0.3s ease;
        }

        .read-btn:hover::after {
            transform: translateX(4px);
        }

        /* ==================== EMPTY STATE ==================== */
        .events-empty {
            text-align: center;
            font-size: clamp(1.2rem, 2vw, 1.5rem);
            color: var(--gray-600);
            padding: 80px 20px;
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.05), rgba(30, 58, 138, 0.05));
            border-radius: 20px;
            border: 2px dashed var(--gray-300);
            font-weight: 600;
        }

        /* ==================== PAGINATION ==================== */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 60px;
        }

        .pagination nav {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .pagination a,
        .pagination span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 45px;
            height: 45px;
            padding: 0 16px;
            background: var(--white);
            color: var(--gray-700);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            border: 2px solid var(--gray-200);
            transition: all 0.3s ease;
        }

        .pagination a:hover {
            background: linear-gradient(135deg, var(--dark-blue) 0%, var(--purple) 100%);
            color: var(--white);
            border-color: var(--purple);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(124, 58, 237, 0.3);
        }

        .pagination .active span {
            background: linear-gradient(135deg, var(--dark-blue) 0%, var(--purple) 100%);
            color: var(--white);
            border-color: var(--purple);
            box-shadow: 0 4px 15px rgba(124, 58, 237, 0.25);
        }

        .pagination .disabled span {
            opacity: 0.4;
            cursor: not-allowed;
        }

        /* ==================== RESPONSIVE DESIGN ==================== */
        @media (max-width: 1200px) {
            .events-grid {
                grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
                gap: 35px;
            }
        }

        @media (max-width: 900px) {
            .hero-events {
                min-height: 60vh;
            }

            .events-list {
                padding: 80px 20px;
            }

            .events-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                gap: 30px;
            }

            .event-img-wrapper {
                height: 240px;
            }
        }

        @media (max-width: 768px) {
            .hero-events {
                min-height: 50vh;
            }

            .hero-content {
                padding: 40px 20px;
            }

            .events-list {
                padding: 60px 15px;
            }

            .events-grid {
                grid-template-columns: 1fr;
                gap: 30px;
                max-width: 500px;
                margin: 0 auto 60px;
            }

            .event-card {
                border-radius: 20px;
            }

            .event-img-wrapper {
                height: 260px;
            }

            .event-body {
                padding: 30px 25px 35px;
            }

            .pagination a,
            .pagination span {
                min-width: 42px;
                height: 42px;
            }
        }

        @media (max-width: 480px) {
            .hero-events {
                min-height: 45vh;
            }

            .hero-content {
                padding: 30px 15px;
            }

            .events-list {
                padding: 50px 10px;
            }

            .events-grid {
                gap: 25px;
            }

            .event-card {
                border-radius: 18px;
            }

            .event-img-wrapper {
                height: 220px;
            }

            .event-body {
                padding: 25px 20px 30px;
                gap: 14px;
            }

            .read-btn {
                width: 100%;
                padding: 16px 28px;
            }

            .pagination a,
            .pagination span {
                min-width: 40px;
                height: 40px;
                padding: 0 12px;
                font-size: 0.9rem;
            }
        }

        /* ==================== ACCESSIBILITY ==================== */
        .event-card:focus-within {
            outline: 3px solid var(--purple);
            outline-offset: 4px;
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* ==================== SMOOTH SCROLLING ==================== */
        html {
            scroll-behavior: smooth;
        }

        /* ==================== SELECTION COLOR ==================== */
        ::selection {
            background: var(--light-purple);
            color: var(--white);
        }
    </style>
@endpush

@section('content')

    @php
        $locale = app()->getLocale();
        $dbLocale = $locale === 'ky' ? 'kg' : $locale;
    @endphp

    <section class="hero hero-events">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1>{{ __('events.title') }}</h1>
            <p>{{ __('events.subtitle') }}</p>
        </div>
    </section>


    <section class="events-list">
        <div class="container">
            <div class="events-grid">
                @forelse($events as $event)
                    <div class="event-card">
                        <div class="event-img-wrapper">
                            @if($event->image_path)
                                <img
                                    src="{{ asset('storage/' . $event->image_path) }}"
                                    alt="{{ $event->title }}"
                                >
                            @else
                                <img
                                    src="{{ asset('assets/img/event1.jpg') }}"
                                    alt="Event image"
                                >
                            @endif
                        </div>

                        <div class="event-body">
                            <b>{{ $event->{'title_'.$dbLocale} ?? $event->title_en }}</b>

                            <p>
                                {{ optional($event->published_at)->translatedFormat('F Y') }}
                            </p>

                            <a href="{{ route('event-detail', $event->slug) }}" class="read-btn">
                                <span>{{ __('events.read_more') }}</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="events-empty">
                        {{ __('events.empty') }}
                    </p>
                @endforelse
            </div>

            <div class="pagination">
                {{ $events->links() }}
            </div>
        </div>
    </section>

@endsection
