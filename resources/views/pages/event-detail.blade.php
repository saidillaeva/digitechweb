@extends('layouts.main')

@push('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }

        :root {
            --dark-blue: #1e3a8a;
            --purple: #7c3aed;
            --light-purple: #a78bfa;
            --white: #ffffff;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-600: #475569;
            --gray-800: #1e293b;
            --shadow-sm: 0 2px 8px rgba(30, 58, 138, 0.08);
            --shadow-md: 0 8px 24px rgba(124, 58, 237, 0.12);
            --shadow-lg: 0 16px 48px rgba(30, 58, 138, 0.15);
        }

        /* Hero Section */
        /* Event Detail Section */
        .event-detail {
            background: linear-gradient(to bottom, var(--gray-50), var(--white));
            min-height: 100vh;
            padding: 80px 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .event-detail .container {
            background: var(--white);
            border-radius: 24px;
            padding: clamp(30px, 5vw, 60px);
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--gray-200);
            position: relative;
            overflow: hidden;
        }

        .event-detail .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--dark-blue), var(--purple), var(--light-purple));
        }

        .event-detail p:first-of-type {
            text-align: center;
            color: var(--gray-600);
            font-size: 0.95rem;
            font-weight: 500;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .event-detail img {
            width: 100%;
            border-radius: 16px;
            margin: 40px 0;
            box-shadow: var(--shadow-md);
            transition: transform 0.3s ease;
        }

        .event-detail img:hover {
            transform: scale(1.02);
        }

        .event-detail > div > div:nth-of-type(3) {
            color: var(--gray-800);
            font-size: clamp(1rem, 2vw, 1.125rem);
            line-height: 1.8;
        }

        .event-detail a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 32px;
            background: linear-gradient(135deg, var(--dark-blue), var(--purple));
            color: var(--white);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
            margin-top: 40px;
        }

        .event-detail a:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            background: linear-gradient(135deg, var(--purple), var(--light-purple));
        }

        /* Comments Section */
        .comments-section-wrapper {
            background: linear-gradient(135deg, #f0f4ff 0%, #e8efff 100%);
            padding: 80px 20px;
            position: relative;
            overflow: hidden;
        }

        .comments-section-wrapper::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(124, 58, 237, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .comments-section-wrapper::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(30, 58, 138, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .comments-container {
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .comments-wrapper {
            background: #ffffff;
            border-radius: 28px;
            padding: clamp(35px, 6vw, 60px);
            box-shadow: 0 20px 60px rgba(30, 58, 138, 0.12), 0 8px 24px rgba(124, 58, 237, 0.08);
            border: 1px solid rgba(124, 58, 237, 0.1);
            position: relative;
            overflow: hidden;
        }

        .comments-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #1e3a8a 0%, #7c3aed 50%, #a78bfa 100%);
        }

        .comments-title {
            font-size: clamp(1.75rem, 4vw, 2.5rem);
            font-weight: 800;
            background: linear-gradient(135deg, #1e3a8a 0%, #7c3aed 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 40px;
            text-align: center;
            letter-spacing: -0.02em;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .comments-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #7c3aed, #a78bfa);
            border-radius: 2px;
            margin: 12px auto 0;
        }

        /* Success Message */
        .success-message {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.08) 0%, rgba(167, 139, 250, 0.08) 100%);
            border-left: 5px solid #7c3aed;
            color: #1e3a8a;
            padding: 18px 24px;
            border-radius: 14px;
            margin-bottom: 35px;
            font-weight: 600;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideInDown 0.5s ease-out;
            box-shadow: 0 4px 16px rgba(124, 58, 237, 0.1);
        }

        .success-message::before {
            content: '✓';
            display: flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            background: #7c3aed;
            color: white;
            border-radius: 50%;
            font-weight: bold;
            flex-shrink: 0;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Comment Form */
        .comment-form {
            display: flex;
            flex-direction: column;
            gap: 24px;
            margin-bottom: 60px;
            padding: 30px;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 20px;
            border: 2px solid #e2e8f0;
        }

        .comment-form input,
        .comment-form textarea {
            width: 100%;
            padding: 18px 22px;
            border: 2px solid #e2e8f0;
            border-radius: 14px;
            font-size: 1rem;
            font-family: inherit;
            background: #ffffff;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            color: #1e293b;
        }

        .comment-form input::placeholder,
        .comment-form textarea::placeholder {
            color: #94a3b8;
        }

        .comment-form input:focus,
        .comment-form textarea:focus {
            outline: none;
            border-color: #7c3aed;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.12), 0 4px 16px rgba(124, 58, 237, 0.08);
            transform: translateY(-1px);
        }

        .comment-form textarea {
            resize: vertical;
            min-height: 140px;
            line-height: 1.6;
        }

        .comment-submit {
            padding: 18px 40px;
            background: linear-gradient(135deg, #1e3a8a 0%, #7c3aed 100%);
            color: #ffffff;
            border: none;
            border-radius: 14px;
            font-size: 1.05rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 20px rgba(124, 58, 237, 0.25);
            align-self: flex-start;
            position: relative;
            overflow: hidden;
        }

        .comment-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .comment-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(124, 58, 237, 0.35);
            background: linear-gradient(135deg, #7c3aed 0%, #a78bfa 100%);
        }

        .comment-submit:hover::before {
            left: 100%;
        }

        .comment-submit:active {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(124, 58, 237, 0.3);
        }

        /* Comments List */
        .comments-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .comment-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            padding: 28px;
            border-radius: 18px;
            border: 2px solid #e2e8f0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .comment-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(180deg, #7c3aed 0%, #1e3a8a 100%);
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .comment-card:hover {
            border-color: #c4b5fd;
            box-shadow: 0 12px 32px rgba(124, 58, 237, 0.15);
            transform: translateX(6px);
            background: linear-gradient(135deg, #ffffff 0%, #faf5ff 100%);
        }

        .comment-card:hover::before {
            width: 8px;
        }

        .comment-author {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #1e3a8a;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .comment-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #7c3aed 0%, #a78bfa 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 1.1rem;
            box-shadow: 0 6px 18px rgba(124, 58, 237, 0.35);
            flex-shrink: 0;
        }


        .comment-message {
            color: #334155;
            line-height: 1.75;
            margin-bottom: 14px;
            font-size: 1.02rem;
            padding-left: 46px;
        }

        .comment-time {
            color: #64748b;
            font-size: 0.9rem;
            font-style: italic;
            padding-left: 46px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .comment-time::before {
            content: '🕒';
            font-size: 0.85rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .comments-section-wrapper {
                padding: 50px 15px;
            }

            .comments-wrapper {
                padding: 30px 20px;
                border-radius: 22px;
            }

            .comment-form {
                padding: 24px 18px;
            }

            .comment-submit {
                width: 100%;
                justify-content: center;
            }

            .comment-card {
                padding: 22px 18px;
            }

            .comment-author::before {
                width: 32px;
                height: 32px;
            }

            .comment-message,
            .comment-time {
                padding-left: 42px;
            }
        }

        @media (max-width: 480px) {
            .comments-section-wrapper {
                padding: 40px 10px;
            }

            .comments-wrapper {
                padding: 25px 15px;
                border-radius: 18px;
            }

            .comments-title {
                font-size: 1.5rem;
                gap: 8px;
            }

            .comment-form {
                padding: 20px 15px;
                gap: 18px;
            }

            .comment-form input,
            .comment-form textarea {
                padding: 15px 18px;
                font-size: 0.95rem;
            }

            .comment-submit {
                padding: 16px 32px;
                font-size: 1rem;
            }

            .comment-card {
                padding: 20px 15px;
            }

            .comment-author {
                font-size: 1rem;
                flex-wrap: wrap;
            }

            .comment-message {
                font-size: 0.95rem;
                padding-left: 0;
                margin-top: 10px;
            }

            .comment-time {
                font-size: 0.85rem;
                padding-left: 0;
            }

            .comment-author::before,
            .comment-author::after {
                display: none;
            }
        }

        /* Smooth Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .comment-card {
            animation: fadeInUp 0.5s ease-out backwards;
        }

        .comment-card:nth-child(1) { animation-delay: 0.05s; }
        .comment-card:nth-child(2) { animation-delay: 0.1s; }
        .comment-card:nth-child(3) { animation-delay: 0.15s; }
        .comment-card:nth-child(4) { animation-delay: 0.2s; }
        .comment-card:nth-child(5) { animation-delay: 0.25s; }
    </style>
@endpush

@section('content')

    @php
        $locale = app()->getLocale();
        $dbLocale = $locale === 'ky' ? 'kg' : $locale;
    @endphp


    {{-- ================= HERO ================= --}}
    <section class="hero hero-events">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>{{ $event->{'title_'.$dbLocale} ?? $event->title_en }}</h1>

        </div>
    </section>

    {{-- ================= CONTENT ================= --}}
    <section class="event-detail">
        <div class="container">
            {{-- DATE --}}
            <p>{{ optional($event->published_at)->translatedFormat('F d, Y') }}</p>

            {{-- IMAGE --}}
            @if($event->image_path)
                <img src="{{ asset('storage/'.$event->image_path) }}" alt="{{ $event->title }}">
            @endif

            {{-- CONTENT --}}
            <div>
                {!! nl2br(e($event->{'content_'.$dbLocale} ?? $event->content_en)) !!}

            </div>

            {{-- BACK --}}
            <div style="text-align:center;">
                <a href="{{ route('events') }}">← {{ __('comments.back') }}</a>
            </div>
        </div>
    </section>

    {{-- ================= COMMENTS ================= --}}
    <div class="comments-section-wrapper">
        <div class="comments-container">
            <div class="comments-wrapper">
                <h3 class="comments-title">💬 {{ __('comments.title') }}</h3>

                {{-- SUCCESS --}}
                @if(session('success'))
                    <div class="success-message">
                        {{ __('comments.success') }}
                    </div>
                @endif

                {{-- FORM --}}
                <form method="POST" action="{{ route('news.comment.store', $event->slug) }}" class="comment-form">
                    @csrf
                    <input type="text" name="name" placeholder="{{ __('comments.name') }}" required>
                    <textarea name="message" placeholder="{{ __('comments.message') }}" rows="4" required></textarea>
                    <button type="submit" class="comment-submit">{{ __('comments.send') }}</button>
                </form>

                {{-- COMMENTS LIST --}}
                @if($event->comments && $event->comments->count())
                    <div class="comments-list">
                        @foreach($event->comments->where('is_approved', true) as $comment)
                            <div class="comment-card">
                                <b class="comment-author">
                                    <span class="comment-avatar">👤</span>
                                    {{ $comment->name }}
                                </b>

                                <p class="comment-message">{{ $comment->message }}</p>
                                <small class="comment-time">{{ $comment->created_at->diffForHumans() }}</small>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
