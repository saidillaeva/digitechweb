@extends('layouts.main')

@push('styles')
    <style>
        .partners-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px,1fr));
            gap: 24px;
        }

        .partner-card {
            background: #fff;
            border-radius: 16px;
            padding: 24px;
            text-align: center;
            text-decoration: none;
            color: inherit;
            box-shadow: 0 10px 30px rgba(0,0,0,.06);
            transition: transform .2s, box-shadow .2s;
        }

        .partner-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(0,0,0,.12);
        }

        .partner-card img {
            max-height: 80px;
            margin-bottom: 14px;
        }
    </style>
@endpush

@section('content')

    <section class="partners-hero">

        <div class="hero-bg"></div>

        <!-- 🔹 МЯГКИЙ OVERLAY -->
        <div class="hero-overlay"></div>

        <div class="partners-hero-content">
            <h1>{{ __('partners.title') }}</h1>
            <p>{{ __('partners.subtitle') }}</p>
        </div>
    </section>

    <section class="partners-section light">
        <div class="container">
            <h2 class="section-title">{{ __('partners.beneficiaries') }}</h2>

            <div class="partners-grid">
                @foreach($universities as $u)
                    <a href="{{ route('partners.show', $u['slug']) }}" class="partner-card">
                        <img
                            src="{{ asset('assets/img/partners/'.$u['logo']) }}"
                            alt="{{ $u['name'] }}"
                        >
                        <h3>{{ $u['name'] }}</h3>
                    </a>
                @endforeach
            </div>

        </div>
    </section>

@endsection
