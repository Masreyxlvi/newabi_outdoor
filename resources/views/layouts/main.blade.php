<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" href="{{ asset('assets') }}/img/logo/logo.png" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/responsive.css" />
    {{-- icons  Awesome --}}
    <link rel="stylesheet" href="{{ asset('assets') }}/build/font-awesome/css/all.min.css" />
    {{-- sweetalert --}}
    <link rel="stylesheet" href="{{ asset('assets') }}/build/sweetalert2/sweetalert2.min.css" />
    {{-- Datepicker --}}
    <link rel="stylesheet" href="{{ asset('assets') }}/build/datepicker/datepicker.css" />
    {{-- bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    {{-- Aos --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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
        @Auth
            <?php
            $pesanan_utama = App\Models\Pesanan::where('status', 'belum_checkout')
                ->where('user_id', Auth::user()->id)
                ->first();
            if (!empty($pesanan_utama)) {
                $notif = App\Models\DetailPesanan::where('pesanan_id', $pesanan_utama->id)->count();
            }
            ?>
            <a class="wafixed" href="/check_out">
                <i class="fa-solid fa-cart-shopping text-white fs-2"></i>
                @if (!empty($notif))
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $notif }}
                        <span class="visually-hidden">unread messages</span>
                    </span>
                @endif
            </a>
        @endAuth
    </main>

    <!-- Footer Section -->
    <footer>
        @include('partials.footer')
    </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="{{ asset('assets') }}/build/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{ asset('assets') }}/build/sweetalert/sweetalert.min.js"></script>
    <script src="{{ asset('assets') }}/build/font-awesome/js/all.min.js"></script>
    {{-- datepicker --}}
    <script src="{{ asset('assets') }}/build/jquery/jquery.js"></script>
    <script src="{{ asset('assets') }}/build/datepicker/datepicker.js"></script>
    {{-- Aos --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{-- Gsap --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/TextPlugin.min.js"></script>
    <script>
        const produk = document.querySelectorAll('.image-parent');

        produk.forEach((img, i) => {
            img.dataset.aos = 'fade-down';
            img.dataset.aosDelay = i * 100;
        });

        AOS.init({
            duration: 1000,
            once: true,
        });

        gsap.registerPlugin(TextPlugin);
        // navbar
        gsap.from('.navigation-brand a', {
            duration: 1,
            y: '-100%',
            opacity: 0,
            ease: 'bounce'
        });
        gsap.to('.hero-text h1', {
            duration: 1,
            delay: 1,
            text: 'NEWABI OUTDOOR'
        });
        gsap.from('.navigation-links ul', {
            duration: 1,
            delay: 1.5,
            y: '-100%',
            opacity: 0,
            ease: 'elastic'
        });
        gsap.to('.navigation-social-media a', {
            duration: 1,
            delay: 2,
            y: 0,
            opacity: 100,
            ease: 'elastic'
        });
        // hero
        // gsap.from('.hero-text h1', {
        //     duration: 1,
        //     delay: 2,
        //     y: -100,
        //     opacity: 0,
        //     ease: 'power3'
        // })
        gsap.from('.hero-text p', {
            duration: 1,
            delay: 2.3,
            x: -100,
            opacity: 0,
            ease: 'power4'
        })
        gsap.from('.hero-banner', {
            duration: 1.2,
            delay: 2.7,
            x: 100,
            opacity: 0,
            ease: 'elastic'
        })
        gsap.to('.hero-text a', {
            duration: 1,
            delay: 3.5,
            y: 0,
            opacity: 100,
            ease: 'elastic'
        })
    </script>

    <script>
        $('.delete').click(function(e) {
            e.preventDefault()
            let data = $(this).closest('form').find('buttom').text()
            swal({
                    title: "Kamu Yakin?",
                    text: "Pesanan ini Ingin Dicancel?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((req) => {
                    if (req) $(e.target).closest('form').submit()
                    else swal.close()
                })
        })
    </script>

    @stack('script')
</body>

</html>
