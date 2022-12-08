<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>NEWABI OUTDOOR | Login</title>
	<link rel="stylesheet" href="{{ asset('assets') }}/css/login.css" />
</head>
<body>
	<div class="container">
		<div class="login-box">
			<div class="left"></div>
			<div class="right">
				<h2>Registration</h2>
				<form action="/register" method="post">
					@csrf
					<input type="text" name="username" id="username" class="field" placeholder="Username">
					<input type="number" name="no_hp" id="no_hp" class="field" placeholder="NO Whatsapp">
					<input type="email" name="email" id="email" class="field" placeholder="Email">
					<input type="password" name="password" id="password" class="field" placeholder="Password">
					<p>Allready Register ? <a href="/login">Login</a></p>
					<button type="submit" class="btn">Register</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>