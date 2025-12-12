@extends('layouts.main')

@section('content')

    <!-- HERO -->
    <section class="about-hero">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1>{{ __('docs.hero_title') }}</h1>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <section class="project-docs container">

        <h2 class="page-title">{{ __('docs.main_title') }}</h2>
        <p class="page-subtitle">{{ __('docs.subtitle') }}</p>


        <!-- ===== Progress Reports ===== -->
        <h3 class="docs-section-title">{{ __('docs.progress_reports') }}</h3>
        <h4 class="docs-subtitle">{{ __('docs.reports_24') }}</h4>

        <div class="docs-grid">
            <div class="doc-card">
                <img src="{{ asset('assets/docs/sample1.jpg') }}" alt="Report 1">
                <p>Report 24 Month – 1</p>
            </div>

            <div class="doc-card">
                <img src="{{ asset('assets/docs/sample2.jpg') }}" alt="Report 2">
                <p>Report 24 Month – 2</p>
            </div>

            <div class="doc-card">
                <img src="{{ asset('assets/docs/sample3.jpg') }}" alt="Report 3">
                <p>Report 24 Month – 3</p>
            </div>
        </div>


        <!-- ===== Quality Assurance ===== -->
        <h3 class="docs-section-title">{{ __('docs.quality_reports') }}</h3>
        <h4 class="docs-subtitle">{{ __('docs.reports_24') }}</h4>

        <div class="docs-grid">
            <div class="doc-card">
                <img src="{{ asset('assets/docs/sample1.jpg') }}" alt="QA Report">
                <p>QA Report – 24 Month</p>
            </div>
        </div>


        <!-- ===== OTHER DOCUMENTS ===== -->
        <h3 class="docs-section-title">{{ __('docs.other_docs') }}</h3>

        <ul class="other-docs-list">
            <li>• {{ __('docs.needs_analysis') }}</li>
            <li>• {{ __('docs.sustainability') }}</li>
            <li>• {{ __('docs.communication') }}</li>
        </ul>

    </section>

@endsection
