@extends('admin.layout')

@section('content')
    <style>
        /* Page Header */
        .page-header-create {
            background: linear-gradient(135deg, var(--deep-blue), var(--dark-purple));
            padding: 2.5rem;
            border-radius: 18px;
            margin-bottom: 2.5rem;
            box-shadow: 0 8px 30px rgba(91, 75, 138, 0.3);
            position: relative;
            overflow: hidden;
        }

        .page-header-create::before {
            content: '📰';
            position: absolute;
            right: 2rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 5rem;
            opacity: 0.15;
        }

        .page-header-create h4 {
            font-size: 2rem;
            font-weight: 700;
            color: white;
            margin: 0;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 1;
        }

        /* Form Card */
        .form-card {
            border: 2px solid rgba(139, 122, 184, 0.2) !important;
            border-radius: 20px !important;
            padding: 2.5rem !important;
            background: white;
            box-shadow: 0 8px 30px rgba(91, 75, 138, 0.15) !important;
            position: relative;
        }

        .form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-purple), var(--accent-purple), var(--primary-purple));
            border-radius: 20px 20px 0 0;
        }

        /* Form Groups */
        .mb-3 {
            margin-bottom: 1.75rem !important;
        }

        /* Form Labels */
        .form-label {
            font-weight: 700;
            color: var(--deep-blue);
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
            display: block;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-label::after {
            content: '';
            display: inline-block;
            width: 30px;
            height: 2px;
            background: linear-gradient(90deg, var(--accent-purple), transparent);
            margin-left: 10px;
            vertical-align: middle;
        }

        /* Form Inputs & Textareas */
        .form-control {
            border: 2px solid rgba(139, 122, 184, 0.3);
            border-radius: 12px;
            padding: 0.85rem 1.25rem;
            transition: all .3s ease;
            font-size: 1rem;
            background: white;
        }

        .form-control:focus {
            border-color: var(--accent-purple);
            box-shadow: 0 0 0 4px rgba(139, 122, 184, 0.15);
            outline: none;
            background: white;
        }

        .form-control:hover:not(:focus) {
            border-color: rgba(139, 122, 184, 0.5);
        }

        /* Textarea specific */
        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        /* File Input */
        input[type="file"].form-control {
            padding: 0.75rem 1rem;
            cursor: pointer;
        }

        input[type="file"].form-control::file-selector-button {
            background: linear-gradient(135deg, var(--primary-purple), var(--accent-purple));
            color: white;
            border: none;
            padding: 0.5rem 1.25rem;
            border-radius: 8px;
            font-weight: 600;
            margin-right: 1rem;
            cursor: pointer;
            transition: all .3s ease;
        }

        input[type="file"].form-control::file-selector-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(91, 75, 138, 0.3);
        }

        /* Date Input */
        input[type="date"].form-control {
            cursor: pointer;
        }

        /* Error Messages */
        .text-danger {
            color: #dc2626 !important;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .text-danger::before {
            content: '⚠';
            font-size: 1rem;
        }

        /* Button Container */
        .d-flex.gap-2 {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid rgba(139, 122, 184, 0.1);
        }

        /* Save Button */
        .btn-save {
            background: linear-gradient(135deg, var(--primary-purple), var(--accent-purple)) !important;
            border: none !important;
            color: white !important;
            font-weight: 600;
            padding: 0.85rem 2.5rem;
            border-radius: 12px;
            transition: all .3s ease;
            box-shadow: 0 4px 20px rgba(91, 75, 138, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.95rem;
        }

        .btn-save:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(91, 75, 138, 0.4);
        }

        /* Cancel Button */
        .btn-cancel {
            border: 2px solid var(--primary-purple) !important;
            color: var(--primary-purple) !important;
            background: white !important;
            font-weight: 600;
            padding: 0.85rem 2.5rem;
            border-radius: 12px;
            transition: all .3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.95rem;
        }

        .btn-cancel:hover {
            background: linear-gradient(135deg, rgba(91, 75, 138, 0.1), rgba(139, 122, 184, 0.15)) !important;
            border-color: var(--accent-purple) !important;
            transform: translateY(-2px);
        }

        /* Field Hints */
        .field-hint {
            font-size: 0.85rem;
            color: var(--accent-purple);
            margin-top: 0.5rem;
            font-style: italic;
        }

        /* Required Asterisk */
        .form-label:has(+ input[required])::before,
        .form-label:has(+ textarea[required])::before {
            content: '*';
            color: var(--accent-purple);
            font-weight: 700;
            margin-right: 4px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header-create {
                padding: 1.5rem;
            }

            .page-header-create h4 {
                font-size: 1.5rem;
            }

            .form-card {
                padding: 1.5rem !important;
            }

            .btn-save,
            .btn-cancel {
                width: 100%;
            }

            .d-flex.gap-2 {
                flex-direction: column;
            }
        }
    </style>

    <div class="page-header-create">
        <h4>Create News</h4>
    </div>

    <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data" class="card border-0 shadow-sm form-card">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter news title" required>
            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Published Date</label>
            <input class="form-control" type="date" name="published_at" value="{{ old('published_at') }}">
            <div class="field-hint">Leave empty to use current date</div>
            @error('published_at')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input class="form-control" type="file" name="image" accept="image/*">
            <div class="field-hint">Supported formats: JPG, PNG, GIF (Max 2MB)</div>
            @error('image')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Excerpt</label>
            <textarea class="form-control" name="excerpt" rows="3" placeholder="Brief summary of the news (optional)">{{ old('excerpt') }}</textarea>
            <div class="field-hint">Short description shown in previews</div>
            @error('excerpt')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea class="form-control" name="content" rows="10" placeholder="Full news content" required>{{ old('content') }}</textarea>
            @error('content')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-save"> Save News</button>
            <a class="btn btn-cancel" href="{{ route('admin.news.index') }}">✕ Cancel</a>
        </div>
    </form>
@endsection
