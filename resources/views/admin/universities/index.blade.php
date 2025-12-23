@extends('admin.layout')

@section('content')
    <style>
        :root {
            --deep-blue: #1e40af;
            --dark-blue: #1e3a8a;
            --primary-purple: #7c3aed;
            --accent-purple: #a855f7;
            --dark-purple: #6d28d9;
        }

        .universities-wrapper {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2.5rem 1rem;
            background-size: 200% 200%;
            animation: gradientFlow 15s ease infinite;
            min-height: 100vh;
        }

        @keyframes gradientFlow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        /* Page Header */
        .universities-page-header {
            background: linear-gradient(
                135deg,
                rgba(255, 255, 255, 0.98) 0%,
                rgba(250, 245, 255, 0.98) 100%
            );
            padding: 2.5rem 3rem;
            border-radius: 20px;
            margin-bottom: 2.5rem;
            border: 2px solid rgba(139, 92, 246, 0.2);
            position: relative;
            overflow: hidden;
            box-shadow:
                0 20px 60px rgba(79, 70, 229, 0.25),
                0 0 0 1px rgba(139, 92, 246, 0.1);
        }

        .universities-page-header::before {
            content: '🎓';
            position: absolute;
            right: 2rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 6rem;
            opacity: 0.08;
            animation: floatIcon 4s ease-in-out infinite;
        }

        @keyframes floatIcon {
            0%, 100% { transform: translateY(-50%) rotate(-5deg); }
            50% { transform: translateY(-60%) rotate(5deg); }
        }

        .universities-page-header h4 {
            font-size: 2.25rem;
            font-weight: 800;
            background: linear-gradient(135deg, #1e40af 0%, #7c3aed 60%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
            position: relative;
            z-index: 1;
            letter-spacing: -0.02em;
        }

        /* Grid Container */
        .universities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.75rem;
        }

        /* University Card */
        .university-card {
            background: rgba(255, 255, 255, 0.98);
            border: 2px solid rgba(139, 92, 246, 0.15);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow:
                0 10px 30px rgba(79, 70, 229, 0.15),
                0 0 0 1px rgba(139, 92, 246, 0.05);
            position: relative;
            backdrop-filter: blur(10px);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .university-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #1e40af 0%, #7c3aed 50%, #a855f7 100%);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .university-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow:
                0 20px 50px rgba(79, 70, 229, 0.3),
                0 0 0 1px rgba(139, 92, 246, 0.2);
            border-color: rgba(139, 92, 246, 0.4);
        }

        .university-card:hover::before {
            transform: scaleX(1);
        }

        /* Card Body */
        .university-card-body {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            position: relative;
        }

        /* Decorative Icon */
        .university-card-icon {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            font-size: 3rem;
            opacity: 0.08;
            transition: all 0.4s ease;
            pointer-events: none;
        }

        .university-card:hover .university-card-icon {
            opacity: 0.15;
            transform: scale(1.2) rotate(10deg);
        }

        /* University Name */
        .university-name {
            font-size: 1.375rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1rem;
            line-height: 1.4;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .university-card:hover .university-name {
            color: #7c3aed;
        }

        /* Links Count Badge */
        .university-links-count {
            display: inline-flex;
            align-items: center;
            gap: 0.625rem;
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, rgba(30, 64, 175, 0.08), rgba(124, 58, 237, 0.08));
            border: 1px solid rgba(124, 58, 237, 0.2);
            border-radius: 10px;
            font-size: 0.9375rem;
            font-weight: 600;
            color: #7c3aed;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            width: fit-content;
        }

        .university-links-count::before {
            content: '🔗';
            font-size: 1.125rem;
        }

        .university-card:hover .university-links-count {
            background: linear-gradient(135deg, rgba(30, 64, 175, 0.12), rgba(124, 58, 237, 0.12));
            border-color: rgba(124, 58, 237, 0.3);
            transform: scale(1.05);
        }

        /* Manage Button */
        .university-manage-btn {
            margin-top: auto;
            padding: 1rem 1.5rem;
            font-size: 0.9375rem;
            font-weight: 700;
            color: #7c3aed;
            background: #ffffff;
            border: 2px solid #7c3aed;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.625rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .university-manage-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%);
            transition: width 0.4s ease;
            z-index: -1;
        }

        .university-manage-btn:hover {
            color: #ffffff;
            border-color: #7c3aed;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(124, 58, 237, 0.3);
        }

        .university-manage-btn:hover::before {
            width: 100%;
        }

        .university-manage-btn::after {
            content: '→';
            font-size: 1.25rem;
            transition: transform 0.3s ease;
        }

        .university-manage-btn:hover::after {
            transform: translateX(4px);
        }

        /* Empty State */
        .universities-empty-state {
            background: rgba(255, 255, 255, 0.98);
            border: 2px dashed rgba(139, 92, 246, 0.3);
            border-radius: 20px;
            padding: 5rem 2rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(79, 70, 229, 0.1);
        }

        .universities-empty-state::before {
            content: '🎓';
            display: block;
            font-size: 5rem;
            margin-bottom: 1.5rem;
            opacity: 0.3;
            animation: floatIcon 3s ease-in-out infinite;
        }

        .universities-empty-state p {
            color: #7c3aed;
            font-size: 1.25rem;
            font-weight: 600;
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .universities-wrapper {
                padding: 1.5rem 1rem;
            }

            .universities-page-header {
                padding: 2rem 1.5rem;
            }

            .universities-page-header h4 {
                font-size: 1.75rem;
            }

            .universities-page-header::before {
                display: none;
            }

            .universities-grid {
                grid-template-columns: 1fr;
                gap: 1.25rem;
            }

            .university-card-body {
                padding: 1.5rem;
            }

            .university-name {
                font-size: 1.125rem;
            }
        }

        @media (min-width: 769px) and (max-width: 1024px) {
            .universities-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>

    <div class="universities-wrapper">
        <div class="universities-page-header">
            <h4>{{ __('admin_universities.index.title') }}</h4>
        </div>

        @if(count($universities) > 0)
            <div class="universities-grid">
                @foreach($universities as $key => $u)
                    <div class="university-card">
                        <div class="university-card-body">
                            <div class="university-card-icon">🎓</div>

                            <div class="university-name">
                                {{ $u['name'] }}
                            </div>

                            <div class="university-links-count">
                                {{ __('admin_universities.index.links', [
                                    'count' => count($links[$key]['events'] ?? [])
                                ]) }}
                            </div>

                            <a class="university-manage-btn"
                               href="{{ route('admin.universities.edit', $key) }}">
                                {{ __('admin_universities.index.manage_links') }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="universities-empty-state">
                <p>{{ __('admin_universities.index.empty') }}</p>
            </div>
        @endif
    </div>
@endsection
