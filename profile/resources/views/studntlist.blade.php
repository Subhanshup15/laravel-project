<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student List</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">



</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

    <!-- <div class="table-container">
        <h1>Student List</h1>
        <button><a href="addStudent">Add </a></button>
        
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
                      
                        <button type="button" class="btn edit" data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $student->id }}">
                            Edit
                        </button>
                      
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

       
        <style>
            .w-5.h-5 {
                width: 15px;
                height: 15px;
            }
        </style>
    </div> -->

    <div class="table-container">
        <h1>Student List</h1>
        <button><a href="addStudent">Add</a></button>

        <!-- Search Form -->
        <form action="{{ route('students.index') }}" method="GET"
            style="display:flex; gap:5px; justify-content:flex-end; align-items:center; margin-bottom:10px;">
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

        <!-- Bulk Delete Form -->
        <form action="{{ route('students.bulkDelete') }}" method="POST" id="bulkDeleteForm">
            @csrf
            @method('DELETE')

            <table>
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all"></th>
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
                        <td><input type="checkbox" name="ids[]" value="{{ $student->id }}"></td>
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
                            <!-- Delete Single -->
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
                        <td colspan="6" class="text-center">No students found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <button type="submit" class="btn delete" onclick="return confirm('Delete selected students?')">
                Delete Selected
            </button>
        </form>

        <style>
            .w-5.h-5 {
                width: 15px;
                height: 15px;
            }
        </style>
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
    <style>
        .table-container {
            width: 80%;
            margin: 50px auto;
            font-family: Arial, sans-serif;
        }

        .table-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: 600;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('select-all').addEventListener('click', function(event) {
            const checkboxes = document.querySelectorAll('input[name="ids[]"]');
            checkboxes.forEach(cb => cb.checked = event.target.checked);
        });
    </script>

</body>

</html>