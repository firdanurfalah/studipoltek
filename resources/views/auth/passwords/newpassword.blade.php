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
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/dark.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/font-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css" />

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

                            <div class="card mx-auto rounded-0 border-0" style="max-width: 400px;">
                                <div class="card-body" style="padding: 40px;">
                                    <form id="login-form" name="login-form" class="mb-0" method="POST"
                                        action="/savepassword">
                                        @csrf
                                        <input name="email" id="email" value="{{$e->email}}" hidden>
                                        <h3>Reset Password</h3>

                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label for="login-form-username">Email address: <small
                                                        style="color: red">
                                                        {{$errors->first('email')}}</small></label>
                                                <p><b>{{$e->email}}</b></p>
                                            </div>

                                            <div class="col-12 form-group">
                                                <label for="login-form-password">New password: <small
                                                        style="color: red">
                                                        {{$errors->first('password')}}</small></label>
                                                <input type="password" id="login-form-password" name="password" value=""
                                                    class="form-control not-dark" />
                                                <div class="password-checklist">
                                                    <p><b></b></p>
                                                    <ul class="checklist">
                                                        <li class="list-item-0 text-danger">Panjang password minimal 8
                                                        </li>
                                                        <li class="list-item-1 text-danger">Terdapat 1 angka</li>
                                                        <li class="list-item-2 text-danger">Terdapat 1 huruf kecil
                                                        </li>
                                                        <li class="list-item-3 text-danger">Terdapat 1 huruf besar
                                                        </li>
                                                        <li class="list-item-4 text-danger">Terdapat 1 simbol
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="login-form-password">Confirm new password:</label>
                                                <input type="password" id="login-form-password"
                                                    name="password_confirmation" value=""
                                                    class="form-control not-dark" />
                                            </div>

                                            <div class="col-12 form-group mb-0">
                                                <button class="button button-3d button-black m-0" id="login-form-submit"
                                                    name="login-form-submit" value="login">Reset</button>

                                            </div>
                                        </div>
                                    </form>

                                    <div class="line line-sm"></div>


                                </div>
                            </div>

                            <div class="text-center text-muted mt-3"><small>Copyrights &copy; Firda Nur Falah</small>
                            </div>

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
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/plugins.min.js')}}"></script>

    <!-- Footer Scripts
	============================================= -->
    <script src="{{asset('js/functions.js')}}"></script>
    <script>
        let passwordInp = document.querySelector("#login-form-password");
		let validationRegex = [
			{ regex: /.{8,}/ }, // min 8 letters,
			{ regex: /[0-9]/ }, // numbers from 0 - 9
			{ regex: /[a-z]/ }, // letters from a - z (lowercase)
			{ regex: /[A-Z]/ }, // letters from A-Z (uppercase),
			{ regex: /[^A-Za-z0-9]/ } // special characters
		];
		passwordInp.addEventListener("keyup", () => {
			validationRegex.forEach((item, i) => {
				let isValid = item.regex.test(passwordInp.value);
				if (isValid) {
					$('.list-item-'+i).attr("hidden",true);
				} else {
					$('.list-item-'+i).removeAttr("hidden");
				}
			});
		});
    </script>

</body>

</html>