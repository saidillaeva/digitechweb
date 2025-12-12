@extends('layouts.main')

@section('content')

    <!-- HERO SECTION -->
    <section class="hero hero-events">
        <h1>Meetings and events</h1>
    </section>

    <!-- EVENTS LIST -->
    <section class="events-list">
        <div class="container">
            <div class="events-grid">

                @forelse($events as $event)
                    <div class="event-card">
                        <div class="event-img-wrapper">
                            <img src="{{ asset('storage/' . $event->image) }}"
                                 alt="{{ $event->title }}">
                        </div>

                        <div class="event-body">
                            <b>{{ $event->title }}</b>
                            <p>
                                {{ \Carbon\Carbon::parse($event->date)->format('F Y') }}
                                — {{ $event->location }}
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

            <!-- PAGINATION -->
            <div class="pagination">
                {{ $events->links() }}
            </div>
        </div>
    </section>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/events.css') }}">
    @endpush

@endsection
