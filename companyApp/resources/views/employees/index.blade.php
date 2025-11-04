<!DOCTYPE html>
<html>

<head>
    <title>Employee List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4 text-center">Employee List</h2>
        <form method="GET" action="{{ url('/employees') }}" class="mb-3 d-flex justify-content-end">
            <input type="text" name="search" value="{{ old('search', $search ?? '') }}" class="form-control w-25 me-2"
                placeholder="Search...">
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="{{ url('/employees') }}" class="btn btn-secondary ms-2">Reset</a>
        </form>


        <table class="table table-bordered table-striped shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Emp Code</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $emp)
                    <tr>
                        <td>{{ $emp->id }}</td>
                        <td>{{ $emp->emp_code }}</td>
                        <td>{{ $emp->name }}</td>
                        <td>{{ $emp->email }}</td>
                        <td>{{ $emp->department }}</td>
                        <td>{{ $emp->designation }}</td>
                        <td>₹ {{ number_format($emp->salary, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $employees->links('pagination::bootstrap-5') }}
        </div>
    </div>

</body>

</html>
