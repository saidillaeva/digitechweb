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

        .news-wrapper {
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
        .news-page-header {
            background: linear-gradient(
                135deg,
                rgba(255, 255, 255, 0.98) 0%,
                rgba(250, 245, 255, 0.98) 100%
            );
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

        .news-page-header::before {
            content: '📰';
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

        .news-page-header h4 {
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

        .news-btn-add {
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
        }

        .news-btn-add::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .news-btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(124, 58, 237, 0.5);
            color: #fff;
        }

        .news-btn-add:hover::before {
            left: 100%;
        }

        /* Card */
        .news-card {
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
        .news-table {
            width: 100%;
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .news-table thead {
            background: linear-gradient(135deg, #1e40af 0%, #6d28d9 50%, #7c3aed 100%);
            position: relative;
        }

        .news-table thead::after {
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

        .news-table thead th {
            color: #ffffff;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.8125rem;
            letter-spacing: 0.1em;
            padding: 1.25rem 1.5rem;
            border: none;
            white-space: nowrap;
        }

        .news-table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
        }

        .news-table tbody tr:hover {
            background: linear-gradient(90deg,
            rgba(250, 245, 255, 0.5) 0%,
            rgba(243, 232, 255, 0.8) 50%,
            rgba(250, 245, 255, 0.5) 100%);
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.15);
        }

        .news-table tbody td {
            padding: 1.25rem 1.5rem;
            color: #1e293b;
            font-size: 0.9375rem;
            vertical-align: middle;
        }

        .news-table tbody tr:last-child {
            border-bottom: none;
        }

        .news-title-cell {
            font-weight: 600;
            color: #1e293b;
            max-width: 400px;
            font-size: 1rem;
        }

        .news-date-cell {
            color: #64748b;
            font-size: 0.9375rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .news-date-cell::before {
            content: '📅';
            font-size: 1rem;
        }

        /* Image Styling */
        .news-image-wrapper {
            position: relative;
            display: inline-block;
        }

        .news-image {
            height: 60px;
            width: 90px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.2);
            transition: all 0.3s ease;
            border: 2px solid rgba(139, 92, 246, 0.15);
        }

        .news-image:hover {
            transform: scale(1.15);
            box-shadow: 0 8px 20px rgba(124, 58, 237, 0.35);
            border-color: rgba(139, 92, 246, 0.4);
        }

        .news-no-image {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 60px;
            width: 90px;
            background: linear-gradient(135deg, rgba(30, 64, 175, 0.08), rgba(124, 58, 237, 0.08));
            border: 2px dashed rgba(124, 58, 237, 0.3);
            border-radius: 12px;
            color: #a855f7;
            font-size: 1.5rem;
        }

        /* Action Buttons */
        .news-actions {
            display: flex;
            gap: 0.5rem;
            justify-content: flex-end;
            align-items: center;
        }

        .news-btn-edit {
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

        .news-btn-edit:hover {
            background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);
            border-color: #6d28d9;
            color: #6d28d9;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.2);
        }

        .news-btn-delete {
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

        .news-btn-delete:hover {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            border-color: #b91c1c;
            color: #b91c1c;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.2);
        }

        .news-delete-form {
            display: inline;
            margin: 0;
        }

        /* Empty State */
        .news-empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #64748b;
        }

        .news-empty-state::before {
            content: '📰';
            display: block;
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.3;
        }

        .news-empty-state-text {
            font-size: 1.125rem;
            font-weight: 500;
            color: #64748b;
        }

        /* Pagination */
        .news-pagination {
            margin-top: 2rem;
            display: flex;
            justify-content: center;
        }

        .news-pagination nav {
            background: rgba(255, 255, 255, 0.98);
            padding: 1rem 1.5rem;
            border-radius: 12px;
            border: 2px solid rgba(139, 92, 246, 0.15);
            box-shadow: 0 4px 16px rgba(79, 70, 229, 0.15);
        }

        @media (max-width: 768px) {
            .news-wrapper {
                padding: 1.5rem 1rem;
            }

            .news-page-header {
                flex-direction: column;
                gap: 1.5rem;
                padding: 2rem 1.5rem;
                text-align: center;
            }

            .news-page-header h4 {
                font-size: 1.75rem;
            }

            .news-page-header::before {
                display: none;
            }

            .news-btn-add {
                width: 100%;
                justify-content: center;
            }

            .news-table {
                font-size: 0.875rem;
            }

            .news-table thead th,
            .news-table tbody td {
                padding: 1rem;
            }

            .news-actions {
                flex-direction: column;
                gap: 0.5rem;
            }

            .news-btn-edit,
            .news-btn-delete {
                width: 100%;
            }
        }
    </style>

    <div class="news-wrapper">

        <div class="news-page-header">
            <h4>{{ __('admin_news.index.title') }}</h4>

            <a class="news-btn-add" href="{{ route('admin.news.create') }}">
                + {{ __('admin_news.index.add') }}
            </a>
        </div>

        <div class="news-card">
            <table class="news-table">
                <thead>
                <tr>
                    <th>{{ __('admin_news.index.table_title') }}</th>
                    <th>{{ __('admin_news.index.table_date') }}</th>
                    <th>{{ __('admin_news.index.table_image') }}</th>
                    <th style="text-align:right">{{ __('admin_news.index.table_actions') }}</th>
                </tr>
                </thead>

                <tbody>
                @forelse($items as $n)
                    <tr>
                        <td class="news-title-cell">{{ $n->title }}</td>

                        <td class="news-date-cell">
                            {{ optional($n->published_at)->format('Y-m-d') }}
                        </td>

                        <td>
                            @if($n->image_path)
                                <img class="news-image"
                                     src="{{ asset('storage/'.$n->image_path) }}"
                                     alt="{{ __('admin_news.index.image_alt') }}">
                            @else
                                <div class="news-no-image"
                                     title="{{ __('admin_news.index.no_image_alt') }}">🖼️</div>
                            @endif
                        </td>

                        <td>
                            <div class="news-actions">
                                <a class="news-btn-edit"
                                   href="{{ route('admin.news.edit', $n) }}">
                                    {{ __('admin_news.index.edit') }}
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.news.destroy', $n) }}"
                                      onsubmit="return confirm('{{ __('admin_news.index.confirm_delete') }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="news-btn-delete">
                                        {{ __('admin_news.index.delete') }}
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="news-empty-state">
                            {{ __('admin_news.index.empty') }}
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="news-pagination">
            {{ $items->links() }}
        </div>
    </div>
@endsection
