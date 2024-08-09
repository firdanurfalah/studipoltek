{{-- @extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3" hidden>
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                <a class="btn btn-link" href="/register-user">
                                    Register
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
	============================================= -->
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="css/custom.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
	============================================= -->
    <title>Login - Layout 4 | Canvas</title>

</head>

<body class="stretched">

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Content
		============================================= -->
        <section id="content">
            <div class="content-wrap py-0">

                <div class="section dark p-0 m-0 h-100 position-absolute"></div>

                <div class="section bg-transparent min-vh-100 p-0 m-0 d-flex">
                    <div class="vertical-middle">
                        <div class="container py-5">
                            @if(Session::has('info'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <strong>Info!</strong> {{Session::get('info')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif


                            <div class="card mx-auto rounded-0 border-0" style="max-width: 400px;">
                                <div class="card-body" style="padding: 40px;">
                                    <form id="login-form" name="login-form" class="mb-0" method="POST"
                                        action="{{ route('login') }}">
                                        @csrf
                                        <h3>Login to your Account</h3>

                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label for="login-form-username">Email:</label>
                                                <input type="email" id="login-form-username" name="email"
                                                    value="{{old('email')}}" class="form-control not-dark" />
                                            </div>

                                            <div class="col-12 form-group">
                                                <label for="login-form-password">Password:</label>
                                                <input type="password" id="login-form-password" name="password" value=""
                                                    class="form-control not-dark" />
                                            </div>
                                            <br>

                                            <div class="col-12 form-group mb-0">
                                                <button class="button button-3d button-black m-0" id="login-form-submit"
                                                    name="login-form-submit" value="login" type="submit">Login</button>
                                                {{-- <a href="#" class="float-right">Forgot Password?</a> --}}
                                            </div>
                                        </div>
                                    </form>

                                    <br>
                                    <br>


                                    <a href="/reset-password">
                                        <p>Lupa password?</p>
                                    </a>
                                    <div class="accordion-header">
                                        <div class="accordion-icon">
                                            <i class="accordion-closed icon-user4"></i>
                                            <i class="accordion-open icon-ok-sign"></i>
                                        </div>
                                        <div class="accordion-title">
                                            <a href="/register-user">
                                                New Signup? Register for an Account
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="text-center text-muted mt-3"><small>Copyrights &copy; All Rights Reserved
                                    by
                                    Canvas Inc.</small></div> --}}

                        </div>
                    </div>
                </div>

            </div>
        </section><!-- #content end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- JavaScripts
	============================================= -->
    <script src="js/jquery.js"></script>
    <script src="js/plugins.min.js"></script>

    <!-- Footer Scripts
	============================================= -->
    <script src="js/functions.js"></script>

</body>

</html>