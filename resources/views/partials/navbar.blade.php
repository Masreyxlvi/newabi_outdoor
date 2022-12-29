<nav>
	<div class="container-fluid">
		<div class="navbar-flex">
			<div class="navigation-brand">
				<a href="#" class="lora text-decoration-none"><img src="{{ asset('assets') }}/img/logo/logo.png" alt="" width="50px" /><span class="fs-5">&nbsp; </span></a>
			</div>
			<div class="navigation-links">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="#services">Services</a></li>
					<li><a href="/products">Products</a></li>
					<li><a href="/categories">Categories</a></li>
					<li><a href="/contact">Contact</a></li>
				</ul>
			</div>
			<div class="navigation-social-media" >
				@auth
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="opacity: 0; y:-100;">
					{{ auth()->user()->name }}
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#"><i class="bi bi-person-circle"></i> My Profile</a></li>
						<li><a class="dropdown-item" href="/riwayat"><i class="bi bi-cart-check-fill"></i> History</a></li>
						<li><hr class="dropdown-divider"></li>
						<li>
							<form action="/logout" method="post">
								@csrf
								<button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
							</form>
						</li>
					</ul>
				@else
					<a href="/login"  class="login" style="opacity: 0; y:-100;">Login Now</a>
				@endauth
			</div>
		</div>
	</div>
</nav>