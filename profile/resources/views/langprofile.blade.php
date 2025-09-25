{{-- resources/views/resume.blade.php --}}
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <title>{{ __('resume.title') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/sagar.jpg') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, rgba(238, 242, 243, 0.8), rgba(217, 228, 245, 0.8)),
             url('images/sagar.jpg') no-repeat center center fixed;
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

        .profile-thumb {
            width: 200px;
            cursor: pointer;
            border-radius: 6px;
        }

        h2 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #2d4e9d;
            margin-bottom: 15px;
        }

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

        /* Gallery thumbnails */
        .gallery img {
            cursor: pointer;
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gallery img:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <div class="container">

        {{-- Language Switcher --}}
        <div class="text-end mb-3">
            <a href="/Setlang/en" class="btn btn-sm btn-secondary">English</a>
            <a href="/Setlang/hi " class="btn btn-sm btn-primary">हिंदी</a>
            <a href="/Setlang/mr " class="btn btn-sm btn-success">मराठी</a>
        </div>

        <h1>{{ __('resume.title') }}</h1>

        {{-- Resume Card --}}
        <div class="resume-card row align-items-center">
            <div class="col-md-3 text-center mb-3 mb-md-0">
                <img src="{{ asset('images/sagar.jpg') }}" alt="Profile" class="profile-thumb img-thumbnail"
                    data-bs-toggle="modal" data-bs-target="#imageModal1">
            </div>

            <div class="col-md-9 resume-info">
                <h2>{{ __('resume.name') }}</h2>

                <div>
                    <div class="section-title"><i class="fas fa-users"></i> {{ __('resume.family_members') }}</div>
                    <ul class="list-unstyled">
                        <li><strong>👨 {{ __('resume.father') }}:</strong>{{ __('resume.fathername') }}</li>
                        <li><strong>👩 {{ __('resume.mother') }}:</strong> {{ __('resume.mothername') }}</li>
                        <li><strong>👧 {{ __('resume.sister') }}:</strong> {{ __('resume.sistername') }}</li>
                    </ul>
                </div>

                <div class="section-title"><i class="fas fa-id-card"></i> {{ __('resume.personal_info') }}</div>
                <p><i class="fas fa-birthday-cake text-primary"></i> <strong>{{ __('resume.birth_date') }}:</strong> {{ __('resume.date') }}</p>
                <p><i class="fas fa-user-graduate text-success"></i> <strong>{{ __('resume.Education') }}:</strong>{{ __('resume.education') }}</p>
                <p><i class="fas fa-briefcase text-warning"></i> <strong>{{ __('resume.designation') }}:</strong>{{ __('resume.designation_') }}</p>
                <p><i class="fas fa-ruler-vertical text-danger"></i> <strong>{{ __('resume.height') }}:</strong> 174 cm (5.7)</p>
                <p><i class="fas fa-map-marker-alt text-danger"></i> <strong>{{ __('resume.address') }}:</strong> Pune, Maharashtra</p>
                <p><i class="fas fa-map-marker text-secondary"></i> <strong>{{ __('resume.permanent_address') }}:</strong> Ariyar, Madiyahu, Jaunpur</p>
            </div>
        </div>

        {{-- Family Gallery --}}
        <div class="gallery-section mb-5">
            <h2 class="text-center text-primary mb-4"><i class="fas fa-images"></i> {{ __('resume.gallery_title') }}</h2>
            <div class="row gallery g-3 justify-content-center">
                @for($i=1; $i<=7; $i++)
                    <div class="col-3 col-md-2">
                    <img src="{{ asset("images/$i.jpg") }}" class="img-fluid" alt="Gallery Image {{ $i }}" data-bs-toggle="modal" data-bs-target="#galleryModal{{ $i }}">
            </div>
            @endfor
        </div>
    </div>

    {{-- Google Map --}}
    <div class="text-center mb-5">
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3424.874147393672!2d82.67881967517168!3d25.433072077559885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398fd9007f9a5847%3A0x985ac353b84e5091!2sSubhanshu%20Pardeshi%20home!5e1!3m2!1sen!2sin!4v1758407150317!5m2!1sen!2sin"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    </div>

    {{-- Modals --}}
    <div class="modal fade" id="imageModal1" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content bg-transparent border-0 shadow-none">
                <div class="modal-body text-center p-0 position-relative">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                    <img src="{{ asset('images/sagar.jpg') }}" alt="Profile Full" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </div>

    @for($i=1; $i<=7; $i++)
        <div class="modal fade" id="galleryModal{{ $i }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content bg-transparent border-0 shadow-none">
                <div class="modal-body text-center p-0 position-relative">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                        data-bs-dismiss="modal"></button>
                    <img src="{{ asset("images/$i.jpg") }}" alt="Gallery Full {{ $i }}" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
        </div>
        @endfor

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>