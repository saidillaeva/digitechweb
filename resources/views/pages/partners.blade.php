@extends('layouts.main')

@section('content')

    {{-- =====================================================
       HERO
    ===================================================== --}}
    <section class="partners-hero">
        <div class="partners-hero-content">
            <h1>{{ __('partners.title') }}</h1>
            <p>{{ __('partners.subtitle') }}</p>
        </div>
    </section>


    {{-- =====================================================
       PROJECT COORDINATOR
    ===================================================== --}}
    <section class="partners-section">
        <div class="container">
            <h2 class="section-title">{{ __('partners.coordinator') }}</h2>

            <a href="https://www.oshtu.kg/"
               target="_blank"
               rel="noopener noreferrer"
               class="partner-card main">

                <img src="{{ asset('assets/img/partners/otu.png') }}" alt="Osh Technological University">
                <h3>Osh Technological University</h3>
                <span>Kyrgyzstan</span>
            </a>
        </div>
    </section>


    {{-- =====================================================
       BENEFICIARIES
    ===================================================== --}}
    <section class="partners-section light">
        <div class="container">
            <h2 class="section-title">{{ __('partners.beneficiaries') }}</h2>

            <div class="partners-grid">

                <a href="https://www.haw-hamburg.de/"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="partner-card">

                    <img src="{{ asset('assets/img/partners/haw.png') }}" alt="HAW Hamburg">
                    <h3>HAW Hamburg</h3>
                    <span>Germany</span>
                </a>

                <a href="https://www.um.si/"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="partner-card">

                    <img src="{{ asset('assets/img/partners/maribor.png') }}" alt="University of Maribor">
                    <h3>University of Maribor</h3>
                    <span>Slovenia</span>
                </a>

                <a href="https://inai.kg/"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="partner-card">

                    <img src="{{ asset('assets/img/partners/inai.png') }}" alt="INAI.KG">
                    <h3>INAI.KG</h3>
                    <span>Kyrgyzstan</span>
                </a>

                <a href="https://www.ysu.am/"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="partner-card">

                    <img src="{{ asset('assets/img/partners/ysu.png') }}" alt="Yerevan State University">
                    <h3>Yerevan State University</h3>
                    <span>Armenia</span>
                </a>

                <a href="https://asue.am/"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="partner-card">

                    <img src="{{ asset('assets/img/partners/asue.png') }}" alt="ASUE">
                    <h3>ASUE</h3>
                    <span>Armenia</span>
                </a>

                <a href="https://gtu.ge/"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="partner-card">

                    <img src="{{ asset('assets/img/partners/gtu.png') }}" alt="GTU">
                    <h3>GTU</h3>
                    <span>Georgia</span>
                </a>

                <a href="https://btu.edu.ge/"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="partner-card">

                    <img src="{{ asset('assets/img/partners/btu.png') }}" alt="BTU">
                    <h3>BTU</h3>
                    <span>Georgia</span>
                </a>

            </div>
        </div>
    </section>

@endsection
