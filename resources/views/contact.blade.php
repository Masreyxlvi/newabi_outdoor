<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets') }}/img/logo/logo.png" />
    <title>NEWABI OUTDOOR | Contact</title>
    {{-- bootstrap --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
    {{-- font-awesome --}}
    <link rel="stylesheet" href="{{ asset('assets') }}/build/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/contact.css" />
    {{-- <link rel="stylesheet" href="{{ asset('assets') }}/build/sweetalert2/sweetalert2.min.css" /> --}}
</head>

<body>
    <section class="contact">
        <div class="content">
            <h1>Contact Us</h1>
            <p class="sm-center">You feedbacks are important to our product development. We carefully consider every
                comments from customers, and apply changes for our outdoor equipments. For anything related to Khemah
                Camping, please let us know via below contact form, and contact information</p>
        </div>
        <div class="container-box">
            <div class="left">
                <div class="box">
                    <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="text">
                        <h3>Alamat</h3>
                        <p>Jln Baros, Gg H Sulaeman, <br> Desa Sukataris, Karangtengah, <br> Cianjur</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa-brands fa-instagram"></i></div>
                    <div class="text">
                        <h3>Instagram</h3>
                        <p>@newabirentaloutdoor</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa-brands fa-whatsapp"></i></div>
                    <div class="text">
                        <h3>WhatsApp</h3>
                        <p>0877-2802-5262</p>
                    </div>
                </div>
            </div>
            <div class="right">
                @if (session()->has('succes'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Register!</strong> Has Been Success.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="">
                    <h2>Contact US</h2>
                    <div class="field">
                        <input type="text" name="email" id="email" placeholder="Your Full Name">
                    </div>
                    <div class="field">
                        <input type="email" name="email" id="email" placeholder="Your Email">
                    </div>
                    <div class="field">
                        <input type="number" name="no_wa" id="no_wa" placeholder="Your Whatsapp">
                    </div>
                    <div class="field">
                        <textarea type="text" name="message" id="message" placeholder="Your Messange"></textarea>
                    </div>
                    <button type="submit" class="btn-login">Kirim</button>
                    <p><a href="/"><i class="fa-solid fa-arrow-left"></i> Back To Home</a></p>
                </form>
            </div>
        </div>
    </section>

    <script src="{{ asset('assets') }}/build/font-awesome/js/all.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> --}}
    @stack('script')
</body>

</html>
