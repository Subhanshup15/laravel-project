<x-layout>
    <x-slot name="title">Student List</x-slot>
    <x-slot name="header">Student List</x-slot>

    <x-slot name="main">

        <!-- Add Button -->
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ url('addStudent') }}" class="btn btn-primary">Add Student</a>

            <!-- Search Form -->
            <form action="{{ route('students.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" placeholder="Search..."
                    value="{{ request()->get('search') }}" class="form-control form-control-sm"
                    style="max-width: 180px;">
                <button type="submit" class="btn btn-sm btn-primary">Search</button>
                <a href="{{ route('students.index') }}" class="btn btn-sm btn-secondary">Reset</a>
            </form>
        </div>

        <!-- Bulk Delete -->
        <form action="{{ route('students.bulkDelete') }}" method="POST" id="bulkDeleteForm">
            @csrf
            @method('DELETE')

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-success">
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th style="width: 180px;">Actions</th>
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
                                <!-- Edit -->
                                <button type="button" class="btn btn-sm btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#editModal{{ $student->id }}">
                                    Edit
                                </button>

                                <!-- Delete Single -->
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
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
            </div>

            <!-- Bulk Delete Button -->
            <button type="submit" class="btn btn-danger mt-2"
                onclick="return confirm('Delete selected students?')">Delete Selected</button>
        </form>

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
                            <input type="email" name="email" value="{{ $student->email }}" class="form-control mb-2" required>
                            <input type="text" name="phone" value="{{ $student->phone }}" class="form-control mb-2" required>
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

        <!-- Checkbox Script -->
        <script>
            document.getElementById('select-all').addEventListener('click', function(event) {
                const checkboxes = document.querySelectorAll('input[name="ids[]"]');
                checkboxes.forEach(cb => cb.checked = event.target.checked);
            });
        </script>
    </x-slot>
</x-layout>
