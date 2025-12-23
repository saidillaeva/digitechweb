@extends('admin.layout')

@section('content')
    <style>
        .luxury-form-wrapper {
            max-width: 920px;
            margin: 0 auto;
            padding: 2.5rem 1rem;
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #312e81 100%);
            min-height: 100vh;
        }

        .luxury-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 24px;
            box-shadow:
                0 20px 60px rgba(79, 70, 229, 0.3),
                0 0 0 1px rgba(139, 92, 246, 0.1);
            padding: 3.5rem;
            border: none;
            backdrop-filter: blur(10px);
        }

        .luxury-page-title {
            font-size: 2.25rem;
            font-weight: 700;
            background: linear-gradient(135deg, #1e40af 0%, #7c3aed 50%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 2.5rem;
            letter-spacing: -0.03em;
            text-align: center;
        }

        .luxury-section-header {
            font-size: 0.8125rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #7c3aed;
            margin-bottom: 1.75rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid rgba(124, 58, 237, 0.2);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .luxury-section-header::before {
            content: '';
            width: 4px;
            height: 20px;
            background: linear-gradient(180deg, #7c3aed 0%, #a855f7 100%);
            border-radius: 2px;
        }

        .luxury-divider {
            height: 2px;
            background: linear-gradient(90deg,
            transparent 0%,
            rgba(124, 58, 237, 0.3) 20%,
            rgba(168, 85, 247, 0.3) 80%,
            transparent 100%);
            margin: 3rem 0;
            border: none;
        }

        .luxury-field-group {
            margin-bottom: 1.75rem;
        }

        .luxury-label {
            font-size: 0.9375rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.625rem;
            display: flex;
            align-items: center;
            gap: 0.625rem;
        }

        .luxury-lang-badge {
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
            box-shadow: 0 2px 8px rgba(124, 58, 237, 0.25);
        }

        .luxury-input,
        .luxury-textarea,
        .luxury-select {
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

        .luxury-input:hover,
        .luxury-textarea:hover,
        .luxury-select:hover {
            border-color: #cbd5e1;
        }

        .luxury-input:focus,
        .luxury-textarea:focus,
        .luxury-select:focus {
            outline: none;
            border-color: #7c3aed;
            box-shadow:
                0 0 0 4px rgba(124, 58, 237, 0.1),
                0 4px 12px rgba(124, 58, 237, 0.15);
            transform: translateY(-1px);
        }

        .luxury-textarea {
            resize: vertical;
            min-height: 120px;
            line-height: 1.6;
        }

        .luxury-select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg width='12' height='8' viewBox='0 0 12 8' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1.5L6 6.5L11 1.5' stroke='%237c3aed' stroke-width='2' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 3rem;
        }

        .luxury-file-display {
            padding: 1.5rem;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .luxury-file-display:hover {
            border-color: #7c3aed;
            background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);
        }

        .luxury-file-link {
            color: #7c3aed;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.625rem;
            transition: all 0.3s ease;
        }

        .luxury-file-link:hover {
            color: #6d28d9;
            gap: 0.875rem;
        }

        .luxury-file-link svg {
            transition: transform 0.3s ease;
        }

        .luxury-file-link:hover svg {
            transform: scale(1.1);
        }

        .luxury-file-input {
            width: 100%;
            padding: 1rem 1.25rem;
            font-size: 1rem;
            color: #1e293b;
            background: #ffffff;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .luxury-file-input:hover {
            border-color: #7c3aed;
            background: #faf5ff;
        }

        .luxury-file-input:focus {
            outline: none;
            border-color: #7c3aed;
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.1);
        }

        .luxury-actions {
            display: flex;
            gap: 1rem;
            margin-top: 3rem;
            padding-top: 2.5rem;
            border-top: 2px solid rgba(124, 58, 237, 0.1);
        }

        .luxury-btn-primary {
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
        }

        .luxury-btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .luxury-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow:
                0 8px 24px rgba(124, 58, 237, 0.5),
                0 4px 8px rgba(30, 64, 175, 0.3);
        }

        .luxury-btn-primary:hover::before {
            left: 100%;
        }

        .luxury-btn-primary:active {
            transform: translateY(0);
        }

        .luxury-btn-secondary {
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
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .luxury-btn-secondary:hover {
            background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);
            border-color: #6d28d9;
            color: #6d28d9;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.2);
        }

        @media (max-width: 768px) {
            .luxury-form-wrapper {
                padding: 1.5rem 1rem;
            }

            .luxury-card {
                padding: 2rem 1.5rem;
                border-radius: 20px;
            }

            .luxury-page-title {
                font-size: 1.75rem;
            }

            .luxury-actions {
                flex-direction: column;
            }

            .luxury-btn-primary,
            .luxury-btn-secondary {
                width: 100%;
            }
        }

        /* Animated gradient background */
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .luxury-form-wrapper {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 25%, #312e81 50%, #1e1b4b 75%, #0f172a 100%);
            background-size: 200% 200%;
            animation: gradientShift 15s ease infinite;
        }
    </style>

    <div class="luxury-form-wrapper">
        <div class="luxury-card">

            <h4 class="luxury-page-title">
                {{ __('admin_documents.edit.title') }}
            </h4>

            <form method="POST"
                  action="{{ route('admin.documents.update', $document) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- ===== TITLES ===== --}}
                <div class="luxury-section-header">
                    {{ __('admin_documents.sections.titles') }}
                </div>

                @foreach(['ru','en','kg','de'] as $lang)
                    <div class="luxury-field-group">
                        <label class="luxury-label">
                            {{ __('admin_documents.fields.title') }}
                            <span class="luxury-lang-badge">{{ strtoupper($lang) }}</span>
                        </label>
                        <input class="luxury-input"
                               name="title_{{ $lang }}"
                               value="{{ old('title_'.$lang, $document->{'title_'.$lang}) }}"
                               @if($lang === 'ru') required @endif>
                    </div>
                @endforeach

                <hr class="luxury-divider">

                {{-- ===== DESCRIPTIONS ===== --}}
                <div class="luxury-section-header">
                    {{ __('admin_documents.sections.descriptions') }}
                </div>

                @foreach(['ru','en','kg','de'] as $lang)
                    <div class="luxury-field-group">
                        <label class="luxury-label">
                            {{ __('admin_documents.fields.description') }}
                            <span class="luxury-lang-badge">{{ strtoupper($lang) }}</span>
                        </label>
                        <textarea class="luxury-textarea"
                                  name="description_{{ $lang }}">{{ old('description_'.$lang, $document->{'description_'.$lang}) }}</textarea>
                    </div>
                @endforeach

                <hr class="luxury-divider">

                {{-- ===== METADATA ===== --}}
                <div class="luxury-section-header">
                    {{ __('admin_documents.sections.metadata') }}
                </div>

                <div class="luxury-field-group">
                    <label class="luxury-label">
                        {{ __('admin_documents.fields.group') }}
                    </label>
                    <select name="doc_group" class="luxury-select" required>
                        @foreach($groups as $k => $v)
                            <option value="{{ $k }}"
                                {{ old('doc_group', $document->doc_group) == $k ? 'selected' : '' }}>
                                {{ __($v) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="luxury-field-group">
                    <label class="luxury-label">
                        {{ __('admin_documents.fields.period') }}
                    </label>
                    <select class="luxury-select" name="period">
                        <option value="">
                            — {{ __('common.none') }} —
                        </option>
                        @foreach($periods as $k => $v)
                            <option value="{{ $k }}"
                                {{ old('period', $document->period) == $k ? 'selected' : '' }}>
                                {{ __($v) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="luxury-field-group">
                    <label class="luxury-label">
                        {{ __('admin_documents.fields.published_at') }}
                    </label>
                    <input type="date"
                           name="published_at"
                           class="luxury-input"
                           value="{{ old('published_at', optional($document->published_at)->format('Y-m-d')) }}">
                </div>

                <hr class="luxury-divider">

                {{-- ===== FILE ===== --}}
                <div class="luxury-section-header">
                    {{ __('admin_documents.sections.file') }}
                </div>

                <div class="luxury-field-group">
                    <label class="luxury-label">
                        {{ __('admin_documents.fields.current_file') }}
                    </label>
                    <div class="luxury-file-display">
                        <a href="{{ asset('storage/'.$document->file_path) }}"
                           target="_blank"
                           class="luxury-file-link">
                            {{ __('admin_documents.actions.view_file') }}
                        </a>
                    </div>
                </div>

                <div class="luxury-field-group">
                    <label class="luxury-label">
                        {{ __('admin_documents.fields.replace_file') }}
                    </label>
                    <input type="file" name="file" class="luxury-file-input">
                </div>

                {{-- ===== ACTIONS ===== --}}
                <div class="luxury-actions">
                    <button type="submit" class="luxury-btn-primary">
                        {{ __('admin_documents.actions.update') }}
                    </button>
                    <a href="{{ route('admin.documents.index') }}"
                       class="luxury-btn-secondary">
                        {{ __('common.cancel') }}
                    </a>
                </div>

            </form>
        </div>
    </div>
@endsection
