{{-- resources/views/admin/comments/index.blade.php --}}
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

        .comments-wrapper {
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
        .comments-page-header {
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
        }

        .comments-page-header::before {
            content: '💬';
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

        .comments-page-header h2 {
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

        /* Table Card */
        .comments-table-card {
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
        .comments-table {
            width: 100%;
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .comments-table thead {
            background: linear-gradient(135deg, #1e40af 0%, #6d28d9 50%, #7c3aed 100%);
            position: relative;
        }

        .comments-table thead::after {
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

        .comments-table thead th {
            color: #ffffff;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.8125rem;
            letter-spacing: 0.1em;
            padding: 1.25rem 1.5rem;
            border: none;
            white-space: nowrap;
            text-align: left;
        }

        .comments-table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
        }

        .comments-table tbody tr:hover {
            background: linear-gradient(90deg,
            rgba(250, 245, 255, 0.5) 0%,
            rgba(243, 232, 255, 0.8) 50%,
            rgba(250, 245, 255, 0.5) 100%);
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.15);
        }

        .comments-table tbody td {
            padding: 1.25rem 1.5rem;
            color: #1e293b;
            font-size: 0.9375rem;
            vertical-align: middle;
            border: none;
        }

        .comments-table tbody tr:last-child {
            border-bottom: none;
        }

        /* News Title Cell */
        .comments-news-title {
            font-weight: 600;
            color: #1e293b;
            max-width: 300px;
        }

        /* Name Cell */
        .comments-name {
            font-weight: 500;
            color: #475569;
        }

        /* Message Cell */
        .comments-message {
            color: #64748b;
            max-width: 350px;
            line-height: 1.5;
        }

        /* Status Badges */
        .comments-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.375rem 0.875rem;
            border-radius: 8px;
            font-size: 0.8125rem;
            font-weight: 600;
            letter-spacing: 0.025em;
            gap: 0.375rem;
        }

        .comments-badge-approved {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.15), rgba(22, 163, 74, 0.15));
            color: #15803d;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }

        .comments-badge-approved::before {
            content: '✓';
            font-size: 1rem;
            font-weight: bold;
        }

        .comments-badge-pending {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.15), rgba(234, 179, 8, 0.15));
            color: #d97706;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        .comments-badge-pending::before {
            content: '⏳';
            font-size: 0.875rem;
        }

        /* Actions Cell */
        .comments-actions {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .comments-action-form {
            margin: 0;
        }

        .comments-btn-approve {
            padding: 0.5rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #ffffff;
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(34, 197, 94, 0.2);
        }

        .comments-btn-approve:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.35);
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
        }

        .comments-btn-delete {
            padding: 0.5rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #ffffff;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(239, 68, 68, 0.2);
        }

        .comments-btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.35);
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        }

        /* Empty State */
        .comments-empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #64748b;
        }

        .comments-empty-state::before {
            content: '💬';
            display: block;
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.3;
        }

        .comments-empty-state-text {
            font-size: 1.125rem;
            font-weight: 500;
            color: #64748b;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .comments-wrapper {
                padding: 1.5rem 1rem;
            }

            .comments-page-header {
                padding: 2rem 1.5rem;
            }

            .comments-page-header h2 {
                font-size: 1.75rem;
            }

            .comments-page-header::before {
                display: none;
            }

            .comments-table-card {
                border-radius: 16px;
            }

            .comments-table {
                display: block;
                overflow-x: auto;
            }

            .comments-table thead th,
            .comments-table tbody td {
                padding: 1rem;
                font-size: 0.875rem;
            }

            .comments-actions {
                flex-direction: column;
                gap: 0.5rem;
            }

            .comments-btn-approve,
            .comments-btn-delete {
                width: 100%;
                white-space: nowrap;
            }
        }
    </style>

    <div class="comments-wrapper">
        <div class="comments-page-header">
            <h2>{{ __('admin_comments.title') }}</h2>
        </div>

        <div class="comments-table-card">
            <div class="table-responsive">
                <table class="comments-table">
                    <thead>
                    <tr>
                        <th>{{ __('admin_comments.table.news') }}</th>
                        <th>{{ __('admin_comments.table.name') }}</th>
                        <th>{{ __('admin_comments.table.message') }}</th>
                        <th>{{ __('admin_comments.table.status') }}</th>
                        <th>{{ __('admin_comments.table.actions') }}</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($comments as $comment)
                        <tr>
                            <td class="comments-news-title">
                                {{ $comment->news->title }}
                            </td>

                            <td class="comments-name">
                                {{ $comment->name }}
                            </td>

                            <td class="comments-message">
                                {{ $comment->message }}
                            </td>

                            <td>
                                @if($comment->is_approved)
                                    <span class="comments-badge comments-badge-approved">
                                        {{ __('admin_comments.status.approved') }}
                                    </span>
                                @else
                                    <span class="comments-badge comments-badge-pending">
                                        {{ __('admin_comments.status.pending') }}
                                    </span>
                                @endif
                            </td>

                            <td>
                                <div class="comments-actions">
                                    @if(!$comment->is_approved)
                                        <form class="comments-action-form"
                                              method="POST"
                                              action="{{ route('admin.comments.approve', $comment->id) }}">
                                            @csrf
                                            <button class="comments-btn-approve">
                                                {{ __('admin_comments.actions.approve') }}
                                            </button>
                                        </form>
                                    @endif

                                    <form class="comments-action-form"
                                          method="POST"
                                          action="{{ route('admin.comments.destroy', $comment->id) }}"
                                          onsubmit="return confirm('{{ __('admin_comments.confirm.delete') }}')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="comments-btn-delete">
                                            {{ __('admin_comments.actions.delete') }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="comments-empty-state">
                                <div class="comments-empty-state-text">
                                    {{ __('admin_comments.empty') }}
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
