<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>NEWABI OUTDOOR | Login</title>
	<link rel="stylesheet" href="{{ asset('assets') }}/css/login.css" />
	<link rel="stylesheet" href="{{ asset('assets') }}/build/sweetalert2/sweetalert2.min.css" />
</head>
<body>
	@if(session()->has('succes'))
		@push('script')
				<script>								
						Swal.fire({
						icon: 'success',
						title: 'Registration Success',
						showConfirmButton: false,
						timer: 6000
						})
				</script>
			@endpush
	@endif
	<div class="container">
		<div class="login-box">
			<div class="left"></div>
			<div class="right">
				<h2>Login Now</h2>
				<form action="">
					<input type="email" name="email" id="email" class="field" placeholder="Your Email">
					<input type="password" name="password" id="password" class="field" placeholder="Your Password">
					<p>Don't have An Account ? <a href="/register">Create Now</a></p>
					<button type="submit" class="btn">Login</button>
				</form>
			</div>
		</div>
	</div>

	<script src="{{ asset('assets') }}/build/sweetalert2/sweetalert2.min.js"></script>
	<script src="{{ asset('assets') }}/build/jquery/jquery.js"></script>
	@stack('script')
</body>
</html>