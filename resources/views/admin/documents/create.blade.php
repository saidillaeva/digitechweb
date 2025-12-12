@extends('admin.layout')

@section('content')
    <h4 class="mb-3">Upload Document</h4>

    <form method="POST" action="{{ route('admin.documents.store') }}" enctype="multipart/form-data" class="card border-0 shadow-sm p-3">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title *</label>
            <input class="form-control" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Group *</label>
            <select class="form-select" name="doc_group" required>
                @foreach($groups as $k => $v)
                    <option value="{{ $k }}" @selected(old('doc_group')===$k)>{{ $v }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Period (optional)</label>
            <select class="form-select" name="period">
                <option value="">— none —</option>
                @foreach($periods as $k => $v)
                    <option value="{{ $k }}" @selected(old('period')===$k)>{{ $v }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Published date</label>
            <input class="form-control" type="date" name="published_at" value="{{ old('published_at') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">File *</label>
            <input class="form-control" type="file" name="file" required>
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-dark">Upload</button>
            <a class="btn btn-outline-secondary" href="{{ route('admin.documents.index') }}">Cancel</a>
        </div>
    </form>
@endsection
