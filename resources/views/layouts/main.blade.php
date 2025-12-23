<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    {{-- GLOBAL STYLES --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/events.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/publications.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/partners.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

    {{-- Page-specific styles --}}
    @stack('styles')

    {{-- FontAwesome --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JT9XDNRWZS"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-JT9XDNRWZS');
    </script>

    <!-- Custom event: About page -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof gtag === 'function') {
                gtag('event', 'view_about_page', {
                    page_title: 'About DigiTech',
                    page_path: '/about'
                });
            }
        });
    </script>


</head>

<body>

@include('components.header')

@yield('content')

@include('components.footer')

{{-- GLOBAL SCRIPTS --}}
<script src="{{ asset('assets/js/script.js') }}" defer></script>
<script src="{{ asset('assets/js/counter.js') }}" defer></script>
<script src="{{ asset('assets/js/scroll-reveal.js') }}" defer></script>

{{-- AOS --}}
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        once: true,
        duration: 900,
        easing: 'ease-out-cubic'
    });
</script>

{{-- Page-specific scripts --}}
@stack('scripts')

</body>
</html>
