@extends('admin.layout')

@section('content')

    <div class="dashboard-title">
        {{ __('admin_dashboard.title') }}
    </div>

    <div class="row g-4">

        {{-- NEWS --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="card-icon">📰</div>

                    <h5>{{ __('admin_dashboard.news.title') }}</h5>
                    <p class="text-muted mb-3">
                        {{ __('admin_dashboard.news.desc') }}
                    </p>

                    <a class="btn btn-dark btn-sm"
                       href="{{ route('admin.news.index') }}">
                        {{ __('admin_dashboard.open') }}
                    </a>
                </div>
            </div>
        </div>

        {{-- DOCUMENTS --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="card-icon">📄</div>

                    <h5>{{ __('admin_dashboard.documents.title') }}</h5>
                    <p class="text-muted mb-3">
                        {{ __('admin_dashboard.documents.desc') }}
                    </p>

                    <a class="btn btn-dark btn-sm"
                       href="{{ route('admin.documents.index') }}">
                        {{ __('admin_dashboard.open') }}
                    </a>
                </div>
            </div>
        </div>

        {{-- UNIVERSITIES --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="card-icon">🎓</div>

                    <h5>{{ __('admin_dashboard.universities.title') }}</h5>
                    <p class="text-muted mb-3">
                        {{ __('admin_dashboard.universities.desc') }}
                    </p>

                    <a class="btn btn-dark btn-sm"
                       href="{{ route('admin.universities.index') }}">
                        {{ __('admin_dashboard.open') }}
                    </a>
                </div>
            </div>
        </div>

        {{-- COMMENTS --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="card-icon">💬</div>

                    <h5>{{ __('admin_dashboard.comments.title') }}</h5>
                    <p class="text-muted mb-3">
                        {{ __('admin_dashboard.comments.desc') }}
                    </p>

                    <a class="btn btn-dark btn-sm"
                       href="{{ route('admin.comments.index') }}">
                        {{ __('admin_dashboard.open') }}
                    </a>
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
            background: linear-gradient(
                90deg,
                var(--primary-purple),
                var(--accent-purple)
            );
            border-radius: 2px;
        }
    </style>

@endsection
