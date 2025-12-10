@extends('layouts.main')

@section('content')

    <!-- HERO -->
    <section class="hero-events">
        <h1>Webinars</h1>
    </section>

    <section class="webinars-section">
        <div class="container">

            <h1 class="page-title">Educational Webinars & Workshops</h1>

            <p class="intro-text">
                Based on the preferences and recommendations from the consortium members,
                the DigiTech project prepared a series of online meetings, workshops,
                lectures and educational webinars presented below.
            </p>

            <p class="muted italic">
                A password is required to access the videos. To request the password, please
                <a href="{{ url('/contact') }}">contact us</a> and provide a short information about
                your institution or interest in the material.
            </p>

            <hr class="divider">

            <p class="password-label">🔒 Please enter the password to see the content</p>

            <!-- Password Form -->
            <div class="password-box">
                <div class="input-wrapper">
                    <input type="password" id="webinar-password" placeholder="Enter password">
                </div>
                <button id="submit-password" class="btn">
                    <span>Unlock Content</span>
                </button>
                <p id="error-text" class="error-text hidden"></p>
            </div>

            <!-- Hidden Content -->
            <div id="webinar-content" class="hidden">
                <div class="success-message">
                    ✅ Access granted! Explore our educational resources below.
                </div>

                <h3>Available Webinars</h3>

                <div class="webinar-list">

                    <div class="webinar-item">
                        <span class="webinar-icon">🎓</span>
                        <span class="webinar-text">PhD Training & Research Methodologies</span>
                    </div>

                    <div class="webinar-item">
                        <span class="webinar-icon">💻</span>
                        <span class="webinar-text">Digital Tools for Scientific Work</span>
                    </div>

                    <div class="webinar-item">
                        <span class="webinar-icon">📝</span>
                        <span class="webinar-text">Academic Writing & Publications</span>
                    </div>

                    <div class="webinar-item">
                        <span class="webinar-icon">📊</span>
                        <span class="webinar-text">Data Analysis & Visualization Techniques</span>
                    </div>

                    <div class="webinar-item">
                        <span class="webinar-icon">🌐</span>
                        <span class="webinar-text">Building Your Academic Online Presence</span>
                    </div>

                </div>
            </div>

        </div>
    </section>

    {{-- Подключаем webinars.css только на этой странице --}}
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/webinars.css') }}">
    @endpush

    {{-- Подключаем webinars.js --}}
    @push('scripts')
        <script src="{{ asset('assets/js/webinars.js') }}"></script>

        <script>
            const passwordInput = document.getElementById('webinar-password');
            const submitBtn = document.getElementById('submit-password');
            const errorText = document.getElementById('error-text');
            const webinarContent = document.getElementById('webinar-content');
            const correctPassword = 'demo2024'; // You can move this to .env if needed

            submitBtn.addEventListener('click', function() {
                const enteredPassword = passwordInput.value;

                if (enteredPassword === correctPassword) {
                    webinarContent.classList.remove('hidden');
                    errorText.classList.add('hidden');
                    document.querySelector('.password-box').style.display = 'none';
                    document.querySelector('.password-label').style.display = 'none';
                } else {
                    errorText.textContent = '❌ Incorrect password. Please try again or contact us for access.';
                    errorText.classList.remove('hidden');
                    passwordInput.value = '';
                    passwordInput.focus();
                }
            });

            passwordInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    submitBtn.click();
                }
            });
        </script>
    @endpush

@endsection
