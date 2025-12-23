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
            --purple: #7c3aed;
            --light-purple: #a78bfa;
            --ultra-light-purple: #ddd6fe;
            --white: #ffffff;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-600: #475569;
            --gray-800: #1e293b;
        }

        /* ==================== HERO SECTION ==================== */


        /* ==================== PARTNERS SECTION ==================== */
        .partners-section {
            padding: 100px 20px;
            position: relative;
            background: linear-gradient(to bottom, var(--white) 0%, var(--gray-50) 100%);
        }

        .partners-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 200px;
            background: linear-gradient(to bottom, var(--gray-50), transparent);
            pointer-events: none;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            text-align: center;
            margin-bottom: 70px;
            background: linear-gradient(135deg, var(--dark-blue) 0%, var(--purple) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.02em;
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 5px;
            background: linear-gradient(90deg, var(--purple), var(--light-purple));
            border-radius: 3px;
        }

        /* ==================== PARTNERS GRID ==================== */
        .partners-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 35px;
            margin-top: 50px;
        }

        .partner-card {
            background: var(--white);
            border-radius: 24px;
            padding: 40px 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid var(--gray-200);
            position: relative;
            overflow: hidden;
            min-height: 280px;
            box-shadow: 0 4px 15px rgba(30, 58, 138, 0.06);
        }

        .partner-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--dark-blue), var(--purple), var(--light-purple));
            transform: scaleX(0);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: left;
        }

        .partner-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.03) 0%, rgba(30, 58, 138, 0.03) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .partner-card:hover {
            transform: translateY(-12px);
            border-color: var(--light-purple);
            box-shadow: 0 20px 50px rgba(124, 58, 237, 0.2), 0 10px 30px rgba(30, 58, 138, 0.15);
        }

        .partner-card:hover::before {
            transform: scaleX(1);
        }

        .partner-card:hover::after {
            opacity: 1;
        }

        .partner-card img {
            width: 100%;
            max-width: 180px;
            height: auto;
            object-fit: contain;
            margin-bottom: 25px;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            z-index: 1;
            filter: grayscale(20%);
        }

        .partner-card:hover img {
            transform: scale(1.08);
            filter: grayscale(0%);
        }

        .partner-card h3 {
            font-size: clamp(1.1rem, 2vw, 1.3rem);
            font-weight: 700;
            color: var(--gray-800);
            text-align: center;
            line-height: 1.4;
            transition: color 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .partner-card:hover h3 {
            background: linear-gradient(135deg, var(--dark-blue) 0%, var(--purple) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ==================== DECORATIVE ELEMENTS ==================== */
        .partners-section::after {
            content: '';
            position: absolute;
            bottom: -100px;
            right: -100px;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(124, 58, 237, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        /* ==================== RESPONSIVE DESIGN ==================== */
        @media (max-width: 1200px) {
            .partners-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 30px;
            }
        }

        @media (max-width: 900px) {
            .partners-hero {
                min-height: 55vh;
            }

            .partners-section {
                padding: 80px 20px;
            }

            .partners-grid {
                grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
                gap: 25px;
            }

            .partner-card {
                padding: 35px 25px;
                min-height: 250px;
            }

            .section-title {
                margin-bottom: 50px;
            }
        }

        @media (max-width: 768px) {
            .partners-hero {
                min-height: 50vh;
            }

            .partners-hero-content {
                padding: 30px 20px;
            }

            .partners-section {
                padding: 60px 15px;
            }

            .partners-grid {
                grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
                gap: 20px;
            }

            .partner-card {
                padding: 30px 20px;
                min-height: 220px;
                border-radius: 20px;
            }

            .partner-card img {
                max-width: 140px;
                margin-bottom: 20px;
            }
        }

        @media (max-width: 480px) {
            .partners-hero {
                min-height: 45vh;
            }

            .partners-hero-content {
                padding: 25px 15px;
            }

            .partners-section {
                padding: 50px 10px;
            }

            .partners-grid {
                grid-template-columns: 1fr;
                gap: 20px;
                max-width: 400px;
                margin: 50px auto 0;
            }

            .partner-card {
                padding: 35px 25px;
                min-height: 240px;
            }

            .partner-card img {
                max-width: 160px;
            }

            .section-title::after {
                width: 80px;
                height: 4px;
            }
        }

        /* ==================== ANIMATIONS ==================== */
        .partner-card {
            animation: slideInUp 0.6s ease-out backwards;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .partner-card:nth-child(1) { animation-delay: 0.05s; }
        .partner-card:nth-child(2) { animation-delay: 0.1s; }
        .partner-card:nth-child(3) { animation-delay: 0.15s; }
        .partner-card:nth-child(4) { animation-delay: 0.2s; }
        .partner-card:nth-child(5) { animation-delay: 0.25s; }
        .partner-card:nth-child(6) { animation-delay: 0.3s; }
        .partner-card:nth-child(7) { animation-delay: 0.35s; }
        .partner-card:nth-child(8) { animation-delay: 0.4s; }
        .partner-card:nth-child(9) { animation-delay: 0.45s; }

        /* ==================== ACCESSIBILITY ==================== */
        .partner-card:focus {
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

    <section class="partners-hero">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>

        <div class="partners-hero-content">
            <h1>{{ __('partners.title') }}</h1>
            <p>{{ __('partners.subtitle') }}</p>
        </div>
    </section>

    <section class="partners-section light">
        <div class="container">
            <h2 class="section-title">{{ __('partners.beneficiaries') }}</h2>

            <div class="partners-grid">
                @foreach($universities as $u)
                    <a href="{{ route('partners.show', $u['slug']) }}" class="partner-card">
                        <img
                            src="{{ asset('assets/img/partners/'.$u['logo']) }}"
                            alt="{{ $u['name'] }}"
                        >
                        <h3>{{ $u['name'] }}</h3>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

@endsection
