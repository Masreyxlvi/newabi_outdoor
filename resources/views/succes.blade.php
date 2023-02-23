<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>NEWABI OUTDOOR | SUCCESS</title>
    <link rel="shortcut icon" href="{{ asset('assets') }}/img/logo/logo.png" />

    <link rel="stylesheet" href="{{ asset('assets') }}/css/success.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/responsive.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>



<body>
    <div class="container">
        <div class="success text-center">
            <i class="bi bi-check2"></i>
            <h2>Pesanan Anda Sedang Di Proses</h2>
            <p>Silahkan kirim pesan untuk konfirmasi pesanan anda</p>
            <span id="data"></span>
            <div class="tombol">
                <a href="/products" class="btn btn-danger"><i class="bi bi-box-arrow-left"></i> Kembali Memesan</a>
                <button class="btn btn-success" onclick="whatsapp()" id="wa"><i class="bi bi-whatsapp"></i> Kirim
                    Pesan</button>
            </div>
        </div>


    </div>


    <script src="{{ asset('assets') }}/build/jquery/jquery.js"></script>
    <script>
        function whatsapp() {
            var url = ""
            var nama_produk = ""
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/whatsapp",
                dataType: 'json',
                method: "GET",

                success: function(data) {
                    let pesanan = data.pesanans;
                    let detail_pesanan = pesanan.detail_pesanan
                    console.log(pesanan.kode_pesanan);
                    console.log(detail_pesanan);

                    for (let i = 0; i < detail_pesanan.length; i++) {
                        nama_produk = detail_pesanan[i].produk.nama_produk + "%0a";
                        console.log(nama_produk);
                    }
                    url = "https://wa.me/+6287728025262?text=" +
                        "*Apakah Pesanan Saya Ready?* " + "%0a" + "%0a" +
                        "_" + pesanan.kode_pesanan + "_"
                    // nama_produk
                    window.open(url, "_blank").focus();
                }
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    {{-- Gsap --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/TextPlugin.min.js"></script>
    <script>
        gsap.from('.success', {
            duration: 0.2,
            // delay: 1,
            // y: '-100%',
            opacity: 0,
            // ease: 'elastic'
        });
        gsap.from('.bi', {
            duration: 1,
            // delay: 0.5,
            y: '-100%',
            opacity: 0,
            ease: 'elastic'
        });
        gsap.from('.success h2', {
            duration: 1,
            delay: 0.5,
            x: -100,
            opacity: 0,
            ease: 'power4'
        })
        gsap.from('.success p', {
            duration: 1.2,
            delay: 0.8,
            x: 100,
            opacity: 0,
            ease: 'elastic'
        })
        gsap.from('.tombol', {
            duration: 1,
            delay: 1.2,
            y: 0,
            opacity: 0,
            ease: 'elastic'
        })
    </script>
</body>

</html>
