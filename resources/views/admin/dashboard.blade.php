@extends('admin.layout')

@section('content')
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5>News</h5>
                    <p class="text-muted mb-2">Create / edit / delete news with images.</p>
                    <a class="btn btn-dark btn-sm" href="{{ route('admin.news.index') }}">Open</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5>Documents</h5>
                    <p class="text-muted mb-2">Upload files by group and period.</p>
                    <a class="btn btn-dark btn-sm" href="{{ route('admin.documents.index') }}">Open</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5>Universities</h5>
                    <p class="text-muted mb-2">Add event links (no DB, JSON only).</p>
                    <a class="btn btn-dark btn-sm" href="{{ route('admin.universities.index') }}">Open</a>
                </div>
            </div>
        </div>
    </div>
@endsection
