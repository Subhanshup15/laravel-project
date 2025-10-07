<!DOCTYPE html>
<html>
<head>
  <title>My Portfolio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
  @if($portfolio)
  <div class="card mx-auto" style="max-width:500px;">
    <div class="card-body text-center">
      <img src="{{ asset('storage/'.$portfolio->image) }}" width="150" class="rounded-circle mb-3">
      <h3>{{ $portfolio->name }}</h3>
      <p><b>DOB:</b> {{ $portfolio->dob }}</p>
      <p><b>Address:</b> {{ $portfolio->address }}</p>
    </div>
  </div>
  @else
  <p>No portfolio data found.</p>
  @endif
</body>
</html>
