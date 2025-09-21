<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @if(isset($users) && $users->count() > 0)
    @php
    $firstUser = $users->first();
    @endphp
    <title>{{ $firstUser->name }} | Resume</title>
    <link rel="icon" type="image/png" href="{{ asset($firstUser->profile_image) }}">
    @else
    <title>My App | Resume</title>
    <link rel="icon" type="image/png" href="{{ asset('images/default-favicon.png') }}">
    @endif

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            /* Background image with gradient overlay for readability */
            background: linear-gradient(135deg, rgba(238, 242, 243, 0), rgba(217, 228, 245, 0)),
            url('{{ isset($firstUser) ? asset($firstUser->profile_image) : asset("images/background.jpg") }}') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }




        h1 {
            font-weight: 700;
            color: #2d4e9d;
            margin: 40px 0;
            text-align: center;
            animation: fadeInDown 1s ease both;
        }

        /* Card Styling */
        .resume-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            padding: 25px;
            margin-bottom: 40px;
            transition: all 0.3s ease;
            animation: fadeInUp 0.7s ease both;
        }

        .resume-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        /* Profile Image */
        .profile-thumb {
            width: 200px;
            /* height: 140px; */
            /* object-fit: cover; */
            /* border-radius: 50%;
            border: 4px solid transparent;
            background-image: linear-gradient(135deg, #4facfe, #00f2fe); */
            background-origin: border-box;
            padding: 3px;
            transition: transform 0.3s ease;
        }



        .profile-thumb:hover {
            transform: scale(1.08);
        }

        h2 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #2d4e9d;
            margin-bottom: 15px;
        }

        /* Section Titles */
        .section-title {
            margin-top: 20px;
            margin-bottom: 10px;
            font-weight: 600;
            font-size: 1.2rem;
            color: #4facfe;
            display: flex;
            align-items: center;
        }

        .section-title i {
            margin-right: 8px;
        }

        .resume-info p,
        .resume-info li {
            margin: 4px 0;
            font-size: 0.95rem;
        }

        .resume-info strong {
            color: #333;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .map-container {
            margin-top: 20px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .map-container iframe {
            width: 100%;
            height: 300px;
            border: 0;
        }

        .modal-backdrop.show {
            opacity: 0.9;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>
            @foreach($users as $user) {{ $user->name }} @endforeach Resume
        </h1>

        @forelse($users as $user)


        <div class="resume-card row align-items-center">
            <div class="col-md-3 text-center mb-3 mb-md-0">
               
                <img src="{{ asset($user->profile_image) }}"
                    alt="Profile"
                    class="profile-thumb img-thumbnail"
                    style="cursor:pointer;"
                    data-bs-toggle="modal"
                    data-bs-target="#imageModal{{$user->id}}">
             
            </div>


            <div class="col-md-9 resume-info">
                <h2>{{ $user->name }}</h2>

                <div>
                    <div class="section-title"><i class="fas fa-users"></i> Family Members</div>
                    <ul class="list-unstyled">
                        <li><strong>👨 Father:</strong> {{ $user->father_name ?? 'N/A' }}</li>
                        <li><strong>👩 Mother:</strong> {{ $user->mother_name ?? 'N/A' }}</li>
                        <li><strong>👧 Sister:</strong> {{ $user->sister_name ?? 'N/A' }}</li>
                    </ul>
                </div>

                <div class="section-title"><i class="fas fa-id-card"></i> Personal Info</div>
                <p><i class="fas fa-birthday-cake text-primary"></i> <strong>Birth Date:</strong> {{ $user->date_of_birth ?? 'N/A' }}</p>
                <p><i class="fas fa-user-graduate text-success"></i> <strong>Education:</strong> {{ $user->qualification ?? 'N/A' }}</p>
                <p><i class="fas fa-briefcase text-warning"></i> <strong>Designation:</strong> {{ $user->designation ?? 'N/A' }}</p>
                <p><i class="fas fa-ruler-vertical text-danger"></i> <strong>Height:</strong> {{ $user->height ?? 'N/A' }} cm</p>
                <p><i class="fas fa-map-marker-alt text-danger"></i> <strong>Address:</strong> {{ $user->address ?? 'N/A' }}</p>
                <p><i class="fas fa-map-marker text-secondary"></i> <strong>Permanent Address:</strong> {{ $user->address_per ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="text-center mb-5">
                @if($user->google_map_link)
                <div class="map-container">
                    {!! $user->google_map_link !!}
                </div>
                @else
                <button class="btn btn-outline-secondary" disabled>
                    <i class="fas fa-map-marked-alt"></i> No Google Maps Link
                </button>
                @endif
            </div>
        </div>

        @empty
        <div class="alert alert-warning text-center">No users found.</div>
        @endforelse
    </div>


    <!-- Bootstrap 5 JS (required for modal to work) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>