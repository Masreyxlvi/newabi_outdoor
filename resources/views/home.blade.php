@extends('layouts.main')

@section('main')
    <!-- Wrapper -->
    <div class="container">
        <!-- Start: Hero -->
        <section id="hero">
            <div class="container-fluid">
                <div class="row reversing">
                    <div class="col-lg-6 col-sm-12">
                        <div class="hero-text">
                            <h1></h1>
                            <p class="lead">
                                Kami menyediakan hampir semua jenis perlengkapan berkemah dan backpacking sewaan. Anda dapat
                                menyewa paket perlengkapan atau menyewa tenda individu, kantong tidur atau ransel.Kami akan
                                mengirimkan peralatan berkemah atau
                                backpacking sewaan Anda ke mana saja di Cianjur.
                            </p>
                            <a href="#" class="btn-hubungi sm-w-100" style="opacity: 0; y:-100; ">Hubungi Saya</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="hero-banner">
                            <img src="{{ asset('assets') }}/img/hero/sampul newabi.jpg" alt="" width="" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Hero -->
    </div>

    <!-- Start: Services Section -->
    <section id="services">
        <div class="container">
            <div class="heading" data-aos="zoom-in-down">
                <h2>WE PROVIDE</h2>
                {{-- <p>Jasa dan Barang yang Kami tawarkan</p> --}}
            </div>
            <div class="layanan">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-4 col-md-6 mb-5" data-aos="flip-left" data-aos-delay="100" data-aos-duration="1500">
                        <div class="card-service">
                            <div class="c-head">
                                <img src="{{ asset('assets') }}/img/services/rental.png" alt="foto orang sedang menikah" />
                            </div>
                            <div class="c-body">
                                <h3>Rental Alat Camping</h3>
                                <p>Tersedia berbagai jenis perlengkapan berkemah dan backpacking sewaan. Mulai dari tenda
                                    individu, kantong tidur, ransel dan masih banyak lagi.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-5" data-aos="flip-left" data-aos-delay="200" data-aos-duration="1500">
                        <div class="card-service">
                            <div class="c-head">
                                <img src="{{ asset('assets') }}/img/services/jasa_antar.png" alt="foto prewedding" />
                            </div>
                            <div class="c-body">
                                <h3>Jasa Layanan Antar</h3>
                                <p>Memberikan kemudahan dalam pemesanan dan pengiriman barang sesuai kebutuhan anda.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-5" data-aos="flip-left" data-aos-delay="300" data-aos-duration="1500">
                        <div class="card-service">
                            <div class="c-head">
                                <img src="{{ asset('assets') }}/img/services/membership.png" alt="foto Product" />
                            </div>
                            <div class="c-body">
                                <h3>Membership</h3>
                                <p>Daftar sekarang dan dapatkan keuntungan lebih dengan berbagai potongan khusus.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-5" data-aos="flip-left" data-aos-delay="400" data-aos-duration="1500">
                        <div class="card-service">
                            <div class="c-head">
                                <img src="{{ asset('assets') }}/img/services/OPEN_TRIP.png" alt="" />
                            </div>
                            <div class="c-body">
                                <h3>Open Camp & Trip</h3>
                                <p>Dalam hal ini kami memberikaan ruang atau kesempatan buat sobat semua dalam menyaluran
                                    akan keresahan dalam Kegiatan Liburan Sobat Semua dengan cara memberi jalan untuk
                                    bergabung dalam kegiatan yang sesekali akan di adakan kegiatan Camping Cera Atau Naik
                                    Gunung oleh Tim Sobat Newabi</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-5" data-aos="flip-left" data-aos-delay="500" data-aos-duration="1500">
                        <div class="card-service">
                            <div class="c-head">
                                <img src="{{ asset('assets') }}/img/services/TOKO_OUTDOOR.png" alt="" />
                            </div>
                            <div class="c-body">
                                <h3>Toko Outdoor</h3>
                                <p>Tidak Hanya Dari Bidang Jasa Sewa/Rental Alat Saja, Kami Hadir Untuk Sobat Semua Dalam
                                    Penjualan Alat Outdoor Yang bisa di Akses Oleh Sobbat Semua di Newabi Outdoor.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Services Section -->

    <!-- Start: Works Section -->
    <section id="works">
        <div class="container">
            <div class="heading " data-aos="zoom-in-down">
                <h2>Equipment Rental</h2>
                <!-- <p class="sm-center">Berikut adalah karya-karya yang dari Kami</p> -->
            </div>
            <div class="my-works">
                <div class="row">
                    @foreach ($produks as $produk)
                        <div class="col-lg-4 col-sm-6 mb-5">
                            @if ($produk->stok == 0)
                                <div class="image-parent">
                                    <div class="card shadow-sm">
                                        <div class="stok">
                                            <img src="{{ asset('assets') }}/img/product/{{ $produk->gambar }}"
                                                class="w-100" alt="" />
                                            <div class="inside-content">
                                                <p>Stok Habis</p>
                                            </div>
                                            <div class="card-body">
                                                <p class="fw-3">{{ $produk->nama_produk }}</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <a href="/products/{{ $produk->nama_produk }}"
                                                            class="btn btn-sm btn-ctb d-none">Pesan Sekarang</a>
                                                    </div>
                                                    <small class="text-muted">Rp.
                                                        {{ number_format($produk->harga) }}/Hari</small>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="image-parent">
                                    <div class="card shadow-sm">
                                        <img src="{{ asset('assets') }}/img/product/{{ $produk->gambar }}" class="w-100"
                                            alt="" />
                                        <div class="card-body">
                                            <p class="fw-3">{{ $produk->nama_produk }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group ">
                                                    <a href="/products/{{ $produk->nama_produk }}"
                                                        class="btn btn-sm btn-ctb ">Pesan Sekarang</a>
                                                </div>
                                                <small class="text-muted">Rp.
                                                    {{ number_format($produk->harga) }}/Hari</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach

                    <!-- Button CTA -->
                    <div class="w-100 d-flex justify-content-center align-items-center">
                        <a href="/products" class="btn-cta">Jelajahi lebih banyak...</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Works Section -->
@endsection
