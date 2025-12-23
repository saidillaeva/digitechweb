<header class="header">
    <div class="container header-inner">

        <!-- LEFT: EU / ERASMUS LOGO -->
        <div class="header-left">
            <a
                href="https://erasmus-plus.ec.europa.eu/"
                class="logo logo--eu"
                target="_blank"
                rel="noopener noreferrer"
            >
                <img
                    src="{{ asset('assets/icons/ec.png') }}"
                    alt="Erasmus+ Programme – European Commission"
                    class="logo-img"
                >
            </a>
        </div>

        <!-- CENTER: NAVIGATION -->
        <nav class="nav" id="site-nav">
            <ul class="nav-list">

                <li class="dropdown">
                    <a href="{{ route('about') }}" class="dropdown-toggle">
                        {{ __('menu.about') }}
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('about') }}">
                                <i class="fas fa-info-circle"></i> {{ __('menu.about_project') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('project.documentation') }}">
                                <i class="fas fa-file-alt"></i> {{ __('menu.project_docs') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li><a href="{{ route('partners') }}">{{ __('menu.partners') }}</a></li>
                <li><a href="{{ route('events') }}">{{ __('menu.events') }}</a></li>
                <li><a href="{{ route('contact') }}">{{ __('menu.contact') }}</a></li>

            </ul>
        </nav>

        <!-- RIGHT: LANG + DIGITECH -->
        <div class="header-right">
            <div class="lang-switcher">
                <a href="{{ route('lang.switch', 'en') }}">EN</a>
                <a href="{{ route('lang.switch', 'ru') }}">RU</a>
                <a href="{{ route('lang.switch', 'ky') }}">KG</a>
                <a href="{{ route('lang.switch', 'de') }}">DE</a>
            </div>

            <a href="{{ route('home') }}" class="logo logo--digitech">
                <img
                    src="{{ asset('assets/icons/logo.png') }}"
                    alt="DigiTech logo"
                    class="logo-img"
                >
            </a>
        </div>

        <!-- BURGER -->
        <button class="burger" id="burger" aria-label="Open menu">
            <span></span><span></span><span></span>
        </button>

    </div>
</header>

<script>
    // Scroll effect
    window.addEventListener('scroll', () => {
        const header = document.querySelector('.header');
        header.classList.toggle('scrolled', window.scrollY > 10);
    });

    // Mobile menu toggle
    const burger = document.getElementById('burger');
    const nav = document.getElementById('site-nav');

    burger.addEventListener('click', () => {
        burger.classList.toggle('active');
        nav.classList.toggle('active');
    });

    // Mobile dropdown toggle
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(dropdown => {
        const toggle = dropdown.querySelector('.dropdown-toggle');

        toggle.addEventListener('click', (e) => {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                dropdown.classList.toggle('active');
            }
        });
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.header') && nav.classList.contains('active')) {
            burger.classList.remove('active');
            nav.classList.remove('active');
        }
    });
</script>
