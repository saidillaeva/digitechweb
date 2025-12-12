@extends('admin.layout')

@section('content')
    <h4 class="mb-3">Manage links: {{ $universityName }}</h4>

    <form method="POST" action="{{ route('admin.universities.update',$universityKey) }}" class="card border-0 shadow-sm p-3">
        @csrf

        <div id="linksWrap">
            @php $events = $current['events'] ?? []; @endphp

            @forelse($events as $i => $e)
                <div class="border rounded-3 p-3 mb-2">
                    <div class="mb-2">
                        <label class="form-label">Title *</label>
                        <input class="form-control" name="events[{{ $i }}][title]" value="{{ $e['title'] }}" required>
                    </div>
                    <div>
                        <label class="form-label">URL *</label>
                        <input class="form-control" name="events[{{ $i }}][url]" value="{{ $e['url'] }}" required>
                    </div>
                </div>
            @empty
                <div class="text-muted">No links yet. Add first one below.</div>
            @endforelse
        </div>

        <button type="button" class="btn btn-outline-dark btn-sm my-2" onclick="addLink()">+ Add link</button>

        <div class="d-flex gap-2 mt-3">
            <button class="btn btn-dark">Save</button>
            <a class="btn btn-outline-secondary" href="{{ route('admin.universities.index') }}">Back</a>
        </div>
    </form>

    <script>
        let idx = {{ count($events) }};

        function addLink(){
            const wrap = document.getElementById('linksWrap');
            const box = document.createElement('div');
            box.className = 'border rounded-3 p-3 mb-2';
            box.innerHTML = `
    <div class="mb-2">
      <label class="form-label">Title *</label>
      <input class="form-control" name="events[${idx}][title]" required>
    </div>
    <div>
      <label class="form-label">URL *</label>
      <input class="form-control" name="events[${idx}][url]" required>
    </div>
  `;
            wrap.appendChild(box);
            idx++;
        }
    </script>
@endsection
