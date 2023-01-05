{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NEWABI OUTDOOR | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
		<link rel="stylesheet" href="{{ asset('assets') }}/css/login.css">
		<link rel="stylesheet" href="{{ asset('assets') }}/build/sweetalert2/sweetalert2.min.css" />
	</head>
  <body>
		<div class="global-container">
			<div class="card form-login">
				@if(session()->has('error'))
					@push('script')
						<script>								
								Swal.fire({
								icon: 'warning',
								position: 'top-end',
								title: 'Email Atau Password Salah !!',
								showConfirmButton: false,
								timer: 2000
								})
						</script>
					@endpush
				@endif
				<div class="card-body">
					<h1 class="card-title text-center">LOGIN</h1>
					<p class="text-center">Harap Login Untuk Melakukan Pesanan</p>
				</div>
				<div class="card-text">
					<form action="/login" method="post">
						@csrf
						<div class="mb-1">
							<input type="email" class="form-control field" name="email" placeholder="Email" id="email" autofocus required>
						</div>
						<div class="mb-1">
							<input type="password" class="form-control field" name="password" placeholder="Password" id="password" autofocus required>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" class="btn btn-primary">LOGIN</button>
						</div>
						<div class="mt-2 text-center" >
							<p>Don't Have An Account ? <a href="/register" style="text-decoration: none">Regist Now</a></p>
						</div>	
						<div class=" text-center d-grid gap-2" >
							<a href="{{ route('login.google') }}" class="btn-google" style="text-decoration: none;"> <i class="bi bi-google fs-5"></i> &nbsp; Log In With Google</a>
							<a href="#" class="btn-facebook" style="text-decoration: none;"> <i class="bi bi-facebook fs-5"></i> &nbsp; Log In With Facebook</a> 
						</div>	
					</form>
				</div>
			</div>
		</div>

   
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
		<script src="{{ asset('assets') }}/build/sweetalert2/sweetalert2.min.js"></script>
		@stack('script')
  </body>
</html> --}}

@extends('layouts.main')
@push('head')
<link rel="stylesheet" href="{{ asset('assets') }}/css/login.css">
@endpush
@section('main')
	<div class="account-page">
		@if(session()->has('succes'))
		@push('script')
			<script>								
					Swal.fire({
					icon: 'success',
					title: 'Registrasi Berhasil',
					showConfirmButton: false,
					timer: 2000
					})
			</script>
		@endpush
	@endif	
		@if(session()->has('error'))
					@push('script')
						<script>								
								Swal.fire({
								icon: 'warning',
								title: 'Email Atau Password Salah !!',
								showConfirmButton: false,
								timer: 2000
								})
						</script>
					@endpush
				@endif
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<img src="{{ asset('assets') }}/img/hero/sampul newabi.png" alt="" width="100%" >
				</div>
				<div class="col-lg-6">
					<div class="form-container">
						<div class="form-btn">
							<span onclick="Login()">Login</span>
							<span onclick="Register()">Register</span>
							<hr id="indicator">
						</div>

						<form action="/login" method="post" id="loginForm">
							@csrf
							<input type="email" placeholder="Email" name="email">
							<input type="password" placeholder="Password" name="password">
							<button type="submit" class="login" >Login</button>
							<hr>
							<div class="text-start d-grid gap-2" >
								<a href="{{ route('login.google') }}" class="btn-google" style="text-decoration: none; color:black"> <i class="bi bi-google fs-5 text-danger"></i> &nbsp; Log In With Google</a>

								<a href="#" class="btn-facebook" style="text-decoration: none; color:black"> <i class="bi bi-facebook fs-5 text-primary"></i> &nbsp; Log In With Facebook</a> 
							</div>	
						</form>

						<form action="/register" method="POST" id="regForm">
							@csrf
							<input type="text" placeholder="Username" name="name" class="@error('name') is-invalid @enderror">
							@error('name')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
							<input type="email" placeholder="Email" name="email" class="@error('email') is-invalid @enderror">
							@error('email')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
							<input type="password" placeholder="Password" name="password" class="@error('password') is-invalid @enderror">
							@error('password')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
							<button type="submit" class="login" >Register</button>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>

@endsection

@push('script')
	<script>
		var loginForm = document.getElementById("loginForm")
		var regForm = document.getElementById("regForm")
		var indicator = document.getElementById("indicator")

		function Register()
		{
			regForm.style.transform = "translateX(0px)"
			loginForm.style.transform = "translateX(0px)"
			indicator.style.transform = "translateX(100px)"
		}
		function Login()
		{
			regForm.style.transform = "translateX(300px)"
			loginForm.style.transform = "translateX(300px)"
			indicator.style.transform = "translateX(0)"
		}

	</script>

@endpush