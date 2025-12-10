<header class="header">
    <div class="container header-inner">

        {{-- ЛОГОТИП --}}
        <a class="logo" href="{{ url('/') }}">Digi<span>Tech</span></a>

        {{-- Burger Menu --}}
        <button class="burger" id="burger" aria-label="Open menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>

        {{-- Навигация --}}
        <nav class="nav" id="site-nav">
            <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
            <a href="{{ url('/about') }}">About the project</a>
            <a href="{{ url('/webinars') }}">Webinars</a>
            <a href="{{ url('/events') }}">Events</a>
            <a href="{{ url('/publications') }}">Publications</a>
            <a href="{{ url('/contact') }}">Contact</a>
        </nav>

    </div>
</header>
