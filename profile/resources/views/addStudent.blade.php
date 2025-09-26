<x-layout>
    <x-slot name="title">Add Student</x-slot>

    <x-slot name="main">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Add Student</h5>
                        </div>
                        <div class="card-body">

                            <!-- Success Message -->
                            @if(session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                            @endif

                            <!-- Validation Errors -->
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <!-- Form -->
                            <form action="{{ route('students.store') }}" method="POST">
                                @csrf
 
                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text"
                                        name="name"
                                        id="name"
                                        value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email"
                                        name="email"
                                        id="email"
                                        value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror"
                                        required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Phone -->
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text"
                                        name="phone"
                                        id="phone"
                                        value="{{ old('phone') }}"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        required>
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Buttons -->
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>