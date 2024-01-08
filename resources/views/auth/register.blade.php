@php
$user = auth()->user();
@endphp

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FPTS Register</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{asset('template/src/img/brand.svg')}}" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('template/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/ionicons/dist/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/icon-kit/dist/css/iconkit.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('template/dist/css/theme.min.css')}}">
    <script src="{{asset('template/src/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<div class="auth-wrapper">
    <div class="container-fluid h-100">

        <div class="row flex-row h-100 bg-white">
            <div class="col-lg-8 col-md-7 col-sm-12 p-0">

                <div class="lavalite-bg" style="background-image: url({{asset('template/img/auth/bg.jpg')}})">
                    <div class="lavalite-overlay"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12 my-auto p-0">
                <div class="authentication-form mx-auto" style="padding: 10px;">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <h3 style="text-align: center; display: flex; align-items: center; justify-content: center;">
                            <img src="{{asset('template/src/img/fpts.png')}}" alt="Logo" style="width: 90px; height: auto; margin-right: 0px;">
                            <span style="margin-top: 10px;">REGISTRATION</span>
                        </h3>


                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror <i class="ik ik-user"></i>
                        </div>

                        <div class="form-group">
                            <input id="id_matric" type="text" class="form-control @error('id_matric') is-invalid @enderror" placeholder="ID Matric" name="id_matric" value="{{ old('id_matric') }}" required autocomplete="id_matric" autofocus>

                            @error('id_matric')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror <i class="ik ik-book-open"></i>
                        </div>

                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror <i class="ik ik-at-sign"></i>
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror <i class="ik ik-lock"></i>
                        </div>

                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            @error('password-confirm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <i class="ik ik-lock"></i>
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="role" name="role" onchange="toggleFields()">
                                <option value="">Select a role</option>
                                <option value="Student">Student</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Coordinator">Coordinator</option>
                            </select>
                            <i class="ik ik-users"></i>
                        </div>

                        <div class="form-group" id="userMajoringField" style="display: none;">
                            <select class="form-control" id="user_majoring" name="user_majoring">
                                <option value="">Select your majoring</option>
                                <option value="dcs">DCS</option>
                                <option value="bcs">BCS</option>
                                <option value="bcn">BCN</option>
                                <option value="bcg">BCG</option>
                            </select>
                            <i class=""></i>
                        </div>

                        <div class="form-group" id="userCategoryField" style="display: none;">
                            <select class="form-control" id="user_category" name="user_category">
                                <option value="">Select your category</option>
                                <option value="pta1">PTA 1</option>
                                <option value="pta2">PTA 2</option>
                                <option value="psm1">PSM 1</option>
                                <option value="psm2">PSM 2</option>
                            </select>
                            <i class=""></i>
                        </div>

                        <div class="sign-btn text-center">
                            <button type="submit" class="btn btn-theme">Create Account</button>
                        </div>

                        <div class="register">
                            <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleFields() {
        var roleSelect = document.getElementById("role");
        var userMajoringField = document.getElementById("userMajoringField");
        var userCategoryField = document.getElementById("userCategoryField");

        if (roleSelect.value === "Student") {
            userMajoringField.style.display = "block";
            userCategoryField.style.display = "block";
        } else {
            userMajoringField.style.display = "none";
            userCategoryField.style.display = "none";
        }
    }

    // Initial check on page load in case "Student" is preselected
    window.onload = function() {
        toggleFields();
    };
</script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')
</script>
<script src="{{asset('template/plugins/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('template/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('template/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('template/plugins/screenfull/dist/screenfull.js')}}"></script>
<script src="{{asset('template/dist/js/theme.min.js')}}"></script>

</html>