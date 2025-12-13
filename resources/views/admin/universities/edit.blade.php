@extends('admin.layout')

@section('content')
    <style>
        /* Page Title */
        .page-title-wrapper {
            background: linear-gradient(135deg, var(--deep-blue), var(--dark-purple));
            padding: 2.5rem;
            border-radius: 18px;
            margin-bottom: 2.5rem;
            box-shadow: 0 8px 30px rgba(91, 75, 138, 0.3);
            position: relative;
            overflow: hidden;
        }

        .page-title-wrapper::before {
            content: '🎓';
            position: absolute;
            right: 2rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 5rem;
            opacity: 0.15;
        }

        .page-title-wrapper h4 {
            font-size: 2rem;
            font-weight: 700;
            color: white;
            margin: 0;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 1;
        }

        /* Add New Link Card */
        .add-card {
            background: linear-gradient(135deg, rgba(91, 75, 138, 0.08), rgba(139, 122, 184, 0.12));
            border: 2px solid var(--accent-purple) !important;
            border-radius: 16px !important;
            box-shadow: 0 4px 20px rgba(91, 75, 138, 0.15) !important;
            margin-bottom: 2rem !important;
        }

        .add-card .card-body {
            padding: 2rem !important;
        }

        .add-card h6 {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--deep-blue);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Form Labels */
        .form-label {
            font-weight: 600;
            color: var(--deep-blue);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Form Inputs */
        .form-control {
            border: 2px solid rgba(139, 122, 184, 0.3);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all .3s ease;
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: var(--accent-purple);
            box-shadow: 0 0 0 4px rgba(139, 122, 184, 0.1);
            outline: none;
        }

        /* Add Button */
        .btn-add {
            background: linear-gradient(135deg, #1059b9, #054496) !important;
            border: none !important;
            color: white !important;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            transition: all .3s ease;
            box-shadow: 0 4px 15px rgba(16, 70, 185, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 55, 185, 0.4);
        }

        /* Link Cards */
        .link-card {
            border: 2px solid rgba(139, 122, 184, 0.2) !important;
            border-radius: 16px !important;
            background: white;
            box-shadow: 0 4px 20px rgba(91, 75, 138, 0.1) !important;
            margin-bottom: 1.5rem !important;
            transition: all .3s ease;
            position: relative;
        }

        .link-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 5px;
            background: linear-gradient(180deg, var(--primary-purple), var(--accent-purple));
            border-radius: 16px 0 0 16px;
            opacity: 0;
            transition: opacity .3s ease;
        }

        .link-card:hover {
            transform: translateX(8px);
            box-shadow: 0 8px 30px rgba(91, 75, 138, 0.2) !important;
            border-color: var(--light-purple) !important;
        }

        .link-card:hover::before {
            opacity: 1;
        }

        .link-card .card-body {
            padding: 2rem !important;
        }

        /* Link Card Number */
        .link-card::after {
            content: '🔗';
            position: absolute;
            right: 2rem;
            top: 2rem;
            font-size: 2rem;
            opacity: 0.1;
            transition: all .3s ease;
        }

        .link-card:hover::after {
            opacity: 0.25;
            transform: rotate(15deg) scale(1.2);
        }

        /* Save Button */
        .btn-save {
            background: linear-gradient(135deg, var(--primary-purple), var(--accent-purple)) !important;
            border: none !important;
            color: white !important;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            transition: all .3s ease;
            box-shadow: 0 4px 15px rgba(41, 67, 151, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(22, 67, 163, 0.4);
        }

        /* Delete Button */
        .btn-delete {
            border: 2px solid #dc2626 !important;
            color: #dc2626 !important;
            background: transparent !important;
            font-weight: 600;
            border-radius: 10px;
            padding: 0.5rem 1.25rem;
            transition: all .3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.85rem;
        }

        .btn-delete:hover {
            background: #dc2626 !important;
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
        }

        /* Back Button */
        .btn-back {
            border: 2px solid var(--primary-purple) !important;
            color: var(--primary-purple) !important;
            background: white !important;
            font-weight: 600;
            border-radius: 10px;
            padding: 0.75rem 2rem;
            transition: all .3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-back:hover {
            background: linear-gradient(135deg, var(--primary-purple), var(--accent-purple)) !important;
            color: white !important;
            border-color: transparent !important;
            transform: translateX(-4px);
            box-shadow: 0 4px 15px rgba(91, 75, 138, 0.3);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: linear-gradient(135deg, rgba(232, 227, 243, 0.3), rgba(232, 227, 243, 0.5));
            border-radius: 20px;
            border: 2px dashed var(--light-purple);
            margin: 2rem 0;
        }

        .empty-state::before {
            content: '🔗';
            display: block;
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .empty-state p {
            color: var(--primary-purple);
            font-size: 1.2rem;
            font-weight: 500;
            margin: 0;
        }

        /* Form Row Spacing */
        .row.g-2 {
            margin-bottom: 0 !important;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-title-wrapper h4 {
                font-size: 1.5rem;
            }

            .page-title-wrapper {
                padding: 1.5rem;
            }

            .add-card .card-body,
            .link-card .card-body {
                padding: 1.5rem !important;
            }
        }
    </style>

    <div class="page-title-wrapper">
        <h4>Manage links: {{ $universities[$universityKey] }}</h4>
    </div>

    @php $events = $current['events'] ?? []; @endphp

    {{-- ================= ADD NEW LINK ================= --}}
    <div class="card border-0 shadow-sm add-card">
        <div class="card-body">
            <h6>➕ Add New Link</h6>

            <form method="POST"
                  action="{{ route('admin.universities.links.store', $universityKey) }}"
                  class="row g-3 align-items-end">
                @csrf

                <div class="col-md-4">
                    <label class="form-label">Title</label>
                    <input class="form-control" name="title" placeholder="Enter link title" required>
                </div>

                <div class="col-md-5">
                    <label class="form-label">URL</label>
                    <input class="form-control" name="url" placeholder="https://..." required>
                </div>

                <div class="col-md-3">
                    <button class="btn btn-add w-100">
                        ➕ Add Link
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- ================= LINKS LIST ================= --}}
    @forelse($events as $i => $e)
        <div class="card border-0 shadow-sm link-card">
            <div class="card-body">

                {{-- EDIT FORM --}}
                <form method="POST"
                      action="{{ route('admin.universities.links.update', [$universityKey, $i]) }}"
                      class="row g-3 align-items-end">
                    @csrf

                    <div class="col-md-4">
                        <label class="form-label">Title</label>
                        <input class="form-control"
                               name="title"
                               value="{{ $e['title'] }}"
                               required>
                    </div>

                    <div class="col-md-5">
                        <label class="form-label">URL</label>
                        <input class="form-control"
                               name="url"
                               value="{{ $e['url'] }}"
                               required>
                    </div>

                    <div class="col-md-3">
                        <button class="btn btn-save w-100">
                            💾 Save
                        </button>
                    </div>
                </form>

                {{-- DELETE FORM --}}
                <form method="POST"
                      action="{{ route('admin.universities.links.delete', [$universityKey, $i]) }}"
                      onsubmit="return confirm('Delete this link?')"
                      class="mt-3">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-delete">
                        🗑 Delete Link
                    </button>
                </form>

            </div>
        </div>
    @empty
        <div class="empty-state">
            <p>No links added yet. Add your first link above!</p>
        </div>
    @endforelse

    {{-- BACK BUTTON --}}
    <div class="mt-4">
        <a href="{{ route('admin.universities.index') }}"
           class="btn btn-back">
            ← Back to Universities
        </a>
    </div>
@endsection
