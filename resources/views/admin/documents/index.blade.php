@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Documents</h4>
        <a class="btn btn-dark" href="{{ route('admin.documents.create') }}">+ Upload document</a>
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
                @foreach($items as $d)
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
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $items->links() }}</div>
@endsection
