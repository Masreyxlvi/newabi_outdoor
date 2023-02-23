@extends('dashboard.layouts.main')
@push('head')
    <link rel="stylesheet" href="{{ asset('assets') }}/dashboard/css/style.css">
@endpush
@section('container')
    <div class="container-sm">
        <section id="product">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <img src="{{ asset('storage/' . $produk->mainImage()->image) }}" class="d-block w-100" alt="..."
                        id="ProductImg">
                    <div class="small-img-row">
                        @foreach ($images as $image)
                            <div class="small-img-col">
                                <img src="{{ asset('storage/' . $image->image) }}" class="d-block w-100 smallImg active"
                                    alt="...">
                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="small-img-col">
                            <img src="{{ asset('assets') }}/img/product/tenda1.jpg" class="d-block w-100 smallImg"
                                alt="...">
                        </div>
                        <div class="small-img-col">
                            <img src="{{ asset('assets') }}/img/product/tenda2.jpg" class="d-block w-100 smallImg"
                                alt="...">
                        </div> --}}
                </div>

                <div class="col-lg-6">
                    {{-- <div class="card card-body"> --}}
                    <div class="product_detail">
                        <h1>{{ $produk->nama_produk }}</h1>
                        <h4>Rp. {{ number_format($produk->harga) }}</h4>
                        <h4 class="text-muted">Stok <span id="stok"> {{ $produk->stok }}</span></h4>
                        <p>{{ $produk->keterangan }}</p>
                        {{-- <div class="trancation">
                            <div class="card-form">
                                <div class="accent-pills">
                                    <P>Pesan Sekarang</P>
                                </div>
                                <form action="/products/{{ $produk->nama_produk }}" method="post" class="custom-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="controlled-form mb-4">
                                                <label class="custom-label" for="qty">Jumlah Barang :</label>
                                                <input type="number"
                                                    class="custom-input @error('qty') is-invalid @enderror" name="qty"
                                                    required id="qty" value="{{ old('qty') }}" placeholder="1" />
                                            </div>
                                            <div class="controlled-form mb-4">
                                                <label class="custom-label" for="lama_pesan">Lama Pesanan :</label>
                                                <input type="number" class="custom-input" name="lama_pesan" id="lama_pesan"
                                                    required required value="{{ old('lama_pesan') }}" placeholder="1" />
                                                <span id="hari">Hari</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="controlled-form mb-4">
                                                <label class="custom-label" for="tgl_pesan">Tanggal Pengambilan :</label>
                                                <input type="text" readonly data-toggle="datepicker" class="custom-input"
                                                    required name="tanggal" id="tgl_pesan"
                                                    value="{{ old('tgl_pesan') }}" />
                                                <span id="tgl"><i class="fa-solid fa-calendar-days fs-4"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="controlled-form mb-4">
                                                <label class="custom-label" for="tgl_pesan">Waktu Pengambilan : </label>
                                                <input type="time" class="custom-input" name="waktu" id="time_pick"
                                                    required value="15:00" readonly />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="controlled-form mb-4">
                                                <label class="custom-label" for="tgl_pesan">Tanggal 'Pengembalian:</label>
                                                <input type="text" readonly class="custom-input" name="date_drop"
                                                    value="{{ old('batas_waktu') }}" id="batas_waktu" />
                                                <span id="tgl"><i class="fa-solid fa-calendar-days fs-4"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="controlled-form mb-4">
                                                <label class="custom-label" for="tgl_pesan">Waktu Pengembalian</label>
                                                <input type="time" class="custom-input" name="time_drop" id="time_drop"
                                                    value="21:00" max="21:00" />
                                                <small>Max pengembalian jam 21:00</small>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="mb-4 ">
                            <button class="btn-kontak" type="submit"><i class="fa-solid fa-cart-shopping"></i> Add To
                                Cart</button>
                        </div>
                     </form> --}}
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection
