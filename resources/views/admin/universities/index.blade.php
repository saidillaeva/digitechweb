@extends('admin.layout')

@section('content')
    <style>
        /* Page Header */
        .page-header {
            background: linear-gradient(
                135deg,
                rgba(91, 75, 138, 0.12),     /* фиолетовый */
                rgba(56, 189, 248, 0.18)    /* голубой */
            );
            border: 2px solid rgba(56, 189, 248, 0.35);
            padding: 2rem;
            border-radius: 16px;
            margin-bottom: 2.5rem;
        }

        .page-header h4 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--deep-blue);
            margin: 0;
        }

        /* University Cards Grid */
        .row.g-3 {
            gap: 1.5rem !important;
        }

        /* University Card */
        .university-card {
            border: 2px solid rgba(139, 122, 184, 0.15) !important;
            border-radius: 16px !important;
            overflow: hidden;
            transition: all .35s cubic-bezier(0.4, 0, 0.2, 1);
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(91, 75, 138, 0.1) !important;
            position: relative;
        }

        .university-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(
                90deg,
                var(--primary-purple),
                #38bdf8   /* голубой */
            );
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .35s ease;
        }

        .university-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 40px rgba(37, 99, 235, 0.25);
            border-color: var(--light-purple) !important;
        }

        .university-card:hover::before {
            transform: scaleX(1);
        }

        .university-card .card-body {
            padding: 2rem !important;
            position: relative;
        }

        /* University Icon */
        .university-card::after {
            content: '🎓';
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            font-size: 2.5rem;
            opacity: 0.15;
            transition: all .35s ease;
        }

        .university-card:hover::after {
            opacity: 0.3;
            transform: scale(1.2) rotate(10deg);
        }

        /* University Name */
        .university-card .fw-semibold {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--deep-blue);
            margin-bottom: 0.75rem;
            line-height: 1.4;
            transition: color .3s ease;
        }

        .university-card:hover .fw-semibold {
            color: var(--primary-purple);
        }

        /* Links Count */
        .university-card .text-muted {
            font-size: 0.95rem;
            color: var(--accent-purple) !important;
            font-weight: 500;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .university-card .text-muted::before {
            content: '🔗';
            font-size: 1.1rem;
        }

        /* Manage Button */
        .btn-manage {
            border: 2px solid var(--primary-purple) !important;
            color: var(--primary-purple) !important;
            background: transparent !important;
            font-weight: 600;
            border-radius: 10px;
            padding: 0.6rem 1.5rem;
            transition: all .3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.85rem;
            width: 100%;
        }

        .btn-manage:hover {
            background: linear-gradient(135deg, var(--primary-purple), var(--accent-purple)) !important;
            color: white !important;
            border-color: transparent !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(91, 75, 138, 0.3);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: linear-gradient(135deg, rgba(232, 227, 243, 0.3), rgba(232, 227, 243, 0.5));
            border-radius: 20px;
            border: 2px dashed var(--light-purple);
        }

        .empty-state::before {
            content: '🎓';
            display: block;
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .empty-state p {
            color: var(--primary-purple);
            font-size: 1.1rem;
            font-weight: 500;
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header h4 {
                font-size: 1.5rem;
            }

            .university-card .card-body {
                padding: 1.5rem !important;
            }
        }
    </style>

    <div class="page-header">
        <h4>🎓 Universities Management</h4>
    </div>

    @if(count($universities) > 0)
        <div class="row g-4">
            @foreach($universities as $key => $name)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm university-card h-100">
                        <div class="card-body d-flex flex-column">
                            <div class="fw-semibold">{{ $name }}</div>

                            <div class="text-muted small mb-3">
                                {{ count($links[$key]['events'] ?? []) }} Links
                            </div>

                            <a class="btn btn-outline-dark btn-sm btn-manage mt-auto"
                               href="{{ route('admin.universities.edit',$key) }}">
                                Manage Links
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    @else
        <div class="empty-state">
            <p>No universities available</p>
        </div>
    @endif
@endsection
