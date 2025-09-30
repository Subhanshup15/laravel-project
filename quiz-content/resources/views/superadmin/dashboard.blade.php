<!DOCTYPE html>
<html>
<head>
    <title>Super Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 bg-light">

    <div class="container">
        <div class="card shadow p-4">
            <h2>Welcome, {{ auth('superadmin')->user()->name }}</h2>
            <p class="text-muted">You are logged in as Super Admin</p>

            <form action="{{ route('superadmin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>

</body>
</html>
