@extends('layouts.main')

@section('content')

    <section class="hero hero-events">

        <!-- ФОН -->
        <div class="hero-bg"></div>

        <!-- ЧЁРНЫЙ OVERLAY -->
        <div class="hero-overlay"></div>

        <!-- ТЕКСТ -->
        <div class="hero-content">
            <h1>{{ __('events.title') }}</h1>
            <p>{{ __('events.subtitle') }}</p>
        </div>

    </section>


    <section class="events-list">
        <div class="container">
            <div class="events-grid">

                @forelse($events as $event)
                    <div class="event-card">
                        <div class="event-img-wrapper">
                            @if($event->image_path)
                                <img
                                    src="{{ asset('storage/' . $event->image_path) }}"
                                    alt="{{ $event->title }}"
                                >
                            @else
                                <img
                                    src="{{ asset('assets/img/event1.jpg') }}"
                                    alt="Event image"
                                >
                            @endif
                        </div>

                        <div class="event-body">
                            <b>{{ $event->title }}</b>

                            <p>
                                {{ optional($event->published_at)->format('F Y') }}
                            </p>

                            <a href="{{ route('event-detail', $event->slug) }}" class="read-btn">
                                <span>{{ __('events.read_more') }}</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="events-empty">
                        {{ __('events.empty') }}
                    </p>
                @endforelse

            </div>

            <div class="pagination">
                {{ $events->links() }}
            </div>
        </div>
    </section>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/events.css') }}">
    @endpush

@endsection
