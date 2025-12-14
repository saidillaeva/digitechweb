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
            content: '📄';
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

        /* Required Asterisk */
        .form-label:has(+ input[required])::before,
        .form-label:has(+ select[required])::before {
            content: '*';
            color: var(--accent-purple);
            font-weight: 700;
            margin-right: 4px;
        }

        /* Form Inputs & Textareas */
        .form-control,
        .form-select {
            border: 2px solid rgba(139, 122, 184, 0.3);
            border-radius: 12px;
            padding: 0.85rem 1.25rem;
            transition: all .3s ease;
            font-size: 1rem;
            background: white;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--accent-purple);
            box-shadow: 0 0 0 4px rgba(139, 122, 184, 0.15);
            outline: none;
            background: white;
        }

        .form-control:hover:not(:focus),
        .form-select:hover:not(:focus) {
            border-color: rgba(139, 122, 184, 0.5);
        }

        /* Select Dropdown */
        .form-select {
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%235B4B8A' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px 12px;
            padding-right: 3rem;
        }

        /* Textarea */
        textarea.form-control {
            resize: vertical;
            min-height: 100px;
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

        /* Field Hints */
        .field-hint {
            font-size: 0.85rem;
            color: var(--accent-purple);
            margin-top: 0.5rem;
            font-style: italic;
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

        /* Upload Button */
        .btn-upload {
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

        .btn-upload:hover {
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

        /* File Type Icons */
        .file-types {
            display: flex;
            gap: 1rem;
            margin-top: 0.75rem;
            flex-wrap: wrap;
        }

        .file-type-badge {
            background: linear-gradient(135deg, rgba(91, 75, 138, 0.1), rgba(139, 122, 184, 0.15));
            color: var(--deep-blue);
            padding: 0.35rem 0.85rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            border: 1px solid rgba(139, 122, 184, 0.3);
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

            .btn-upload,
            .btn-cancel {
                width: 100%;
            }

            .d-flex.gap-2 {
                flex-direction: column;
            }
        }
    </style>

    <div class="page-header-create">
        <h4>Upload Document</h4>
    </div>

    <form method="POST" action="{{ route('admin.documents.store') }}" enctype="multipart/form-data" class="card border-0 shadow-sm form-card">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter document title" required>
            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Group</label>
            <select class="form-select" name="doc_group" required>
                <option value="">— Select a group —</option>
                @foreach($groups as $k => $v)
                    <option value="{{ $k }}" @selected(old('doc_group')===$k)>{{ $v }}</option>
                @endforeach
            </select>
            <div class="field-hint">Categorize this document by group</div>
            @error('doc_group')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Period</label>
            <select class="form-select" name="period">
                <option value="">— None —</option>
                @foreach($periods as $k => $v)
                    <option value="{{ $k }}" @selected(old('period')===$k)>{{ $v }}</option>
                @endforeach
            </select>
            <div class="field-hint">Optional: Assign a time period</div>
            @error('period')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Published Date</label>
            <input class="form-control" type="date" name="published_at" value="{{ old('published_at') }}">
            <div class="field-hint">Leave empty to use current date</div>
            @error('published_at')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3" placeholder="Brief description of the document (optional)">{{ old('description') }}</textarea>
            <div class="field-hint">Provide additional context about this document</div>
            @error('description')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">File</label>
            <input class="form-control" type="file" name="file" required>
            <div class="file-types">
                <span class="file-type-badge">PDF</span>
                <span class="file-type-badge">DOC/DOCX</span>
                <span class="file-type-badge">XLS/XLSX</span>
                <span class="file-type-badge">PPT/PPTX</span>
            </div>
            @error('file')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-upload">📤 Upload Document</button>
            <a class="btn btn-cancel" href="{{ route('admin.documents.index') }}">✕ Cancel</a>
        </div>
    </form>
@endsection
