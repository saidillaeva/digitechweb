@extends('layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
@endpush

@section('content')

    <!-- ===== CONTACT HERO ===== -->
    <section class="contact-hero"
             style="background-image: url('{{ asset('assets/img/contact.jpg') }}');">
        <div class="container">
            <h1>{{ __('contact.hero_title') }}</h1>
            <p>{{ __('contact.hero_subtitle') }}</p>
        </div>
    </section>

    <!-- ===== CONTACT SECTION ===== -->
    <section class="contact-section">
        <div class="container">
            <div class="contact-grid">

                <!-- LEFT: FORM -->
                <div class="contact-form">
                    <h2>{{ __('contact.form_title') }}</h2>
                    <p>{{ __('contact.form_subtitle') }}</p>

                    {{-- SUCCESS MESSAGE --}}
                    @if (session('success'))
                        <div class="success-message">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- ERROR MESSAGES --}}
                    @if ($errors->any())
                        <div class="error-message">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.send') }}">
                        @csrf

                        <label>
                            {{ __('contact.name') }}
                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="{{ __('contact.name_placeholder') }}"
                                required
                            >
                        </label>

                        <label>
                            {{ __('contact.email') }}
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="{{ __('contact.email_placeholder') }}"
                                required
                            >
                        </label>

                        <label>
                            {{ __('contact.message') }}
                            <textarea
                                name="message"
                                rows="5"
                                placeholder="{{ __('contact.message_placeholder') }}"
                                required
                            >{{ old('message') }}</textarea>
                        </label>

                        <button type="submit">
                            {{ __('contact.send_button') }}
                        </button>
                    </form>
                </div>

                <!-- RIGHT: CONTACT INFO -->
                <div class="contact-info">
                    <h2>📍 {{ __('contact.info_title') }}</h2>

                    <p><span class="emoji">📧</span> <b>{{ __('contact.email') }}:</b> info@inai.kg</p>
                    <p><span class="emoji">📱</span> <b>{{ __('contact.phone') }}:</b> +996 500 549 238</p>
                    <p><span class="emoji">🏢</span> <b>{{ __('contact.address') }}:</b> {{ __('contact.location') }}</p>

                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps?q=INAI%20Bishkek&output=embed"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>


            </div>
        </div>
    </section>

@endsection
