<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $user->name }}</title>
    <link rel="icon" type="image/png" href="{{ asset($user->profile_image) }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px 0;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
            padding: 30px;
            background: #fff;
        }

        .card-header {
            background: #4e73df;
            color: white;
            border-radius: 10px 10px 0 0;
            text-align: center;
            font-size: 1.8rem;
            font-weight: 700;
            padding: 20px 0;
            letter-spacing: 1px;
        }

        .form-section {
            margin-top: 25px;
            margin-bottom: 15px;
            font-size: 1.2rem;
            font-weight: 600;
            color: #4e73df;
            border-bottom: 2px solid #4e73df;
            padding-bottom: 5px;
        }

        .profile-preview {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            margin-top: 10px;
            border: 2px solid #4e73df;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        input:focus,
        textarea:focus {
            border-color: #4e73df;
            outline: none;
            box-shadow: 0 0 5px rgba(78, 115, 223, 0.3);
        }

        .btn-success {
            background-color: #4e73df;
            border-color: #4e73df;
            font-size: 1.1rem;
            font-weight: bold;
            padding: 10px 25px;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .btn-success:hover {
            background-color: #2e59d9;
            border-color: #2653c3;
        }

        .alert {
            border-radius: 8px;
        }

        label {
            font-weight: 600;
            color: #495057;
        }

        @media (max-width: 768px) {
            .card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $user->name ?? 'Add User' }}
                    </div>
                    <div class="card-body">

                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('sagar.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id ?? '' }}">

                            <!-- Personal Details -->
                            <div class="form-section">Personal Details</div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $user->name ?? '') }}" placeholder="Enter full name"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Age</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-calendar-fill"></i></span>
                                        <input type="number" name="age" class="form-control"
                                            value="{{ old('age', $user->age ?? '') }}" placeholder="Enter age" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3 mt-2">
                                <div class="col-md-6">
                                    <label class="form-label">Height (cm)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-arrows-expand"></i></span>
                                        <input type="text" name="height" class="form-control"
                                            value="{{ old('height', $user->height ?? '') }}" placeholder="Enter height in cm">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Qualification</label>
                                    <input type="text" name="qualification" class="form-control"
                                        value="{{ old('qualification', $user->qualification ?? '') }}"
                                        placeholder="Enter qualification">
                                </div>
                            </div>

                            <!-- Contact Details -->
                            <div class="form-section mt-3">Contact Details</div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" class="form-control" rows="2"
                                        placeholder="Enter your current address">{{ old('address', $user->address ?? '') }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Permanent Address</label>
                                    <textarea name="address_per" class="form-control" rows="2"
                                        placeholder="Enter permanent address">{{ old('address_per', $user->address_per ?? '') }}</textarea>
                                </div>
                            </div>

                            <!-- Family Members -->
                            <div class="form-section mt-3">Family Members</div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Father Name</label>
                                    <input type="text" name="father_name" class="form-control"
                                        value="{{ old('father_name', $user->father_name ?? '') }}"
                                        placeholder="Enter father's name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Mother Name</label>
                                    <input type="text" name="mother_name" class="form-control"
                                        value="{{ old('mother_name', $user->mother_name ?? '') }}"
                                        placeholder="Enter mother's name">
                                </div>
                            </div>

                            <div class="row g-3 mt-2">
                                <div class="col-md-6">
                                    <label class="form-label">Birth Date</label>
                                    <input type="text" name="date_of_birth" class="form-control"
                                        value="{{ old('date_of_birth', $user->date_of_birth ?? '') }}"
                                        placeholder="Enter Birth Date">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Sister Name</label>
                                    <input type="text" name="sister_name" class="form-control"
                                        value="{{ old('sister_name', $user->sister_name ?? '') }}"
                                        placeholder="Enter sister's name">
                                </div>
                            </div>

                            <!-- Professional Details -->
                            <div class="form-section mt-3">Professional Details</div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Designation</label>
                                    <textarea name="designation" class="form-control" rows="2"
                                        placeholder="Enter designation">{{ old('designation', $user->designation ?? '') }}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Profile Image</label>
                                    <input type="file" name="profile_image" id="profile_image" class="form-control">
                                    <div id="imageError" class="text-danger mt-1"></div>

                                    @if(isset($user) && $user->profile_image)
                                    <img src="{{ asset($user->profile_image) }}" alt="Profile" class="profile-preview mt-2">
                                    @endif
                                </div>

                            </div>

                            <!-- Google Maps -->
                            <div class="form-section mt-3">Location</div>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label">Google Maps Embed Link</label>
                                    <input type="text" name="google_map_link" class="form-control"
                                        value="{{ old('google_map_link', $user->google_map_link ?? '') }}"
                                        placeholder="Paste your Google Maps iframe link here">
                                </div>
                            </div>

                            <div class="d-flex mt-4 justify-content-center">
                                <button type="submit" class="btn btn-success btn-lg">{{ isset($user) ? 'Update' : 'Save' }}</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS for Image Validation -->
    <script>
        const profileInput = document.getElementById('profile_image');
        const imageError = document.getElementById('imageError');

        profileInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const maxSize = 2 * 1024 * 1024; // 2MB
                if (file.size > maxSize) {
                    imageError.textContent = 'Please upload an image less than 2MB.';
                    this.value = '';
                } else {
                    imageError.textContent = '';
                }
            }
        });
    </script>
</body>

</html>
