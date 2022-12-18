<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NEWABI OUTDOOR | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
								title: 'Email Atau Password Salah !!',
								showConfirmButton: false,
								timer: 2000
								})
						</script>
					@endpush
				@endif
				<div class="card-body">
					<h1 class="card-title text-center">LOGIN</h1>
				</div>
				<div class="card-text">
					<form action="/login" method="post">
						@csrf
						<div class="mb-1">
							<input type="email" class="form-control field" name="email" placeholder="Email" id="email" aria-describedby="emailHelp">
						</div>
						<div class="mb-1">
							<input type="password" class="form-control field" name="password" placeholder="Password" id="password">
						</div>
						<div class="d-grid gap-2">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
						<div class="mt-2 text-center" >
							<p>Don't Have An Account ? <a href="/register" style="text-decoration: none">Regist Now</a></p>
						</div>	
					</form>
				</div>
			</div>
		</div>

   
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
		<script src="{{ asset('assets') }}/build/sweetalert2/sweetalert2.min.js"></script>
		@stack('script')
  </body>
</html>