@extends('admin.layout')

@section('content')
    @php
        $lang = app()->getLocale();
        $titleField = 'title_' . $lang;
    @endphp

    <style>
        :root {
            --deep-blue: #1e40af;
            --dark-blue: #1e3a8a;
            --primary-purple: #7c3aed;
            --accent-purple: #a855f7;
            --dark-purple: #6d28d9;
        }

        .docs-wrapper {
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
        .docs-page-header {
            background: #ffffff;
            padding: 2.5rem 3rem;
            border-radius: 20px;
            margin-bottom: 2rem;
            border: 2px solid rgba(139, 92, 246, 0.2);
            position: relative;
            overflow: hidden;
            box-shadow:
                0 20px 60px rgba(79, 70, 229, 0.25),
                0 0 0 1px rgba(139, 92, 246, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .docs-page-header::before {
            content: '📄';
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

        .docs-page-header h4 {
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
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .docs-btn-add {
            background: linear-gradient(135deg, var(--primary-purple), var(--accent-purple));
            color: #fff;
            font-weight: 700;
            padding: 1rem 2rem;
            border-radius: 12px;
            border: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.625rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 16px rgba(124, 58, 237, 0.4);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-size: 0.9375rem;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .docs-btn-add::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
            z-index: -1;
        }

        .docs-btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(124, 58, 237, 0.5);
            color: #fff;
        }

        .docs-btn-add:hover::before {
            left: 100%;
        }

        /* Card */
        .docs-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 20px;
            border: 2px solid rgba(139, 92, 246, 0.15);
            overflow: hidden;
            box-shadow:
                0 20px 60px rgba(79, 70, 229, 0.25),
                0 0 0 1px rgba(139, 92, 246, 0.1);
            backdrop-filter: blur(10px);
        }

        /* Table */
        .docs-table {
            width: 100%;
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .docs-table thead {
            background: linear-gradient(135deg, #2a1587 0%, #635baf 50%, #7c3aed 100%);
            position: relative;
        }

        .docs-table thead::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg,
            transparent 0%,
            rgba(168, 85, 247, 0.5) 50%,
            transparent 100%);
        }

        .docs-table thead th {
            color: #ffffff;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.8125rem;
            letter-spacing: 0.1em;
            padding: 1.25rem 1.5rem;
            border: none;
            white-space: nowrap;
        }

        .docs-table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
        }

        .docs-table tbody tr:hover {
            background: linear-gradient(90deg,
            rgba(250, 245, 255, 0.5) 0%,
            rgba(243, 232, 255, 0.8) 50%,
            rgba(250, 245, 255, 0.5) 100%);
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.15);
        }

        .docs-table tbody td {
            padding: 1.25rem 1.5rem;
            color: #1e293b;
            font-size: 0.9375rem;
            vertical-align: middle;
        }

        .docs-table tbody tr:last-child {
            border-bottom: none;
        }

        .docs-title-cell {
            font-weight: 600;
            color: #1e293b;
            max-width: 350px;
        }

        .docs-group-badge {
            display: inline-block;
            padding: 0.375rem 0.875rem;
            background: linear-gradient(135deg, rgba(30, 64, 175, 0.1), rgba(124, 58, 237, 0.1));
            color: #7c3aed;
            border-radius: 8px;
            font-size: 0.8125rem;
            font-weight: 600;
            border: 1px solid rgba(124, 58, 237, 0.2);
        }

        .docs-period-text {
            color: #64748b;
            font-size: 0.875rem;
        }

        .docs-file-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #7c3aed;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.875rem;
            padding: 0.5rem 1rem;
            background: rgba(124, 58, 237, 0.08);
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .docs-file-link:hover {
            background: rgba(124, 58, 237, 0.15);
            color: #6d28d9;
            transform: translateX(3px);
        }

        .docs-file-link::before {
            content: '📎';
            font-size: 1rem;
        }

        /* Action Buttons */
        .docs-actions {
            display: flex;
            gap: 0.5rem;
            justify-content: flex-end;
            align-items: center;
        }

        .docs-btn-edit {
            padding: 0.5rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #7c3aed;
            background: #ffffff;
            border: 1.5px solid #7c3aed;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .docs-btn-edit:hover {
            background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);
            border-color: #6d28d9;
            color: #6d28d9;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.2);
        }

        .docs-btn-delete {
            padding: 0.5rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #dc2626;
            background: #ffffff;
            border: 1.5px solid #dc2626;
            border-radius: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .docs-btn-delete:hover {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            border-color: #b91c1c;
            color: #b91c1c;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.2);
        }

        .docs-delete-form {
            display: inline;
            margin: 0;
        }

        /* Empty State */
        .docs-empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #64748b;
        }

        .docs-empty-state::before {
            content: '📄';
            display: block;
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.3;
        }

        .docs-empty-state-text {
            font-size: 1.125rem;
            font-weight: 500;
            color: #64748b;
        }

        /* Pagination */
        .docs-pagination {
            margin-top: 2rem;
            display: flex;
            justify-content: center;
        }

        .docs-pagination nav {
            background: rgba(255, 255, 255, 0.98);
            padding: 1rem 1.5rem;
            border-radius: 12px;
            border: 2px solid rgba(139, 92, 246, 0.15);
            box-shadow: 0 4px 16px rgba(79, 70, 229, 0.15);
        }

        @media (max-width: 768px) {
            .docs-wrapper {
                padding: 1.5rem 1rem;
            }

            .docs-page-header {
                flex-direction: column;
                gap: 1.5rem;
                padding: 2rem 1.5rem;
                text-align: center;
            }

            .docs-page-header h4 {
                font-size: 1.75rem;
            }

            .docs-page-header::before {
                display: none;
            }

            .docs-btn-add {
                width: 100%;
                justify-content: center;
            }

            .docs-table {
                font-size: 0.875rem;
            }

            .docs-table thead th,
            .docs-table tbody td {
                padding: 1rem;
            }

            .docs-actions {
                flex-direction: column;
                gap: 0.5rem;
            }

            .docs-btn-edit,
            .docs-btn-delete {
                width: 100%;
            }
        }
    </style>

    <div class="docs-wrapper">

        <div class="docs-page-header">
            <h4>{{ __('admin_documents.index.title') }}</h4>

            <a class="docs-btn-add"
               href="{{ route('admin.documents.create') }}">
                + {{ __('admin_documents.index.add') }}
            </a>
        </div>

        <div class="docs-card">
            <table class="docs-table">
                <thead>
                <tr>
                    <th>{{ __('admin_documents.index.table_title') }}</th>
                    <th>{{ __('admin_documents.index.table_group') }}</th>
                    <th>{{ __('admin_documents.index.table_period') }}</th>
                    <th>{{ __('admin_documents.index.table_file') }}</th>
                    <th style="text-align:right">
                        {{ __('admin_documents.index.table_actions') }}
                    </th>
                </tr>
                </thead>

                <tbody>
                @forelse($items as $d)
                    <tr>
                        <td class="docs-title-cell">
                            {{ $d->$titleField ?? $d->title_ru }}
                        </td>

                        <td>
                        <span class="docs-group-badge">
                            {{ __( \App\Models\Document::groups()[$d->doc_group] ?? $d->doc_group ) }}
                        </span>
                        </td>

                        <td class="docs-period-text">
                            {{ $d->period
                                ? __( \App\Models\Document::periods()[$d->period] )
                                : '—' }}
                        </td>

                        <td>
                            <a class="docs-file-link"
                               href="{{ asset('storage/'.$d->file_path) }}"
                               target="_blank">
                                {{ __('admin_documents.actions.open') }}
                            </a>
                        </td>

                        <td>
                            <div class="docs-actions">
                                <a class="docs-btn-edit"
                                   href="{{ route('admin.documents.edit', $d) }}">
                                    {{ __('common.edit') }}
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.documents.destroy', $d) }}"
                                      onsubmit="return confirm('{{ __('common.confirm_delete') }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="docs-btn-delete">
                                        {{ __('common.delete') }}
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="docs-empty-state">
                            {{ __('admin_documents.index.empty') }}
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="docs-pagination">
            {{ $items->links() }}
        </div>
    </div>
@endsection
