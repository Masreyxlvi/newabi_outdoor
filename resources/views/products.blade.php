@extends('layouts.main')

@section('main')
    <div class="container">
        <section id="gallery" class="mb-120">
            <h2>{{ $title }}</h2>
            <div class="row">
                <div class="col-md-6">
                    <nav aria-label="breadcrumb link">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/categories">Categories</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6">
                    <form action="/products">
                        @if (request('kategori'))
                            <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                        @endif
                        <div class="input-group mb-3">
                            <input type="search" name="search" class="form-control" placeholder="Search"
                                value="{{ request('search') }}" />
                            <button class="btn btn-outline-dark" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="my-works">
                <div class="row">
                    @if ($produks->count())
                        @foreach ($produks as $produk)
                            <div class="col-lg-4 col-sm-6 mb-5">
                                @if ($produk->stok == 0)
                                    <div class="image-parent">
                                        <div class="card shadow-sm">
                                            <div class="stok">
                                                <img src="{{ asset('storage/' . $produk->mainImage()->image) }}"
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
                                            <div class="stok-ada">
                                                <img src="{{ asset('storage/' . $produk->mainImage()->image) }}"
                                                    class="w-100" alt="" />
                                            </div>
                                            <div class="card-body">
                                                <p class="fw-3">{{ $produk->nama_produk }}</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <a href="/products/{{ $produk->nama_produk }}"
                                                            class="btn btn-sm btn-ctb">Pesan Sekarang</a>
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
                    @else
                        <p class="text-center fs-5 mt-2">Product is not available</p>
                    @endif
                </div>
            </div>
        </section>
        <!--  -->
    </div>
@endsection
