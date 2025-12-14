@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/contactus.css') }}">

    <!-- ===== CONTACT HERO ===== -->
    <section class="contact-hero">
        style="background-image: url('{{ asset('assets/img/contactus.jpg') }}');">
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
                            Name
                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Your full name"
                                required
                            >
                        </label>

                        <label>
                            Email
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="example@mail.com"
                                required
                            >
                        </label>

                        <label>
                            Message
                            <textarea
                                name="message"
                                rows="5"
                                placeholder="Type your message here..."
                                required
                            >{{ old('message') }}</textarea>
                        </label>

                        <button type="submit">Send message</button>
                            {{ __('contact.name') }}
                            <input type="text" placeholder="{{ __('contact.name_placeholder') }}">
                        </label>

                        <label>
                            {{ __('contact.email') }}
                            <input type="email" placeholder="{{ __('contact.email_placeholder') }}">
                        </label>

                        <label>
                            {{ __('contact.message') }}
                            <textarea rows="5" placeholder="{{ __('contact.message_placeholder') }}"></textarea>
                        </label>

                        <button type="button">
                            {{ __('contact.send_button') }}
                        </button>
                    </form>
                </div>

                <!-- RIGHT: CONTACT INFO -->
                <div class="contact-info">
                    <h2>Contact information</h2>

                    <p><strong>Email:</strong> info@digitech.kg</p>
                    <p><strong>Phone:</strong> +996 (555) 000 000</p>
                    <p><strong>Address:</strong> Bishkek, Kyrgyzstan</p>
                    <h2>{{ __('contact.info_title') }}</h2>

                    <p><b>{{ __('contact.email') }}:</b>  info@inai.kg</p>
                    <p><b>{{ __('contact.phone') }}:</b>  +996 500 549 238</p>
                    <p><b>{{ __('contact.address') }}:</b> {{ __('contact.location') }}</p>

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

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
    @endpush

@endsection
