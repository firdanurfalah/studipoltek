{{-- @extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('Register') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('register') }}">
						@csrf

						<div class="row mb-3">
							<label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
									name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
								}}</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
									name="email" value="{{ old('email') }}" required autocomplete="email">

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
									required autocomplete="new-password">

								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm
								Password') }}</label>

							<div class="col-md-6">
								<input id="password-confirm" type="password" class="form-control"
									name="password_confirmation" required autocomplete="new-password">
							</div>
						</div>

						<div class="row mb-0">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary">
									{{ __('Register') }}
								</button>
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

							<div class="card mx-auto rounded-0 border-0" style="max-width: 400px;">
								<div class="card-body" style="padding: 40px;">
									<form id="login-form" name="login-form" class="mb-0" method="POST"
										action="{{ route('register') }}">
										@csrf
										<h3>Register</h3>

										<div class="row">
											<div class="col-12 form-group">
												<label for="login-form-username">Name: <small style="color: red">
														{{''}}</small></label>
												<input type="text" id="login-form-username" name="name"
													class="form-control not-dark" value="{{old('name')}}" 
													
													required />
													@error('name')
													<span class="text-danger" role="alert">
														<strong>{{ 'harus menggunakan huruf tanpa angka/karakter khusus!' }}</strong> </span>
													@enderror
											</div>
											<div class="col-12 form-group">
												<label for="login-form-username">Email Address: <small
														style="color: red">
														{{$errors->first('email')}}</small></label>
												<input type="text" id="login-form-username" name="email"
													class="form-control not-dark" value="{{old('email')}}" />
											</div>
											{{-- <div class="col-12 form-group">
												<label for="no_hp">Nomor HP: <small style="color: red">
														{{$errors->first('no_hp')}}</small></label>
												<input type="number" name="no_hp" id="no_hp" class="form-control"
													min="10" maxlength="15" value="{{old('no_hp')}}" required>
											</div> --}}
											<div class="col-12 form-group">
												<label for="no_hp">Nomor HP: <small style="color: red">
													{{$errors->first('no_hp')}}</small></label>
												<input type="text" name="no_hp" id="no_hp" class="form-control" inputmode="numeric"
													   pattern="\d{10,13}" maxlength="13" value="{{ old('no_hp') }}" 
													   title="Please enter a number between 10 and 13 digits" required />
											</div>
											

											<div class="col-12 form-group">
												<label for="login-form-password">Password: <small style="color: red">
														{{$errors->first('password')}}</small></label>
												<input type="password" id="login-form-password" name="password" value=""
													class="form-control not-dark" />
												<div class="password-checklist">
													<p><b></b></p>
													<ul class="checklist">
														<li class="list-item-0 text-danger">Panjang password minimal 8
														</li>
														<li class="list-item-1 text-danger"> harus terdapat angka</li>
														<li class="list-item-2 text-danger">harus Terdapat huruf kecil
														</li>
														<li class="list-item-3 text-danger">harus Terdapat huruf besar
														</li>
														<li class="list-item-4 text-danger">harus Terdapat simbol
														</li>
													</ul>
												</div>
											</div>
											<div class="col-12 form-group">
												<label for="login-form-password">Confirm password:</label>
												<input type="password" id="login-form-password"
													name="password_confirmation" value=""
													class="form-control not-dark" />
											</div>

											<div class="col-12 form-group mb-0">
												<button class="button button-3d button-black m-0" id="login-form-submit"
													name="login-form-submit" value="login">Register</button>

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
	<script src="js/jquery.js"></script>
	<script src="js/plugins.min.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputField = document.getElementById('login-form-username');
        
        inputField.addEventListener('input', function() {
            this.value = this.value.replace(/^\s+/, '');
        });
        
        // Optional: If you want to remove spaces on form submit
        document.querySelector('form').addEventListener('submit', function() {
            inputField.value = inputField.value.replace(/^\s+/, '');
        });
    });
</script>

</body>

</html>