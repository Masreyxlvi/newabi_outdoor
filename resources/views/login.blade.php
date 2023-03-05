@extends('layouts.main')
@push('head')
    <link rel="stylesheet" href="{{ asset('assets') }}/css/login.css">
@endpush
@section('main')
    <div class="account-page">
        @if (session()->has('succes'))
            @push('script')
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Registrasi Berhasil',
                        showConfirmButton: false,
                        timer: 2000
                    })
                </script>
            @endpush
        @endif
        @if (session()->has('error'))
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
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ asset('assets') }}/img/hero/sampul newabi.png" alt="" width="100%">
                </div>
                <div class="col-lg-6">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="Login()">Login</span>
                            <span onclick="Register()">Register</span>
                            <hr id="indicator">
                        </div>

                        <form action="/login" method="post" id="loginForm">
                            @csrf
                            <input type="email" placeholder="Email" name="email">
                            <input type="password" placeholder="Password" name="password">
                            <button type="submit" class="login mb-2">Login</button>

                            <hr />
                            <p>OR</p>
                            <hr />


                            <a href="{{ route('login.google') }}" class="btn-google"> <img
                                    src="{{ asset('assets') }}/img/icons/google.png" alt="">
                                Log In With Google</a>
                            <div class="clear"></div>



                        </form>

                        <form action="/register" method="POST" id="regForm">
                            @csrf
                            <input type="text" placeholder="Username" name="name"
                                class="@error('name') is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="email" placeholder="Email" name="email"
                                class="@error('email') is-invalid @enderror">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="password" placeholder="Password" name="password"
                                class="@error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <button type="submit" class="login">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('script')
    <script>
        var loginForm = document.getElementById("loginForm")
        var regForm = document.getElementById("regForm")
        var indicator = document.getElementById("indicator")

        function Register() {
            regForm.style.transform = "translateX(0px)"
            loginForm.style.transform = "translateX(0px)"
            indicator.style.transform = "translateX(100px)"
        }

        function Login() {
            regForm.style.transform = "translateX(300px)"
            loginForm.style.transform = "translateX(300px)"
            indicator.style.transform = "translateX(0)"
        }
    </script>
@endpush
