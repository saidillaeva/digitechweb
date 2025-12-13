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
            padding: 2rem;
            border-radius: 16px;
            margin-bottom: 2rem;
            border: 2px solid rgba(139, 122, 184, 0.2);
        }

        .page-header h4 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--deep-blue);
            margin: 0;
        }

        .btn-add {
            background: linear-gradient(135deg, var(--primary-purple), var(--accent-purple)) !important;
            border: none !important;
            color: white !important;
            font-weight: 600;
            padding: 0.65rem 1.75rem;
            border-radius: 12px;
            transition: all .3s ease;
            box-shadow: 0 4px 15px rgba(91, 75, 138, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(91, 75, 138, 0.4);
        }

        /* Table Card */
        .card {
            border-radius: 16px !important;
            overflow: hidden;
            border: 2px solid rgba(139, 122, 184, 0.1) !important;
        }

        /* Table Styling */
        .table {
            margin-bottom: 0 !important;
        }

        .table thead {
            background: linear-gradient(135deg, var(--deep-blue), var(--dark-purple)) !important;
        }

        .table thead th {
            color: #023477 !important;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.95rem;
            padding: 1.25rem 1rem;
            border: none !important;
        }

        .table tbody tr {
            transition: all .3s ease;
            border-bottom: 1px solid rgba(139, 122, 184, 0.1);
        }

        .table tbody tr:hover {
            background: linear-gradient(135deg, rgba(91, 75, 138, 0.05), rgba(139, 122, 184, 0.08));
            transform: scale(1.01);
        }

        .table tbody td {
            padding: 1.25rem 1rem;
            vertical-align: middle;
            color: var(--deep-blue);
        }

        .table tbody td.fw-semibold {
            font-weight: 600;
            color: var(--deep-blue);
            font-size: 1rem;
        }

        /* Image Styling */
        .table img {
            height: 48px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(91, 75, 138, 0.2);
            transition: transform .3s ease;
        }

        .table img:hover {
            transform: scale(1.15);
        }

        /* Action Buttons */
        .btn-outline-dark {
            border: 2px solid var(--primary-purple) !important;
            color: var(--primary-purple) !important;
            font-weight: 600;
            border-radius: 8px;
            padding: 0.4rem 1rem;
            transition: all .3s ease;
        }

        .btn-outline-dark:hover {
            background: var(--primary-purple) !important;
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(91, 75, 138, 0.3);
        }

        .btn-outline-danger {
            border: 2px solid #dc2626 !important;
            color: #dc2626 !important;
            font-weight: 600;
            border-radius: 8px;
            padding: 0.4rem 1rem;
            transition: all .3s ease;
        }

        .btn-outline-danger:hover {
            background: #dc2626 !important;
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
        }

        /* Pagination */
        .pagination {
            margin-top: 2rem;
        }

        .pagination .page-link {
            color: var(--primary-purple);
            border: 2px solid rgba(139, 122, 184, 0.2);
            border-radius: 8px;
            margin: 0 4px;
            font-weight: 600;
            transition: all .3s ease;
        }

        .pagination .page-link:hover {
            background: var(--primary-purple);
            color: white;
            border-color: var(--primary-purple);
            transform: translateY(-2px);
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary-purple), var(--accent-purple));
            border-color: var(--primary-purple);
            box-shadow: 0 4px 15px rgba(91, 75, 138, 0.3);
        }
    </style>

    <div class="page-header d-flex justify-content-between align-items-center">
        <h4>📰 News Management</h4>
        <a class="btn btn-add" href="{{ route('admin.news.create') }}">+ Add News</a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $n)
                    <tr>
                        <td class="fw-semibold">{{ $n->title }}</td>
                        <td>{{ optional($n->published_at)->format('Y-m-d') }}</td>
                        <td>
                            @if($n->image_path)
                                <img src="{{ asset('storage/'.$n->image_path) }}" alt="News image">
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('admin.news.edit',$n) }}">Edit</a>

                            <form class="d-inline" method="POST" action="{{ route('admin.news.destroy',$n) }}"
                                  onsubmit="return confirm('Delete this news?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $items->links() }}</div>
@endsection
