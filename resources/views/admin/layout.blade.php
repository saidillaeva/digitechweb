<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* ===== VARIABLES ===== */
        :root {
            --primary-purple: #5B4B8A;
            --deep-blue: #2D3561;
            --dark-purple: #3D2E5F;
            --accent-purple: #8B7AB8;
            --light-purple: #B8A8D9;
            --ultra-light: #E8E3F3;
            --bg-gradient-start: #1a1b3d;
            --bg-gradient-end: #2d1b4e;
        }

        /* ===== BODY & BACKGROUND ===== */
        body {
            background: linear-gradient(135deg, #f5f3ff 0%, #ede9fe 50%, #e8e3f3 100%);
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: linear-gradient(135deg, var(--bg-gradient-start) 0%, var(--bg-gradient-end) 100%) !important;
            box-shadow: 0 4px 20px rgba(91, 75, 138, 0.3);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: -0.5px;
            color: #ffffff !important;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            transition: transform .3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .navbar .btn-outline-light {
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: #ffffff;
            font-weight: 500;
            transition: all .3s ease;
            backdrop-filter: blur(10px);
        }

        .navbar .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2);
        }

        .navbar .btn-danger {
            background: linear-gradient(135deg, #dc2626, #991b1b);
            border: none;
            font-weight: 500;
            transition: all .3s ease;
        }

        .navbar .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
        }

        /* ===== CONTAINER ===== */
        .container {
            max-width: 1200px;
        }

        /* ===== ALERTS ===== */
        .alert-success {
            background: linear-gradient(135deg, rgba(139, 122, 184, 0.15), rgba(184, 168, 217, 0.15));
            border: 2px solid var(--light-purple);
            color: var(--deep-blue);
            border-radius: 12px;
            font-weight: 500;
            box-shadow: 0 4px 15px rgba(91, 75, 138, 0.1);
        }

        /* ===== DASHBOARD CARDS ===== */
        .dashboard-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--deep-blue);
            margin-bottom: 2rem;
            text-align: center;
            letter-spacing: -0.5px;
        }

        .card {
            border: none !important;
            border-radius: 18px !important;
            overflow: hidden;
            transition: all .35s cubic-bezier(0.4, 0, 0.2, 1);
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(91, 75, 138, 0.12) !important;
            position: relative;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-purple), var(--accent-purple));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .35s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 40px rgba(91, 75, 138, 0.25) !important;
        }

        .card:hover::before {
            transform: scaleX(1);
        }

        .card-body {
            padding: 2rem !important;
            position: relative;
            z-index: 1;
        }

        .card-body h5 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--deep-blue);
            margin-bottom: 0.75rem;
            transition: color .3s ease;
        }

        .card:hover h5 {
            color: var(--primary-purple);
        }

        .card-body .text-muted {
            color: #6b7280 !important;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* ===== CARD ICONS ===== */
        .card-body::after {
            content: '';
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: linear-gradient(135deg, rgba(91, 75, 138, 0.1), rgba(139, 122, 184, 0.15));
            opacity: 0;
            transition: opacity .35s ease;
        }

        .card:hover .card-body::after {
            opacity: 1;
        }

        /* ===== BUTTONS ===== */
        .btn-dark {
            background: linear-gradient(135deg, var(--primary-purple), var(--accent-purple)) !important;
            border: none !important;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border-radius: 10px;
            transition: all .3s ease;
            box-shadow: 0 4px 15px rgba(91, 75, 138, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.85rem;
        }

        .btn-dark:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(91, 75, 138, 0.4);
        }

        /* ===== GRID SPACING ===== */
        .row.g-3 {
            gap: 1.5rem !important;
        }

        /* ===== DECORATIVE ELEMENTS ===== */
        .container {
            position: relative;
        }

        .container::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(139, 122, 184, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            top: -100px;
            right: -150px;
            pointer-events: none;
            z-index: 0;
        }

        .container::after {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(91, 75, 138, 0.06) 0%, transparent 70%);
            border-radius: 50%;
            bottom: -200px;
            left: -200px;
            pointer-events: none;
            z-index: 0;
        }

        .container > * {
            position: relative;
            z-index: 1;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .dashboard-title {
                font-size: 2rem;
            }

            .navbar .ms-auto {
                flex-wrap: wrap;
                gap: 0.5rem !important;
            }

            .card-body {
                padding: 1.5rem !important;
            }
        }

        /* ===== SMOOTH ANIMATIONS ===== */
        * {
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">DigiTech Admin</a>

        <div class="ms-auto d-flex align-items-center gap-2">

            {{-- LANGUAGE SWITCH --}}
            <div class="btn-group me-3">
                <a href="{{ route('lang.switch','ru') }}" class="btn btn-outline-light btn-sm">RU</a>
                <a href="{{ route('lang.switch','en') }}" class="btn btn-outline-light btn-sm">EN</a>
                <a href="{{ route('lang.switch','ky') }}" class="btn btn-outline-light btn-sm">KG</a>
                <a href="{{ route('lang.switch','de') }}" class="btn btn-outline-light btn-sm">DE</a>
            </div>

            <a class="btn btn-outline-light btn-sm" href="{{ route('admin.news.index') }}">
                {{ __('admin_nav.news') }}
            </a>
            <a class="btn btn-outline-light btn-sm" href="{{ route('admin.documents.index') }}">
                {{ __('admin_nav.documents') }}
            </a>
            <a class="btn btn-outline-light btn-sm" href="{{ route('admin.universities.index') }}">
                {{ __('admin_nav.universities') }}
            </a>
            <a class="btn btn-outline-light btn-sm" href="{{ route('admin.comments.index') }}">
                {{ __('admin_nav.comments') }}
            </a>

            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="btn btn-danger btn-sm">
                    {{ __('admin_nav.logout') }}
                </button>
            </form>
        </div>

    </div>
</nav>

<div class="container py-5">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</div>

</body>
</html>
