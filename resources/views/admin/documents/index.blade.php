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

        .page-header::before {
            content: '📄';
            position: absolute;
            right: 2rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 4rem;
            opacity: 0.1;
        }

        .page-header h4 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--deep-blue) !important;
            margin: 0;
            position: relative;
            z-index: 1;
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
            position: relative;
            z-index: 1;
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
            background: white !important;
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

        .table tbody tr:last-child {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background: linear-gradient(135deg, rgba(91, 75, 138, 0.05), rgba(139, 122, 184, 0.08));
            transform: scale(1.005);
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

        /* Group and Period Badges */
        .table tbody td:nth-child(2),
        .table tbody td:nth-child(3) {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--primary-purple);
        }

        /* File Link */
        .table a[target="_blank"] {
            color: var(--accent-purple);
            font-weight: 600;
            text-decoration: none;
            transition: all .3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 0.4rem 1rem;
            background: linear-gradient(135deg, rgba(91, 75, 138, 0.08), rgba(139, 122, 184, 0.1));
            border-radius: 8px;
            border: 1px solid rgba(139, 122, 184, 0.2);
        }

        .table a[target="_blank"]:hover {
            background: linear-gradient(135deg, var(--primary-purple), var(--accent-purple));
            color: white;
            transform: translateX(4px);
            box-shadow: 0 4px 15px rgba(91, 75, 138, 0.3);
        }

        .table a[target="_blank"]::after {
            content: '↗';
            font-size: 1.1rem;
        }

        /* Action Buttons */
        .btn-outline-dark {
            border: 2px solid var(--primary-purple) !important;
            color: var(--primary-purple) !important;
            background: transparent !important;
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
            background: transparent !important;
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

        /* Action buttons container */
        .text-end {
            white-space: nowrap;
        }

        /* Pagination */
        .pagination {
            margin-top: 2rem;
            justify-content: center;
        }

        .pagination .page-link {
            color: var(--primary-purple);
            border: 2px solid rgba(139, 122, 184, 0.2);
            border-radius: 8px;
            margin: 0 4px;
            font-weight: 600;
            transition: all .3s ease;
            background: white;
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

        .pagination .page-item.disabled .page-link {
            opacity: 0.5;
            background: white;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: linear-gradient(135deg, rgba(232, 227, 243, 0.3), rgba(232, 227, 243, 0.5));
            border-radius: 20px;
            border: 2px dashed var(--light-purple);
            margin-top: 2rem;
        }

        .empty-state::before {
            content: '📄';
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
    </style>

    <div class="page-header d-flex justify-content-between align-items-center">
        <h4>📄 Documents Management</h4>
        <a class="btn btn-add" href="{{ route('admin.documents.create') }}">+ Upload Document</a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Group</th>
                    <th>Period</th>
                    <th>File</th>
                    <th class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($items as $d)
                    <tr>
                        <td class="fw-semibold">{{ $d->title }}</td>
                        <td>{{ \App\Models\Document::groups()[$d->doc_group] ?? $d->doc_group }}</td>
                        <td>{{ \App\Models\Document::periods()[$d->period] ?? '—' }}</td>
                        <td>
                            <a href="{{ asset('storage/'.$d->file_path) }}" target="_blank">open</a>
                        </td>
                        <td class="text-end">
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('admin.documents.edit',$d) }}">Edit</a>
                            <form class="d-inline" method="POST" action="{{ route('admin.documents.destroy',$d) }}"
                                  onsubmit="return confirm('Delete this document?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div style="color: var(--primary-purple); font-size: 1.1rem;">
                                📄 No documents uploaded yet
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $items->links() }}</div>
@endsection
