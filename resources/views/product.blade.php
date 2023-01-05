@extends('layouts.main')
@section('main')

    @if ($errors->any())
        <div class="alert alert-danger" role="alert" id="error-alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- @if (session()->has('error'))
						@push('script')
							<script>								
								
							</script>
						@endpushs
					@endif --}}


    <div class="container-sm">
        <section id="product">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <img src="{{ asset('assets') }}/img/product/{{ $produk->gambar }}" class="d-block w-100" alt="..."
                        id="ProductImg">
                    <div class="small-img-row">
                        <div class="small-img-col">
                            <img src="{{ asset('assets') }}/img/product/{{ $produk->gambar }}"
                                class="d-block w-100 smallImg" alt="...">
                        </div>
                        <div class="small-img-col">
                            <img src="{{ asset('assets') }}/img/product/tenda1.jpg" class="d-block w-100 smallImg"
                                alt="...">
                        </div>
                        <div class="small-img-col">
                            <img src="{{ asset('assets') }}/img/product/tenda2.jpg" class="d-block w-100 smallImg"
                                alt="...">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- <div class="card card-body"> --}}
                    <div class="product_detail">
                        <h1>{{ $produk->nama_produk }}</h1>
                        <h4>Rp. {{ number_format($produk->harga) }}</h4>
                        <h4 class="text-muted">Stok <span id="stok"> {{ $produk->stok }}</span></h4>
                        <p>{{ $produk->keterangan }}</p>
                        <div class="trancation">
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
                                                    id="qty" value="{{ old('qty') }}" placeholder="1" />
                                            </div>
                                            <div class="controlled-form mb-4">
                                                <label class="custom-label" for="lama_pesan">Lama Pesanan :</label>
                                                <input type="number" class="custom-input" name="lama_pesan" id="lama_pesan"
                                                    value="{{ old('lama_pesan') }}" placeholder="1" />
                                                <span id="hari">Hari</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="controlled-form mb-4">
                                                <label class="custom-label" for="tgl_pesan">Pickup Date & Time :</label>
                                                <input type="text" readonly data-toggle="datepicker" class="custom-input"
                                                    name="tanggal" id="tgl_pesan" value="{{ old('tgl_pesan') }}" />
                                                <span id="tgl"><i class="fa-solid fa-calendar-days fs-4"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="controlled-form mb-4">
                                                <label class="custom-label" for="tgl_pesan">&nbsp;</label>
                                                <input type="time" class="custom-input" name="waktu" id="time_pick"
                                                    value="{{ old('tgl_pesan') }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="controlled-form mb-4">
                                                <label class="custom-label" for="tgl_pesan">Dropoff Date & Time :</label>
                                                <input type="text" readonly class="custom-input" name="date_drop"
                                                    value="{{ old('batas_waktu') }}" id="batas_waktu" />
                                                <span id="tgl"><i class="fa-solid fa-calendar-days fs-4"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="controlled-form mb-4">
                                                <label class="custom-label" for="tgl_pesan">&nbsp;</label>
                                                <input type="time" readonly class="custom-input" name="time_drop"
                                                    id="time_drop" value="{{ old('tgl_pesan') }}" />
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="mb-4 ">
                            <button class="btn-kontak" type="submit"><i class="fa-solid fa-cart-shopping"></i> Add To
                                Cart</button>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
    </div>
    </section>
    </div>

    <section id="works">
        <div class="container">
            <div class="heading">
                <h2>{{ $title }}</h2>
                <!-- <p class="sm-center">Berikut adalah karya-karya yang dari Kami</p> -->
            </div>
            <div class="my-works">
                <div class="row">
                    @foreach ($produks as $produk)
                        <div class="col-lg-4 col-sm-6 mb-5">
                            <div class="image-parent">
                                <div class="card shadow-sm">
                                    <img src="{{ asset('assets') }}/img/product/{{ $produk->gambar }}"
                                        class="w-100 smallImg" alt="" />
                                    <div class="card-body">
                                        <p class="fw-3">{{ $produk->nama_produk }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="/products/{{ $produk->nama_produk }}"
                                                    class="btn btn-sm btn-ctb">Pesan Sekarang</a>
                                            </div>
                                            <small class="text-muted">Rp. {{ number_format($produk->harga) }}/Hari</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        // datapicker
        var $tgl = $('#tgl_pesan');
        var click = $('#tgl')
        var a = new Date()
        console.log(a)
        $tgl.datepicker({
            format: 'yyyy-mm-dd',
            autoHide: true,
            startDate: new Date(),
            trigger: click,
        });

        // date now
        Date.prototype.toDateInputValue = (function() {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0, 10);
        });
        $('#tgl_pesan').val(new Date().toDateInputValue());


        // memunculkan batas waktu sesuai tgl pesan dan lama pesan
        function batasWaktu() {
            var tgl_pesan = document.getElementById('tgl_pesan').value;
            var lama_pesan = document.getElementById('lama_pesan').value;
            var lama_pesan = document.getElementById('lama_pesan').value;


            const today = new Date(tgl_pesan);
            var tomorow = new Date(today);
            // lama_pesan.toString()
            tomorow.setDate(Number(lama_pesan) + today.getDate())
            tomorow.toLocaleDateString();

            const year = tomorow.getFullYear()
            const bulan = tomorow.getMonth() + 1
            const day = tomorow.getDate()

            $('#batas_waktu').val(year + '-' + bulan + '-' + day);
        }

        $('#lama_pesan').on('keyup change', function() {
            batasWaktu(this)
        })
        $('#tgl_pesan').on('keyup change', function() {
            batasWaktu(this)
        })
        $('#time_pick').on('keyup change', function() {
            var time_pick = $('#time_pick').val();
            // var time_drop = ;
            $('#time_drop').val(time_pick);
        })

        // memunculkan alert jika jumlah barang lebih dari stok
        $('#qty').on('keyup change', function() {
            const qty = document.getElementById('qty');
            const stok = $('#stok').text();
            if (qty.value > Number(stok)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Jumlah Stok Tidak Tersedia',
                    text: 'Stok Tersedia : ' + stok,
                    showConfirmButton: false,
                    timer: 2500
                })
                $('#qty').val(stok);
            }

        })

        // produk galery
        var ProductImg = document.getElementById("ProductImg");
        var smallImg = document.getElementsByClassName("smallImg");

        smallImg[0].onclick = function() {
            ProductImg.src = smallImg[0].src;
        }
        smallImg[1].onclick = function() {
            ProductImg.src = smallImg[1].src;
        }
        smallImg[2].onclick = function() {
            ProductImg.src = smallImg[2].src;
        }
    </script>
@endpush
