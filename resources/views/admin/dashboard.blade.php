@extends('admin.layout')

@section('content')
    <div class="dashboard-title">Admin Dashboard</div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="card-icon">📰</div>
                    <h5>News</h5>
                    <p class="text-muted mb-3">Create, edit, and delete news with images.</p>
                    <a class="btn btn-dark btn-sm" href="{{ route('admin.news.index') }}">Open Module</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="card-icon">📄</div>
                    <h5>Documents</h5>
                    <p class="text-muted mb-3">Upload files by group and period.</p>
                    <a class="btn btn-dark btn-sm" href="{{ route('admin.documents.index') }}">Open Module</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="card-icon">🎓</div>
                    <h5>Universities</h5>
                    <p class="text-muted mb-3">Add event links (no DB, JSON only).</p>
                    <a class="btn btn-dark btn-sm" href="{{ route('admin.universities.index') }}">Open Module</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: inline-block;
            transition: transform .3s ease;
        }

        .card:hover .card-icon {
            transform: scale(1.15) rotate(5deg);
        }

        .dashboard-title {
            position: relative;
            display: inline-block;
            left: 50%;
            transform: translateX(-50%);
        }

        .dashboard-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-purple), var(--accent-purple));
            border-radius: 2px;
        }
    </style>
@endsection
