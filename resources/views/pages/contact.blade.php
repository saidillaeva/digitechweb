@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/contactus.css') }}">

    <!-- ===== CONTACT HERO ===== -->
    <section class="contact-hero">
        style="background-image: url('{{ asset('assets/img/contactus.jpg') }}');">
        <div class="container">
            <h1>Contact Us</h1>
            <p>We'd love to hear from you — feel free to reach out!</p>
        </div>
    </section>

    <!-- ===== CONTACT SECTION ===== -->
    <section class="contact-section">
        <div class="container">
            <div class="contact-grid">

                <!-- LEFT: FORM -->
                <div class="contact-form">
                    <h2>Send us a message</h2>
                    <p>We will get back to you as soon as possible.</p>

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
                    </form>
                </div>

                <!-- RIGHT: CONTACT INFO -->
                <div class="contact-info">
                    <h2>Contact information</h2>

                    <p><strong>Email:</strong> info@digitech.kg</p>
                    <p><strong>Phone:</strong> +996 (555) 000 000</p>
                    <p><strong>Address:</strong> Bishkek, Kyrgyzstan</p>

                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2923.437029391175!2d74.5987022153105!3d42.87472287915571!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x389ec827f6d6b1df%3A0x3c16f1f6cf0bce0b!2sBishkek!5e0!3m2!1sen!2skg!4v1685541750000!5m2!1sen!2skg"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Подключаем contact.css только на этой странице --}}
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
    @endpush

@endsection
