<header class="header">
    <div class="container header-inner">

        <a href="{{ route('home') }}" class="logo">Digi<span>Tech</span></a>

        <button class="burger" id="burger" aria-label="Open menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>

        <nav class="nav" id="site-nav">

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


            <a href="{{ route('partners') }}">{{ __('menu.partners') }}</a>
            <a href="{{ route('events') }}">{{ __('menu.events') }}</a>
            <a href="{{ route('contact') }}">{{ __('menu.contact') }}</a>
        </nav>


        {{-- LANGUAGE SWITCHER --}}
        <div class="lang-switcher">
            <a href="{{ route('lang.switch', 'en') }}">EN</a>
            <a href="{{ route('lang.switch', 'ru') }}">RU</a>
            <a href="{{ route('lang.switch', 'ky') }}">KG</a>
            <a href="{{ route('lang.switch', 'de') }}">DE</a>
        </div>

    </div>
</header>
