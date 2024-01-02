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
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url({{ asset('template/img/auth/bg.jpg')}})">
                    <div class="lavalite-overlay"></div>
                </div>  
            </div>
            <div class="col-xl-4 col-lg-2 col-md-7 my-auto p-0">
                <div class="authentication-form mx-auto">
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
                            <i class="ik ik-eye-off"></i>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="role" name="role">
                                <option value="">Select a role</option>
                                <option value="Student">Student</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Coordinator">Coordinator</option>
                            </select>
                            <i class="ik ik-users"></i>
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="user_majoring" name="user_majoring">
                                <option value="">Select your majoring</option>
                                <option value="bcs">DCS</option>
                                <option value="bcs">BCS</option>
                                <option value="bcn">BCN</option>
                                <option value="bcg">BCG</option>
                            </select>
                            <i class="ik ik-users"></i>
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="user_category" name="user_category">
                                <option value="">Select your category</option>
                                <option value="pta1">PTA 1</option>
                                <option value="pta2">PTA 2</option>
                                <option value="psm1">PSM 1</option>
                                <option value="psm2">PSM 2</option>
                            </select>
                            <i class="ik ik-users"></i>
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