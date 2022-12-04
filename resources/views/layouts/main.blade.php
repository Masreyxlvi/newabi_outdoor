<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="{{ asset('assets') }}/img/logo/logo.png" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/responsive.css" />
    {{-- icons  Awesome--}}
    <link rel="stylesheet" href="{{ asset('assets') }}/build/font-awesome/css/all.css" />

    @stack('head')

    <title>NEWABI OUTDOOR | Home</title>
  </head> 
  <body>
    <!-- Header Content -->
    <header>
      <div class="container">
        <!-- Start: Navbar -->
					@include('partials.navbar')
        <!-- End: Navbar -->
      </div>
      <div class="sm-divider"></div>
    </header>

    <!-- Main Content -->
    <main>
			@yield('main')
      <a class="wafixed" href="https://wa.me/62823928XXX" target="_blank" >
        <i class="fa-solid fa-cart-shopping text-success fs-2"></i>
      </a>
    </main>

    <!-- Footer Section -->
    <footer>
			@include('partials.footer')
    </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="{{ asset('assets') }}/build/font-awesome/js/all.js"></script>
  </body>
</html>
