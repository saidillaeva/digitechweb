@extends('layouts.main')

@push('styles')
    <style>
        /* ===== VARIABLES ===== */
        :root {
            --primary-purple: #5B4B8A;
            --deep-blue: #2D3561;
            --dark-purple: #3D2E5F;
            --accent-purple: #8B7AB8;
            --light-purple: #B8A8D9;
            --bg-gradient-start: #1a1b3d;
            --bg-gradient-end: #2d1b4e;
        }


        /* ===== MAIN CONTENT ===== */
        .project-docs {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px 80px;
        }

        .page-title {
            font-size: 42px;
            font-weight: 700;
            color: var(--deep-blue);
            margin-bottom: 16px;
            text-align: center;
        }

        .page-subtitle {
            font-size: 18px;
            color: var(--primary-purple);
            text-align: center;
            margin-bottom: 60px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }

        /* ===== SECTION TITLES ===== */
        .docs-section-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--deep-blue);
            margin: 60px 0 30px;
            padding-bottom: 16px;
            border-bottom: 3px solid var(--accent-purple);
            position: relative;
        }

        .docs-section-title::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-purple), var(--accent-purple));
        }

        .docs-subtitle {
            font-size: 22px;
            font-weight: 600;
            color: var(--primary-purple);
            margin: 40px 0 24px;
        }

        /* ===== DOCUMENTS GRID ===== */
        .docs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        /* ===== DOCUMENT CARD ===== */
        .doc-card {
            display: flex;
            gap: 16px;
            padding: 20px;
            border-radius: 16px;
            background: #ffffff;
            border: 2px solid transparent;
            box-shadow: 0 4px 20px rgba(91, 75, 138, 0.08);
            text-decoration: none;
            color: inherit;
            transition: all .3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .doc-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-purple), var(--accent-purple));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .3s ease;
        }

        .doc-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 40px rgba(91, 75, 138, 0.2);
            border-color: var(--light-purple);
        }

        .doc-card:hover::before {
            transform: scaleX(1);
        }

        /* ===== ICON ===== */
        .doc-icon-wrap {
            flex-shrink: 0;
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f5f3ff 0%, #ede9fe 100%);
            border-radius: 12px;
            transition: transform .3s ease;
        }

        .doc-card:hover .doc-icon-wrap {
            transform: scale(1.1) rotate(5deg);
        }

        .doc-icon-wrap img {
            width: 40px;
            height: 40px;
            object-fit: contain;
            filter: drop-shadow(0 2px 4px rgba(91, 75, 138, 0.2));
        }

        /* ===== TEXT ===== */
        .doc-info {
            display: flex;
            flex-direction: column;
            flex: 1;
            min-width: 0;
        }

        .doc-title {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 6px;
            color: var(--deep-blue);
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .doc-desc {
            font-size: 14px;
            color: #666;
            margin-bottom: 8px;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .doc-meta {
            font-size: 12px;
            font-weight: 600;
            color: var(--accent-purple);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: auto;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 36px;
            }

            .page-title {
                font-size: 32px;
            }

            .docs-section-title {
                font-size: 26px;
            }

            .docs-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ===== SMOOTH SCROLL ===== */
        html {
            scroll-behavior: smooth;
        }
    </style>
@endpush


@section('content')

    <section class="about-hero">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>{{ __('docs.hero_title') }}</h1>
        </div>
    </section>

    <section class="project-docs container">

        <h2 class="page-title">{{ __('docs.main_title') }}</h2>
        <p class="page-subtitle">{{ __('docs.subtitle') }}</p>

        @foreach($grouped as $groupKey => $periods)

            <h3 class="docs-section-title">
                {{ \App\Models\Document::groups()[$groupKey] ?? $groupKey }}
            </h3>

            @foreach($periods as $periodKey => $docs)

                @if($periodKey)
                    <h4 class="docs-subtitle">
                        {{ \App\Models\Document::periods()[$periodKey] ?? $periodKey }}
                    </h4>
                @endif

                <div class="docs-grid">
                    @foreach($docs as $doc)

                        @php
                            $ext = strtolower(pathinfo($doc->file_path, PATHINFO_EXTENSION));
                            $icon = match($ext) {
                                'pdf' => 'pdf.png',
                                'doc', 'docx' => 'doc.png',
                                'xls', 'xlsx' => 'xls.png',
                                'ppt', 'pptx' => 'ppt.png',
                                default => 'file.png',
                            };
                        @endphp

                        <a href="{{ asset('storage/' . $doc->file_path) }}"
                           target="_blank"
                           class="doc-card">

                            <div class="doc-icon-wrap">
                                <img src="{{ asset('assets/icons/' . $icon) }}"
                                     alt="{{ $doc->title }}">
                            </div>

                            <div class="doc-info">
                                <div class="doc-title">{{ $doc->title }}</div>

                                @if($doc->description)
                                    <div class="doc-desc">{{ $doc->description }}</div>
                                @endif

                                <div class="doc-meta">
                                    {{ strtoupper($ext) }}
                                    @if($doc->published_at)
                                        • {{ $doc->published_at->format('Y') }}
                                    @endif
                                </div>
                            </div>

                        </a>

                    @endforeach
                </div>

            @endforeach

        @endforeach

    </section>

@endsection
