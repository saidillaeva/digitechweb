@extends('layouts.main')

@section('content')

    <section class="hero hero-events">
        <h1>Meetings and events</h1>
    </section>

    <section class="events-list">
        <div class="container">
            <div class="events-grid">

                @forelse($events as $event)
                    <div class="event-card">
                        <div class="event-img-wrapper">
                            @if($event->image_path)
                                <img src="{{ asset('storage/' . $event->image_path) }}"
                                     alt="{{ $event->title }}">
                            @else
                                <img src="{{ asset('assets/img/event1.jpg') }}"
                                     alt="Event image">
                            @endif
                        </div>

                        <div class="event-body">
                            <b>{{ $event->title }}</b>

                            <p>
                                {{ optional($event->published_at)->format('F Y') }}
                            </p>

                            <a href="#" class="read-btn">
                                <span>Read more…</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <p>No events available.</p>
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
