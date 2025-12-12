@extends('admin.layout')

@section('content')
    <h4 class="mb-3">Create News</h4>

    <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data" class="card border-0 shadow-sm p-3">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title *</label>
            <input class="form-control" name="title" value="{{ old('title') }}" required>
            @error('title')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Published date</label>
            <input class="form-control" type="date" name="published_at" value="{{ old('published_at') }}">
            @error('published_at')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input class="form-control" type="file" name="image" accept="image/*">
            @error('image')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Excerpt</label>
            <textarea class="form-control" name="excerpt" rows="2">{{ old('excerpt') }}</textarea>
            @error('excerpt')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Content *</label>
            <textarea class="form-control" name="content" rows="7" required>{{ old('content') }}</textarea>
            @error('content')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-dark">Save</button>
            <a class="btn btn-outline-secondary" href="{{ route('admin.news.index') }}">Cancel</a>
        </div>
    </form>
@endsection
