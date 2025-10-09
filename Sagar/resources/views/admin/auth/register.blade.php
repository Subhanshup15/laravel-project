<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{url('frontend/img/favicon.png')}}" type="image/png">
    <title> Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image d-flex justify-content-center align-items-center">
                        <lottie-player
                            src="https://assets5.lottiefiles.com/packages/lf20_jcikwtux.json"
                            background="transparent"
                            speed="1"
                            style="width: 100%; height: 100%;"
                            loop
                            autoplay>
                        </lottie-player>
                    </div>

                    <!-- Include Lottie JS (in your layout or below the body) -->
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

                            <form method="POST" action="{{ route('admin.register') }}" class="user">
                                @csrf

                                <!-- Name -->
                                <div class="form-group">
                                    <input
                                        type="text"
                                        class="form-control form-control-user"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') }}"
                                        placeholder="Full Name"
                                        required
                                        autofocus>
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <input
                                        type="email"
                                        class="form-control form-control-user"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="Email Address"
                                        required>
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Password + Confirm -->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input
                                            type="password"
                                            class="form-control form-control-user"
                                            id="password"
                                            name="password"
                                            placeholder="Password"
                                            required>
                                        @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <input
                                            type="password"
                                            class="form-control form-control-user"
                                            id="password_confirmation"
                                            name="password_confirmation"
                                            placeholder="Repeat Password"
                                            required>
                                        @error('password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>

                                <!-- Divider -->
                                <hr>



                                <!-- Already Registered -->
                                <div class="text-center mt-3">
                                    <a class="small" href="{{ route('admin.login') }}">
                                        Already registered? Login here
                                    </a>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>