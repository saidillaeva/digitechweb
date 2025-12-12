@extends('admin.layout')

@section('content')
    <h4 class="mb-3">Edit News</h4>

    <form method="POST" action="{{ route('admin.news.update',$news) }}" enctype="multipart/form-data" class="card border-0 shadow-sm p-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title *</label>
            <input class="form-control" name="title" value="{{ old('title',$news->title) }}" required>
            @error('title')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Published date</label>
            <input class="form-control" type="date" name="published_at"
                   value="{{ old('published_at', optional($news->published_at)->format('Y-m-d')) }}">
            @error('published_at')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Current image</label><br>
            @if($news->image_path)
                <img src="{{ asset('storage/'.$news->image_path) }}" style="height:80px;border-radius:10px">
            @else
                <span class="text-muted">—</span>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Replace image</label>
            <input class="form-control" type="file" name="image" accept="image/*">
            @error('image')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Excerpt</label>
            <textarea class="form-control" name="excerpt" rows="2">{{ old('excerpt',$news->excerpt) }}</textarea>
            @error('excerpt')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Content *</label>
            <textarea class="form-control" name="content" rows="7" required>{{ old('content',$news->content) }}</textarea>
            @error('content')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-dark">Update</button>
            <a class="btn btn-outline-secondary" href="{{ route('admin.news.index') }}">Back</a>
        </div>
    </form>
@endsection
