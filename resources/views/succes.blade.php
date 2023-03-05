<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Page</title>
    <link rel="stylesheet" href="{{ asset('assets') }}/css/success.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="success-box animate">
            <div class="success-icon animate-check">&#10004;</div>
            <div class="success-title">Pesanan Diproses!</div>
            <div class="success-description">Your request has been processed.</div>
            <a href="/products" class="back-button"><i class="bi bi-box-arrow-left"></i> Kembali Memesan</a>
            <button class="success-button" onclick="whatsapp()" id="wa"><i class="bi bi-whatsapp"></i> Kirim
                Pesan
            </button>
            <audio id="sound">
                <source src="{{ asset('assets') }}/sound/success-sound.mp3" type="audio/mpeg" />
                Browsermu tidak mendukung tag audio, upgrade donk!
            </audio>
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

                    window.open(url, "_blank").focus();
                }
            });
        }
    </script>
    <script>
        window.onload = function() {

            var promise = document.getElementById('sound').play();;

            if (promise !== undefined) {
                promise.then(_ => {
                    promise.play();
                }).catch(error => {
                    // Autoplay was prevented.
                    // Show a "Play" button so that user can start playback.
                });
            }
        };
    </script>
</body>

</html>
