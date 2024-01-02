<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FPTS Login</title>
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

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <h3 style="text-align: center; display: flex; align-items: center; justify-content: center;">
                            <img src="{{asset('template/src/img/fpts.png')}}" alt="Logo" style="width: 90px; height: auto; margin-right: 0px;">
                            <span style="margin-top: 10px;">LOGIN</span>
                        </h3>


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
                            @enderror
                            <i class="ik ik-lock"></i>
                        </div>

                        <div class="register text-right" style="margin-top: -15px;">
                            @if (Route::has('password.request'))
                            <a class="btn" href="{{ route('password.request') }}" style="font-size: 0.70rem;">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>



                        <div class="sign-btn text-center">
                            <button type="submit" class="btn btn-theme">Login</button>
                        </div>

                        <!-- Sign Up link -->
                        <div class="register text-center mt-3">
                            <a class="btn btn-link" href="{{ route('register') }}" style="font-size: 0.85rem;">Don't have an account yet?</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>