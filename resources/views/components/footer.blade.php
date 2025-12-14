<footer class="footer">
    <div class="container">

        <!-- BRAND -->
        <div class="footer-brand">

            <!-- MAIN LOGO -->
            <img
                src="{{ asset('assets/icons/logo.png') }}"
                alt="DigiTech Logo"
                class="footer-logo"
            >

            <!-- SECOND LOGO (EU / ERASMUS) -->
            <img
                src="{{ asset('assets/icons/inai.png') }}"
                alt="Erasmus+ Programme"
                class="footer-logo footer-logo--secondary"
            >

            <p class="tagline">{{ __('footer.tagline') }}</p>

            <p>
                © 2025 DigiTech. {{ __('footer.rights') }}<br>
                {{ __('footer.erasmus') }}
            </p>

            <div class="socials">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>

        <!-- LINKS -->
        <div class="footer-links">
            <h4>{{ __('footer.quick_links') }}</h4>
            <ul>
                <li><a href="{{ route('home') }}">{{ __('menu.home') }}</a></li>
                <li><a href="{{ route('about') }}">{{ __('menu.about') }}</a></li>
                <li><a href="{{ route('events') }}">{{ __('menu.events') }}</a></li>
                <li><a href="{{ route('contact') }}">{{ __('menu.contact') }}</a></li>
            </ul>
        </div>

        <!-- CONTACT -->
        <div class="footer-contact">
            <h4>{{ __('footer.contact') }}</h4>
            <ul>
                <li><i class="fas fa-envelope"></i> info@digitech.kg</li>
                <li><i class="fas fa-phone"></i> +996 (555) 000-000</li>
                <li><i class="fas fa-map-marker-alt"></i> {{ __('footer.location') }}</li>
            </ul>
        </div>

    </div>

    <div class="footer-bottom">
        <p>{{ __('footer.made_by') }}</p>
    </div>
</footer>
