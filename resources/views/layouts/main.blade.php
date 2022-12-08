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
    <link rel="stylesheet" href="{{ asset('assets') }}/build/font-awesome/css/all.min.css" />
    {{-- sweetalert --}}
    <link rel="stylesheet" href="{{ asset('assets') }}/build/sweetalert2/sweetalert2.min.css" />
    {{-- Datepicker --}}
    <link rel="stylesheet" href="{{ asset('assets') }}/build/datepicker/datepicker.css" />


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
      <?php
        $pesanan_utama = App\Models\Pesanan::where('status', "belum_checkout")->first();
        if(!empty($pesanan_utama))
        {
          $notif = App\Models\DetailPesanan::where('pesanan_id', $pesanan_utama->id)->count();
        }
      ?>
      <a class="wafixed" href="/check_out">
        <i class="fa-solid fa-cart-shopping text-white fs-2"></i>
        @if(!empty($notif)) 
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{ $notif }}
            <span class="visually-hidden">unread messages</span>
          </span>
        @endif
      </a>
    </main>

    <!-- Footer Section -->
    <footer>
			@include('partials.footer')
    </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="{{ asset('assets') }}/build/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{ asset('assets') }}/build/font-awesome/js/all.min.js"></script>
    {{-- datepicker --}}
    <script src="{{ asset('assets') }}/build/jquery/jquery.js"></script>
    <script src="{{ asset('assets') }}/build/datepicker/datepicker.js"></script>
    <script>
      $('.delete').click(function(e){
        e.preventDefault()
        let data = $(this).closest('form').find('buttom').text()
        swal({
          title: "Kamu Yakin?", 
          text: "Pesanan ini Ingin Dicancel?",
          icon: "warning",
          buttons:true,
          dangerMode: true,
        })
        .then((req) => {
          if(req) $(e.target).closest('form').submit()
          else swal.close()
        })
      })
    </script>
    @stack('script')
  </body>
</html>
