@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">News</h4>
        <a class="btn btn-dark" href="{{ route('admin.news.create') }}">+ Add news</a>
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
                                <img src="{{ asset('storage/'.$n->image_path) }}" style="height:42px;border-radius:8px">
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
