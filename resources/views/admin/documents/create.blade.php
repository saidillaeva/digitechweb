@extends('admin.layout')

@section('content')
    <style>
        .upload-wrapper {
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

        .upload-card {
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

        .upload-page-header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .upload-page-header::before {
            content: '📄';
            font-size: 3rem;
            display: block;
            margin-bottom: 1rem;
            animation: floatIcon 3s ease-in-out infinite;
        }

        @keyframes floatIcon {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .upload-page-header h4 {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #1e40af 0%, #7c3aed 50%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.03em;
            margin: 0;
        }

        .upload-section-title {
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

        .upload-section-title::before {
            content: '';
            width: 4px;
            height: 20px;
            background: linear-gradient(180deg, #7c3aed 0%, #a855f7 100%);
            border-radius: 2px;
        }

        .upload-divider {
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

        .upload-divider::after {
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

        .upload-field-group {
            margin-bottom: 1.75rem;
        }

        .upload-label {
            font-size: 0.9375rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.625rem;
            display: flex;
            align-items: center;
            gap: 0.625rem;
        }

        .upload-lang-badge {
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

        .upload-input,
        .upload-textarea,
        .upload-select {
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

        .upload-input:hover,
        .upload-textarea:hover,
        .upload-select:hover {
            border-color: #cbd5e1;
        }

        .upload-input:focus,
        .upload-textarea:focus,
        .upload-select:focus {
            outline: none;
            border-color: #7c3aed;
            box-shadow:
                0 0 0 4px rgba(124, 58, 237, 0.12),
                0 4px 12px rgba(124, 58, 237, 0.2);
            transform: translateY(-1px);
        }

        .upload-textarea {
            resize: vertical;
            min-height: 120px;
            line-height: 1.6;
        }

        .upload-select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg width='12' height='8' viewBox='0 0 12 8' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1.5L6 6.5L11 1.5' stroke='%237c3aed' stroke-width='2' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 3rem;
        }

        .upload-file-input {
            width: 100%;
            padding: 1.5rem;
            font-size: 1rem;
            color: #64748b;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            position: relative;
        }

        .upload-file-input:hover {
            border-color: #7c3aed;
            background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);
            color: #7c3aed;
        }

        .upload-file-input:focus {
            outline: none;
            border-color: #7c3aed;
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.12);
        }

        .upload-error {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        .upload-error::before {
            content: '⚠';
            font-size: 1rem;
        }

        .upload-actions {
            display: flex;
            gap: 1rem;
            margin-top: 3rem;
            padding-top: 2.5rem;
            border-top: 2px solid rgba(124, 58, 237, 0.1);
        }

        .upload-btn-primary {
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

        .upload-btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .upload-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow:
                0 8px 24px rgba(124, 58, 237, 0.5),
                0 4px 8px rgba(30, 64, 175, 0.3);
        }

        .upload-btn-primary:hover::before {
            left: 100%;
        }

        .upload-btn-primary:active {
            transform: translateY(0);
        }

        .upload-btn-secondary {
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

        .upload-btn-secondary:hover {
            background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);
            border-color: #6d28d9;
            color: #6d28d9;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.2);
        }

        @media (max-width: 768px) {
            .upload-wrapper {
                padding: 1.5rem 1rem;
            }

            .upload-card {
                padding: 2rem 1.5rem;
                border-radius: 20px;
            }

            .upload-page-header h4 {
                font-size: 2rem;
            }

            .upload-actions {
                flex-direction: column;
            }

            .upload-btn-primary,
            .upload-btn-secondary {
                width: 100%;
            }
        }
    </style>

    <div class="upload-wrapper">
        <div class="upload-card">

            <div class="upload-page-header">
                <h4>{{ __('admin_documents.create.title') }}</h4>
            </div>

            <form method="POST"
                  action="{{ route('admin.documents.store') }}"
                  enctype="multipart/form-data">
                @csrf

                {{-- ===== TITLES ===== --}}
                <div class="upload-section-title">
                    {{ __('admin_documents.sections.titles') }}
                </div>

                @foreach(['ru','en','kg','de'] as $lang)
                    <div class="upload-field-group">
                        <label class="upload-label">
                            {{ __('admin_documents.fields.title') }}
                            <span class="upload-lang-badge">{{ strtoupper($lang) }}</span>
                        </label>
                        <input class="upload-input"
                               name="title_{{ $lang }}"
                               value="{{ old('title_'.$lang) }}"
                               @if($lang === 'ru') required @endif
                               placeholder="{{ __('admin_documents.placeholders.title_'.$lang) }}">
                    </div>
                @endforeach

                <hr class="upload-divider">

                {{-- ===== DESCRIPTIONS ===== --}}
                <div class="upload-section-title">
                    {{ __('admin_documents.sections.descriptions') }}
                </div>

                @foreach(['ru','en','kg','de'] as $lang)
                    <div class="upload-field-group">
                        <label class="upload-label">
                            {{ __('admin_documents.fields.description') }}
                            <span class="upload-lang-badge">{{ strtoupper($lang) }}</span>
                        </label>
                        <textarea class="upload-textarea"
                                  name="description_{{ $lang }}"
                                  placeholder="{{ __('admin_documents.placeholders.description_'.$lang) }}">{{ old('description_'.$lang) }}</textarea>
                    </div>
                @endforeach

                <hr class="upload-divider">

                {{-- ===== METADATA ===== --}}
                <div class="upload-section-title">
                    {{ __('admin_documents.sections.metadata') }}
                </div>

                <div class="upload-field-group">
                    <label class="upload-label">
                        {{ __('admin_documents.fields.group') }}
                    </label>
                    <select class="upload-select" name="doc_group" required>
                        <option value="">
                            — {{ __('common.select_group') }} —
                        </option>
                        @foreach($groups as $k => $v)
                            <option value="{{ $k }}"
                                {{ old('doc_group') == $k ? 'selected' : '' }}>
                                {{ __($v) }}
                            </option>
                        @endforeach
                    </select>
                    @error('doc_group')
                    <div class="upload-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="upload-field-group">
                    <label class="upload-label">
                        {{ __('admin_documents.fields.period') }}
                    </label>
                    <select class="upload-select" name="period">
                        <option value="">
                            — {{ __('common.none') }} —
                        </option>
                        @foreach($periods as $k => $v)
                            <option value="{{ $k }}"
                                {{ old('period') == $k ? 'selected' : '' }}>
                                {{ __($v) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="upload-field-group">
                    <label class="upload-label">
                        {{ __('admin_documents.fields.published_at') }}
                    </label>
                    <input class="upload-input"
                           type="date"
                           name="published_at"
                           value="{{ old('published_at') }}">
                </div>

                <hr class="upload-divider">

                {{-- ===== FILE ===== --}}
                <div class="upload-section-title">
                    {{ __('admin_documents.sections.file') }}
                </div>

                <div class="upload-field-group">
                    <label class="upload-label">
                        {{ __('admin_documents.fields.file') }}
                    </label>
                    <input class="upload-file-input"
                           type="file"
                           name="file"
                           required>
                    @error('file')
                    <div class="upload-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- ===== ACTIONS ===== --}}
                <div class="upload-actions">
                    <button type="submit" class="upload-btn-primary">
                        📤 {{ __('admin_documents.actions.upload') }}
                    </button>
                    <a href="{{ route('admin.documents.index') }}"
                       class="upload-btn-secondary">
                        ✕ {{ __('common.cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
