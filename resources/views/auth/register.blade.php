<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('backend_asset/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('backend_asset/images/favicon.png') }}" type="image/x-icon">
    <title>Fastkart - log In</title>

{{-- font_owsme --}}
<script src="https://kit.fontawesome.com/d7ebd3584d.js" crossorigin="anonymous"></script>
    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_asset/css/vendors/bootstrap.css') }}">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_asset/css/style.css') }}">
</head>

<body>

    <!-- login section start -->
    <section class="log-in-section section-b-space">
        <a href="" class="logo-login"><img src="{{ asset('backend_asset/images/logo/1.png') }}"
                class="img-fluid"></a>
        <div class="container w-100">
            <div class="row">

                <div class="col-xl-5 col-lg-6 me-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Welcome To Fastkart</h3>
                            <h4>Create Your Account</h4>
                        </div>

                        <div class="input-box">

                            <form class="row g-4" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                            placeholder="Name">
                                        <label for="name">Name</label>
                                    </div>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email') }}" placeholder="Email Address">
                                        <label for="email">Email Address</label>
                                    </div>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="number" class="form-control" name="phone"
                                            value="{{ old('phone') }}" placeholder="Phone Number ">
                                        <label for="email">Phone Number</label>
                                    </div>
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form position-relative">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                        <label for="password">Password</label>
                                        <i class="password-toggle-icon  fas fa-eye-slash" onclick="togglePassword('password')"></i>
                                    </div>


                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form position-relative">
                                        <input type="password" class="form-control" name="password_confirmation" id="confirm_password" placeholder="Confirm Password">
                                        <label for="confirm_password">Confirm Password</label>
                                        <i class="password-toggle-icon fas fa-eye-slash" onclick="togglePassword('confirm_password')"></i>
                                    </div>
                                </div>



                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center" type="submit">Sign
                                        Up</button>
                                </div>
                            </form>
                        </div>
                        <div class="register-info">
                            <p class="p-2">Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
                        </div>

                        <div class="other-log-in">
                            <h6>or</h6>
                        </div>

                        <div class="log-in-button">
                            <ul>
                                <li>
                                    <a href="https://www.google.com/" class="btn google-button w-100">
                                        <i class="fa-brands fa-google"></i> Sign Up with Google
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/" class="btn google-button w-100">
                                        <i class="fa-brands fa-facebook"></i> Sign Up with Facebook
                                    </a>
                                </li>
                            </ul>
                        </div>





                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login section end -->

</body>

</html>

<script>

    function togglePassword(inputId) {
        var passwordInput = document.getElementById(inputId);
        var toggleIcon = passwordInput.nextElementSibling;

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        } else {
            passwordInput.type = "password";
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        }
    }
</script>


