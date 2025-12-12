<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">DigiTech Admin</a>

        <div class="ms-auto d-flex gap-2">
            <a class="btn btn-outline-light btn-sm" href="{{ route('admin.news.index') }}">News</a>
            <a class="btn btn-outline-light btn-sm" href="{{ route('admin.documents.index') }}">Documents</a>
            <a class="btn btn-outline-light btn-sm" href="{{ route('admin.universities.index') }}">Universities</a>

            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container py-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</div>

</body>
</html>
