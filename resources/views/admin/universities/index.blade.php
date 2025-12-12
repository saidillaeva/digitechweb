@extends('admin.layout')

@section('content')
    <h4 class="mb-3">Universities </h4>

    <div class="row g-3">
        @foreach($universities as $key => $name)
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="fw-semibold">{{ $name }}</div>
                        <div class="text-muted small mb-2">
                            Links: {{ count($links[$key]['events'] ?? []) }}
                        </div>
                        <a class="btn btn-outline-dark btn-sm" href="{{ route('admin.universities.edit',$key) }}">Manage links</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
