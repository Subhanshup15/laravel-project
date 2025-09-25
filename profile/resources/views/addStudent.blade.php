<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f8;
        margin: 0;
        padding: 20px;
    }

    .container {
        width: 90%;
        max-width: 1000px;
        margin: 0 auto;
    }

    .form-container,
    .table-container {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 40px;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    input[type="text"],
    input[type="email"],
    input[type="submit"] {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 6px;
        box-sizing: border-box;
        font-size: 14px;
    }

    input[type="text"],
    input[type="email"] {
        border: 1px solid #ccc;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        border: none;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 8px;
        overflow: hidden;
    }

    th,
    td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .btn {
        padding: 6px 12px;
        border-radius: 5px;
        text-decoration: none;
        color: white;
        font-size: 14px;
        margin-right: 5px;
    }

    .btn.edit {
        background-color: #2196F3;
    }

    .btn.edit:hover {
        background-color: #0b7dda;
    }

    .btn.delete {
        background-color: #f44336;
        border: none;
        cursor: pointer;
    }

    .btn.delete:hover {
        background-color: #da190b;
    }

    p.success {
        color: green;
        text-align: center;
        margin-bottom: 15px;
        font-weight: bold;
    }
</style>

<body>
    <div class="container">
        <div class="form-container">
            <h1>Add Student</h1>

            @if(session('success'))
            <p class="success">{{ session('success') }}</p>
            @endif

            @if ($errors->any())
            <div style="color:red; text-align:left;">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('students.store') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                <input type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}" required>
                <input type="submit" value="Submit">
            </form>
        </div>

        <div class="table-container">
            <h1>Student List</h1>

            <!-- Search Form -->
            <form action="{{ route('students.index') }}" method="GET" style="display:flex; gap:5px; justify-content:flex-end; align-items:center; margin-bottom:10px;">
                <input type="text" name="search" placeholder="Search..."
                    value="{{ request()->get('search') }}"
                    style="width:150px; padding:4px 6px; font-size:12px; border-radius:4px; border:1px solid #ccc;">

                <button type="submit"
                    style="padding:2px 8px; font-size:12px; border-radius:4px; background-color:#0d6efd; color:white; border:none; cursor:pointer;">
                    Search
                </button>

                <a href="{{ route('students.index') }}"
                    style="padding:2px 8px; font-size:12px; border-radius:4px; background-color:#6c757d; color:white; text-decoration:none;">
                    Reset
                </a>
            </form>


            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>
                            <!-- Edit Button -->
                            <button type="button" class="btn edit" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $student->id }}">
                                Edit
                            </button>
                            <!-- Delete -->
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn delete"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No students found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- pagination use  -->
            {{ $students->links() }}

            <style>
                .w-5.h-5 {
                    width: 15px;
                    height: 15px;
                }
            </style>
        </div>
    </div>

    <!-- Edit Modals -->
    @foreach($students as $student)
    <div class="modal fade" id="editModal{{ $student->id }}" tabindex="-1"
        aria-labelledby="editModalLabel{{ $student->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('students.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $student->id }}">Edit Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="name" value="{{ $student->name }}" class="form-control mb-2" required>
                        <input type="email" name="email" value="{{ $student->email }}" class="form-control mb-2"
                            required>
                        <input type="text" name="phone" value="{{ $student->phone }}" class="form-control mb-2"
                            required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>