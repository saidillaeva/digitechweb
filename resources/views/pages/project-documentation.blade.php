@extends('layouts.main')

@push('styles')
    <style>
        :root {
            --primary-purple: #5B4B8A;
            --deep-blue: #2D3561;
            --dark-purple: #3D2E5F;
            --accent-purple: #8B7AB8;
            --light-purple: #B8A8D9;
        }

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
        }

        .docs-section-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--deep-blue);
            margin: 60px 0 30px;
            padding-bottom: 16px;
            border-bottom: 3px solid var(--accent-purple);
        }

        .docs-subtitle {
            font-size: 22px;
            font-weight: 600;
            color: var(--primary-purple);
            margin: 40px 0 24px;
        }

        .docs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        .doc-card {
            display: flex;
            gap: 16px;
            padding: 20px;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 4px 20px rgba(91, 75, 138, 0.08);
            text-decoration: none;
            color: inherit;
            transition: .3s;
        }

        .doc-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 40px rgba(91, 75, 138, 0.2);
        }

        .doc-icon-wrap {
            width: 64px;
            height: 64px;
            background: #ede9fe;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .doc-icon-wrap img {
            width: 40px;
            height: 40px;
        }

        .doc-info {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .doc-title {
            font-weight: 600;
            font-size: 16px;
            color: var(--deep-blue);
            margin-bottom: 6px;
        }

        .doc-desc {
            font-size: 14px;
            color: #666;
            margin-bottom: 8px;
        }

        .doc-meta {
            font-size: 12px;
            font-weight: 600;
            color: var(--accent-purple);
            margin-top: auto;
            text-transform: uppercase;
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
                {{ __( \App\Models\Document::groups()[$groupKey] ?? $groupKey ) }}
            </h3>

        @foreach($periods as $periodKey => $docs)

                @if($periodKey)
                    <h4 class="docs-subtitle">
                        {{ __( \App\Models\Document::periods()[$periodKey] ?? $periodKey ) }}

                    </h4>
                @endif

                <div class="docs-grid">
                    @foreach($docs as $doc)

                        @php
                            $lang = app()->getLocale();

                            $title = $doc->{'title_'.$lang} ?? $doc->title_en;
                            $desc  = $doc->{'description_'.$lang} ?? $doc->description_en;

                            $ext = strtolower(pathinfo($doc->file_path, PATHINFO_EXTENSION));
                            $icon = match($ext) {
                                'pdf' => 'pdf.png',
                                'doc', 'docx' => 'doc.png',
                                'xls', 'xlsx' => 'xls.png',
                                'ppt', 'pptx' => 'ppt.png',
                                default => 'file.png',
                            };
                        @endphp

                        <a href="{{ asset('storage/'.$doc->file_path) }}"
                           target="_blank"
                           class="doc-card">

                            <div class="doc-icon-wrap">
                                <img src="{{ asset('assets/icons/'.$icon) }}" alt="{{ $title }}">
                            </div>

                            <div class="doc-info">
                                <div class="doc-title">{{ $title }}</div>

                                @if(!empty($desc))
                                    <div class="doc-desc">{{ $desc }}</div>
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
