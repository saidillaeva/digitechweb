@extends('admin.layout')

@section('content')
    <h4 class="mb-3">Edit Document</h4>

    <form
        method="POST"
        action="{{ route('admin.documents.update', $document) }}"
        enctype="multipart/form-data"
        class="card border-0 shadow-sm p-3"
    >
        @csrf
        @method('PUT')

        {{-- TITLE --}}
        <div class="mb-3">
            <label class="form-label">Title *</label>
            <input
                type="text"
                name="title"
                class="form-control"
                value="{{ old('title', $document->title) }}"
                required
            >
            @error('title')
            <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        {{-- DOCUMENT GROUP --}}
        <div class="mb-3">
            <label class="form-label">Document group *</label>
            <select name="doc_group" class="form-select" required>
                @foreach($groups as $key => $label)
                    <option
                        value="{{ $key }}"
                        @selected(old('doc_group', $document->doc_group) === $key)
                    >
                        {{ $label }}
                    </option>
                @endforeach
            </select>
            @error('doc_group')
            <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        {{-- PERIOD --}}
        <div class="mb-3">
            <label class="form-label">Period (optional)</label>
            <select name="period" class="form-select">
                <option value="">— none —</option>
                @foreach($periods as $key => $label)
                    <option
                        value="{{ $key }}"
                        @selected(old('period', $document->period) === $key)
                    >
                        {{ $label }}
                    </option>
                @endforeach
            </select>
            @error('period')
            <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        {{-- PUBLISHED DATE --}}
        <div class="mb-3">
            <label class="form-label">Published date</label>
            <input
                type="date"
                name="published_at"
                class="form-control"
                value="{{ old('published_at', optional($document->published_at)->format('Y-m-d')) }}"
            >
            @error('published_at')
            <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        {{-- DESCRIPTION --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea
                name="description"
                rows="3"
                class="form-control"
            >{{ old('description', $document->description) }}</textarea>
            @error('description')
            <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        {{-- CURRENT FILE --}}
        <div class="mb-3">
            <label class="form-label">Current file</label>
            <div>
                <a
                    href="{{ asset('storage/' . $document->file_path) }}"
                    target="_blank"
                    class="btn btn-outline-dark btn-sm"
                >
                    View current document
                </a>
            </div>
        </div>

        {{-- REPLACE FILE --}}
        <div class="mb-3">
            <label class="form-label">Replace file (optional)</label>
            <input
                type="file"
                name="file"
                class="form-control"
            >
            <div class="form-text">
                If you upload a new file, the old one will be deleted automatically.
            </div>
            @error('file')
            <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        {{-- ACTIONS --}}
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-dark">
                Update document
            </button>

            <a href="{{ route('admin.documents.index') }}" class="btn btn-outline-secondary">
                Cancel
            </a>
        </div>
    </form>
@endsection
