<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { display: flex; min-height: 100vh; }
    .sidebar {
        width: 250px; background: #343a40; color: white; min-height: 100vh;
    }
    .sidebar a {
        color: white; display: block; padding: 12px; text-decoration: none;
    }
    .sidebar a:hover {
        background: #495057;
    }
    .content { flex: 1; padding: 20px; background: #f8f9fa; }
  </style>
</head>
<body>
  <div class="sidebar">
    <h4 class="p-3">Admin Panel</h4>
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a href="{{ route('admin.portfolios.index') }}">Manage Portfolios</a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" method="POST" action="{{ route('logout') }}">@csrf</form>
  </div>
  <div class="content">
    @yield('content')
  </div>
</body>
</html>
