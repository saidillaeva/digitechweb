@extends('layouts.main')

@push('styles')
    <style>
        /* ===== VARIABLES ===== */
        :root {
            --primary-purple: #5B4B8A;
            --deep-blue: #2D3561;
            --accent-purple: #8B7AB8;
            --light-purple: #B8A8D9;
            --bg-gradient-start: #1a1b3d;
            --bg-gradient-end: #2d1b4e;
        }

        /* ===== HERO ===== */
        .about-hero {
            position: relative;
            min-height: 380px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 70px;
            overflow: hidden;
        }
        .about-hero::before {
            content:'';
            position:absolute;
            inset:0;
            background:linear-gradient(135deg,var(--bg-gradient-start),var(--bg-gradient-end));
        }
        .about-hero::after {
            content:'';
            position:absolute;
            inset:0;
            background:
                radial-gradient(circle at 20% 50%, rgba(139,122,184,.25), transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(91,75,138,.35), transparent 50%);
        }
        .hero-content {
            position:relative;
            z-index:2;
            text-align:center;
        }
        .hero-content h1 {
            font-size:52px;
            color:#fff;
            font-weight:700;
        }

        /* ===== WRAPPER ===== */
        .events-wrapper {
            max-width:1000px;
            margin:0 auto 80px;
            padding:0 20px;
            position:relative;
        }

        /* ===== TITLE ===== */
        .events-title {
            font-size:42px;
            text-align:center;
            font-weight:700;
            color:var(--deep-blue);
        }
        .events-subtitle {
            text-align:center;
            color:var(--primary-purple);
            max-width:600px;
            margin:16px auto 50px;
        }

        /* ===== LIST (VERTICAL CENTERED) ===== */
        .events-list {
            display:flex;
            flex-direction:column;
            gap:18px;
            align-items:center;
        }

        /* ===== HORIZONTAL CARD ===== */
        .event-card {
            width:100%;
            max-width:860px;
            display:flex;
            align-items:center;
            gap:22px;
            padding:22px 26px;
            background:#fff;
            border-radius:18px;
            border:2px solid transparent;
            text-decoration:none;
            color:var(--deep-blue);
            box-shadow:0 6px 26px rgba(91,75,138,.12);
            transition:.35s ease;
            position:relative;
        }
        .event-card::before {
            content:'';
            position:absolute;
            left:0;
            top:0;
            width:5px;
            height:100%;
            background:linear-gradient(var(--primary-purple),var(--accent-purple));
            transform:scaleY(0);
            transition:.35s ease;
        }
        .event-card:hover {
            transform:translateY(-4px);
            box-shadow:0 18px 50px rgba(91,75,138,.25);
            border-color:var(--light-purple);
        }
        .event-card:hover::before {
            transform:scaleY(1);
        }

        /* ===== ICON ===== */
        .event-icon {
            width:56px;
            height:56px;
            border-radius:16px;
            background:linear-gradient(135deg,var(--primary-purple),var(--accent-purple));
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:24px;
            color:#fff;
            box-shadow:0 8px 24px rgba(91,75,138,.35);
            flex-shrink:0;
        }

        /* ===== CONTENT ===== */
        .event-content {
            flex:1;
        }
        .event-title {
            font-size:18px;
            font-weight:600;
            margin-bottom:6px;
        }
        .event-meta {
            font-size:12px;
            color:var(--accent-purple);
            text-transform:uppercase;
            letter-spacing:.6px;
        }

        /* ===== ARROW ===== */
        .event-arrow {
            font-size:20px;
            color:var(--primary-purple);
            transition:.3s ease;
        }
        .event-card:hover .event-arrow {
            transform:translate(4px,-4px);
        }

        /* ===== EMPTY ===== */
        .empty {
            text-align:center;
            padding:80px 20px;
            border-radius:20px;
            border:2px dashed var(--light-purple);
            color:var(--primary-purple);
        }
        .empty::before {
            content:"📭";
            display:block;
            font-size:64px;
            margin-bottom:20px;
        }

        /* ===== RESPONSIVE ===== */
        @media(max-width:768px){
            .hero-content h1{font-size:36px}
            .events-title{font-size:32px}
            .event-card{flex-direction:column;align-items:flex-start}
            .event-arrow{align-self:flex-end}
        }
    </style>
@endpush

@section('content')

    <section class="about-hero">
        <div class="hero-content">
            <h1>{{ $universityName }}</h1>
        </div>
    </section>

    <section class="events-wrapper">

        <div class="events-title">
            {{ __('partner-details.events_title') }}
        </div>

        <div class="events-subtitle">
            {{ __('partner-details.events_subtitle') }}
        </div>


    @if(count($events))
            <div class="events-list">
                @foreach($events as $event)
                    <a href="{{ $event['url'] }}" target="_blank" class="event-card">
                        <div class="event-icon">🔗</div>

                        <div class="event-content">
                            <div class="event-title">{{ $event['title'] }}</div>
                            <div class="event-meta">
                                {{ __('partner-details.external_link') }}
                            </div>

                        </div>

                        <div class="event-arrow">↗</div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="empty">
                {{ __('partner-details.empty') }}
            </div>

        @endif

    </section>
@endsection
