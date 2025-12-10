@extends('layouts.main')

@section('content')

    <!-- ===== BEAUTIFUL HEADER (no photo) ===== -->
    <section class="pub-hero no-bg">
        <div class="container">
            <h1>Publications</h1>
            <p>Reports, books, scientific articles & project outputs</p>
        </div>
    </section>

    <!-- ===== PUBLICATIONS ===== -->
    <section class="publications">
        <div class="container">
            <div class="pub-grid">

                <div class="pub-card">
                    <span class="type">📘 Book</span>
                    <h3>Digital Education in Central Asia</h3>
                    <p class="authors">Edited by: A. Toktomamatov, J. Weber</p>
                    <p class="desc">
                        A comprehensive book exploring digital transformation of universities in Kyrgyzstan.
                    </p>
                    <span class="meta">2024 · ISBN 978-123-456-789</span>
                    <a href="#" class="btn">📄 PDF</a>
                </div>

                <div class="pub-card">
                    <span class="type">📄 Report</span>
                    <h3>Baseline Study on Digital Skills</h3>
                    <p class="authors">DigiTech Consortium</p>
                    <p class="desc">
                        Analysis of teachers’ and students’ digital competencies in partner universities.
                    </p>
                    <span class="meta">2024 · 1.2 MB</span>
                    <a href="#" class="btn">📄 Download</a>
                </div>

                <div class="pub-card">
                    <span class="type">📑 Policy Brief</span>
                    <h3>Higher Education Reform Guidelines</h3>
                    <p class="authors">European Experts Board</p>
                    <p class="desc">
                        Recommendations for integrating digital tools into university governance.
                    </p>
                    <span class="meta">2023 · Policy Document</span>
                    <a href="#" class="btn">📄 View</a>
                </div>

                <div class="pub-card">
                    <span class="type">📰 Article</span>
                    <h3>AI & Research Ethics in Universities</h3>
                    <p class="authors">L. Müller, S. Karimova</p>
                    <p class="desc">
                        Published in Journal of Digital Learning. Focus on ethics & AI tools in PhD research.
                    </p>
                    <span class="meta">DOI: 10.2145/jdl.2025.04</span>
                    <a href="#" class="btn">📄 Read Article</a>
                </div>

            </div>
        </div>
    </section>

    {{-- Подключаем publications.css только на этой странице --}}
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/publications.css') }}">
    @endpush

@endsection
