@extends('admin.layout')

@section('content')
    <style>
        :root {
            --deep-blue: #1e40af;
            --dark-blue: #1e3a8a;
            --primary-purple: #7c3aed;
            --accent-purple: #a855f7;
            --dark-purple: #6d28d9;
        }

        .news-edit-wrapper {
            max-width: 920px;
            margin: 0 auto;
            padding: 2.5rem 1rem;
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 25%, #4c1d95 50%, #1e1b4b 75%, #0f172a 100%);
            background-size: 200% 200%;
            animation: gradientFlow 15s ease infinite;
            min-height: 100vh;
        }

        @keyframes gradientFlow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .news-edit-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 24px;
            box-shadow:
                0 25px 70px rgba(79, 70, 229, 0.35),
                0 0 0 1px rgba(139, 92, 246, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            padding: 3.5rem;
            border: none;
            backdrop-filter: blur(10px);
        }

        .news-edit-page-header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .news-edit-page-header::before {
            content: '✏️';
            font-size: 3rem;
            display: block;
            margin-bottom: 1rem;
            animation: floatIcon 3s ease-in-out infinite;
        }

        @keyframes floatIcon {
            0%, 100% { transform: translateY(0) rotate(-5deg); }
            50% { transform: translateY(-10px) rotate(5deg); }
        }

        .news-edit-page-header h4 {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #1e40af 0%, #7c3aed 50%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.03em;
            margin: 0;
        }

        .news-edit-section-title {
            font-size: 1.125rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1.75rem;
            margin-top: 3rem;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid transparent;
            border-image: linear-gradient(90deg, #7c3aed 0%, #a855f7 50%, transparent 100%);
            border-image-slice: 1;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .news-edit-section-title::before {
            content: '';
            width: 4px;
            height: 24px;
            background: linear-gradient(180deg, #7c3aed 0%, #a855f7 100%);
            border-radius: 2px;
        }

        .news-edit-section-title:first-of-type {
            margin-top: 0;
        }

        .news-edit-divider {
            height: 2px;
            background: linear-gradient(90deg,
            transparent 0%,
            rgba(124, 58, 237, 0.3) 20%,
            rgba(168, 85, 247, 0.4) 50%,
            rgba(124, 58, 237, 0.3) 80%,
            transparent 100%);
            margin: 3rem 0;
            border: none;
            position: relative;
        }

        .news-edit-divider::after {
            content: '✦';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            color: #a855f7;
            font-size: 1rem;
            padding: 0 1rem;
        }

        .news-edit-field-group {
            margin-bottom: 1.75rem;
        }

        .news-edit-label {
            font-size: 0.9375rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.625rem;
            display: flex;
            align-items: center;
            gap: 0.625rem;
        }

        .news-edit-lang-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.25rem 0.625rem;
            background: linear-gradient(135deg, #1e40af 0%, #7c3aed 100%);
            color: #ffffff;
            border-radius: 6px;
            font-size: 0.6875rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            box-shadow: 0 2px 8px rgba(124, 58, 237, 0.3);
        }

        .news-edit-input,
        .news-edit-textarea,
        .news-edit-file-input,
        .news-edit-date-input {
            width: 100%;
            padding: 1rem 1.25rem;
            font-size: 1rem;
            color: #1e293b;
            background: #ffffff;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: inherit;
        }

        .news-edit-input:hover,
        .news-edit-textarea:hover,
        .news-edit-file-input:hover,
        .news-edit-date-input:hover {
            border-color: #cbd5e1;
        }

        .news-edit-input:focus,
        .news-edit-textarea:focus,
        .news-edit-file-input:focus,
        .news-edit-date-input:focus {
            outline: none;
            border-color: #7c3aed;
            box-shadow:
                0 0 0 4px rgba(124, 58, 237, 0.12),
                0 4px 12px rgba(124, 58, 237, 0.2);
            transform: translateY(-1px);
        }

        .news-edit-textarea {
            resize: vertical;
            line-height: 1.6;
        }

        .news-edit-textarea[rows="3"] {
            min-height: 90px;
        }

        .news-edit-textarea[rows="8"] {
            min-height: 200px;
        }

        .news-edit-image-preview {
            margin-bottom: 1rem;
            padding: 1rem;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: 2px solid rgba(139, 92, 246, 0.15);
            border-radius: 12px;
            display: inline-block;
        }

        .news-edit-image-preview img {
            max-width: 200px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.2);
            display: block;
            transition: transform 0.3s ease;
        }

        .news-edit-image-preview img:hover {
            transform: scale(1.05);
        }

        .news-edit-file-input {
            padding: 1.5rem;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: 2px dashed #cbd5e1;
            cursor: pointer;
            text-align: center;
        }

        .news-edit-file-input:hover {
            border-color: #7c3aed;
            background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);
        }

        .news-edit-field-hint {
            margin-top: 0.5rem;
            font-size: 0.8125rem;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        .news-edit-field-hint::before {
            content: 'ℹ️';
            font-size: 0.875rem;
        }

        .news-edit-date-input {
            cursor: pointer;
        }

        .news-edit-actions {
            display: flex;
            gap: 1rem;
            margin-top: 3rem;
            padding-top: 2.5rem;
            border-top: 2px solid rgba(124, 58, 237, 0.1);
        }

        .news-edit-btn-update {
            flex: 1;
            padding: 1.125rem 2.5rem;
            font-size: 1rem;
            font-weight: 700;
            color: #ffffff;
            background: linear-gradient(135deg, #1e40af 0%, #7c3aed 50%, #a855f7 100%);
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow:
                0 4px 16px rgba(124, 58, 237, 0.4),
                0 2px 4px rgba(30, 64, 175, 0.2);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.625rem;
        }

        .news-edit-btn-update::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .news-edit-btn-update:hover {
            transform: translateY(-2px);
            box-shadow:
                0 8px 24px rgba(124, 58, 237, 0.5),
                0 4px 8px rgba(30, 64, 175, 0.3);
        }

        .news-edit-btn-update:hover::before {
            left: 100%;
        }

        .news-edit-btn-update:active {
            transform: translateY(0);
        }

        .news-edit-btn-cancel {
            padding: 1.125rem 2.5rem;
            font-size: 1rem;
            font-weight: 600;
            color: #7c3aed;
            background: #ffffff;
            border: 2px solid #7c3aed;
            border-radius: 12px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.625rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .news-edit-btn-cancel:hover {
            background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);
            border-color: #6d28d9;
            color: #6d28d9;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.2);
        }

        @media (max-width: 768px) {
            .news-edit-wrapper {
                padding: 1.5rem 1rem;
            }

            .news-edit-card {
                padding: 2rem 1.5rem;
                border-radius: 20px;
            }

            .news-edit-page-header h4 {
                font-size: 2rem;
            }

            .news-edit-actions {
                flex-direction: column;
            }

            .news-edit-btn-update,
            .news-edit-btn-cancel {
                width: 100%;
            }
        }
    </style>

    <div class="news-edit-wrapper">
        <div class="news-edit-card">

            <div class="news-edit-page-header">
                <h4>{{ __('admin_news.edit.title') }}</h4>
            </div>

            <form method="POST"
                  action="{{ route('admin.news.update', $news) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- ===== TITLES ===== --}}
                <h5 class="news-edit-section-title">
                    {{ __('admin_news.create.titles') }}
                </h5>

                @foreach(['ru','en','kg','de'] as $lang)
                    <div class="news-edit-field-group">
                        <label class="news-edit-label">
                            {{ __('admin_news.create.label_title') }}
                            <span class="news-edit-lang-badge">{{ strtoupper($lang) }}</span>
                        </label>
                        <input class="news-edit-input"
                               name="title_{{ $lang }}"
                               value="{{ old('title_'.$lang, $news->{'title_'.$lang}) }}"
                               placeholder="{{ __('admin_news.create.ph_title_'.$lang) }}">
                    </div>
                @endforeach

                <hr class="news-edit-divider">

                {{-- ===== METADATA ===== --}}
                <h5 class="news-edit-section-title">
                    {{ __('admin_news.create.metadata') }}
                </h5>

                <div class="news-edit-field-group">
                    <label class="news-edit-label">
                        {{ __('admin_news.create.published_date') }}
                    </label>
                    <input type="date"
                           class="news-edit-date-input"
                           name="published_at"
                           value="{{ optional($news->published_at)->format('Y-m-d') }}">
                </div>

                <div class="news-edit-field-group">
                    <label class="news-edit-label">
                        {{ __('admin_news.create.image') }}
                    </label>

                    @if($news->image_path)
                        <div class="news-edit-image-preview">
                            <img src="{{ asset('storage/'.$news->image_path) }}"
                                 alt="{{ __('admin_news.index.image_alt') }}">
                        </div>
                    @endif

                    <input type="file" class="news-edit-file-input" name="image">
                    <div class="news-edit-field-hint">
                        {{ __('admin_news.edit.keep_image_hint') }}
                    </div>
                </div>

                <hr class="news-edit-divider">

                {{-- ===== EXCERPT ===== --}}
                <h5 class="news-edit-section-title">
                    {{ __('admin_news.create.excerpt_section') }}
                </h5>

                @foreach(['ru','en','kg','de'] as $lang)
                    <textarea class="news-edit-textarea"
                              name="excerpt_{{ $lang }}"
                              rows="3"
                              placeholder="{{ __('admin_news.create.ph_excerpt_'.$lang) }}">{{ old('excerpt_'.$lang, $news->{'excerpt_'.$lang}) }}</textarea>
                @endforeach

                <hr class="news-edit-divider">

                {{-- ===== CONTENT ===== --}}
                <h5 class="news-edit-section-title">
                    {{ __('admin_news.create.content_section') }}
                </h5>

                @foreach(['ru','en','kg','de'] as $lang)
                    <textarea class="news-edit-textarea"
                              name="content_{{ $lang }}"
                              rows="8"
                              placeholder="{{ __('admin_news.create.ph_content_'.$lang) }}">{{ old('content_'.$lang, $news->{'content_'.$lang}) }}</textarea>
                @endforeach

                {{-- ===== BUTTONS ===== --}}
                <div class="news-edit-actions">
                    <button type="submit" class="news-edit-btn-update">
                        💾 {{ __('admin_news.edit.update') }}
                    </button>

                    <a href="{{ route('admin.news.index') }}" class="news-edit-btn-cancel">
                        ✕ {{ __('admin_news.edit.cancel') }}
                    </a>
                </div>

            </form>
        </div>
    </div>
@endsection
