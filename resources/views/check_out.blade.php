@extends('layouts.main')

@push('head')
    <link rel="stylesheet" href="{{ asset('assets') }}/css/lokasi.css">
@endpush

@if (session()->has('succes'))
    @push('script')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Pesanan Masuk Keranjang',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endpush
@endif
@if (session()->has('success'))
    @push('script')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Alamat Berhasil Diubah',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endpush
@endif

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

@section('main')
    @if (session()->has('hapus'))
        @push('script')
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Pesanan Berhasil Di Cancel',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
        @endpush
    @endif

    <div class="container cart-page">
        <div class="row">
            <div class="col-lg-10">
                <h2>
                    <i class="fa-solid fa-cart-shopping"></i> <span>CheckOut</span>
                </h2>
            </div>
            <div class="col-lg-2">
                <a href="/products" class="btn btn-outline-dark "><i class="bi bi-box-arrow-left"></i> Back To Shop</a>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header text-danger">
                <h5><i class="fa-solid fa-location-dot"></i> Alamat Pengiriman</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <h5>{{ Auth::user()->name }}</h5>
                        <p>(+62) {{ Auth::user()->no_hp }}</p>
                    </div>
                    <div class="col-lg-7">
                        <p>{{ Auth::user()->alamat_detail }}, {{ Auth::user()->alamat }}</p>
                    </div>
                    <div class="col-lg-2 text-end">

                        <button type="button" class="border-0 text-danger bg-light" data-bs-toggle="modal"
                            data-bs-target="#FormAlamat">
                            Ubah
                        </button>
                    </div>
                    <div class="col-lg-12">

                    </div>
                </div>
            </div>
        </div>

        @include('modal')

        @if (!empty($pesanan))
            <table class="mt-2">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>SubTotal</th>
                    </tr>
                </thead>
                @foreach ($DetailPesanans as $detailPesanan)
                    <tbody>
                        <tr>
                            <td>
                                <div class="cart-info">
                                    <img src="{{ asset('assets') }}/img/product/{{ $detailPesanan->produk->gambar }}"
                                        alt="{{ $detailPesanan->produk->gambar }}">
                                    <div>
                                        <p>{{ $detailPesanan->produk->nama_produk }}</p>
                                        <small class="d-block">
                                            <b> Pickup : </b> {{ date('d/M/Y', strtotime($detailPesanan->tgl_pesan)) }}
                                            at
                                            {{ date('H:i', strtotime($detailPesanan->tgl_pesan)) }}
                                        </small>
                                        <small class="d-block">
                                            <b> Dropoff :
                                            </b>{{ date('d/M/Y', strtotime($detailPesanan->batas_waktu)) }} at
                                            {{ date('H:i', strtotime($detailPesanan->batas_waktu)) }}
                                        </small>
                                        <small>
                                            <b> Total Hari : </b>{{ $detailPesanan->lama_pesan }} hari
                                        </small>
                                        <br>
                                        <form action="/check_out/{{ $detailPesanan->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="text-danger border-0 delete"><i
                                                    class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <small>Rp.
                                    {{ number_format($detailPesanan->produk->harga) }}</small>
                            </td>
                            <td><input type="number" disabled value="{{ $detailPesanan->qty }}"></td>
                            <td>Rp. {{ number_format($detailPesanan->jumlah_harga) }}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>

            <div class="total-price">
                <table>
                    <tr>
                        <td><b>Total Pembayaran</b> </td>
                        <td>Rp. {{ number_format($pesanan->total_bayar) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <select name="jaminan" id="jaminan" class="form-control">
                                <option disabled selected>Jaminan</option>
                                <option value="ktp">Ktp</option>
                                <option value="sim">Sim</option>
                                <option value="kartu_pelajar">Kartu Pelajars</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <form action="/konfirmasi" method="post">
                                @csrf
                                <button type="submit" class="btn btn-warning"> <i
                                        class="fa-solid fa-cart-shopping"></i>Proceed
                                    To CheckOut</button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        @endif
    </div>


@endsection
@push('script')
    <script>
        $('[name="lokasi"]').on('keyup change', function() {
            if ($(this).val() == 'lokasi') {
                // alert('lokasi')
                var alamat = "Jln Baros Gg H Sulaeman Desa Sukataris Kec. Karangtengah Cianjur";
                $('#alamat').val(alamat);
                $('#isi').attr('hidden', true)
                $('#alamat').attr('readonly', true)
            } else {
                var alamat = ""
                $('#alamat').attr('readonly', false)
                $('#isi').attr('hidden', false)
                $('#alamat').val(alamat);
            }
        });

        $('.check_out').click(function(e) {
            e.preventDefault()
            let data = $(this).closest('form').find('buttom').text()
            Swal.fire({
                    // title: "Sudah Yakin?", 
                    // 	text: "Dengan Pesanan Anda?",
                    // 	buttons:true,
                    // 	dangerMode: true,
                    title: 'Sudah Yakin Dengan Pesanan Anda?',
                    icon: "info",
                    showDenyButton: true,
                    // showCancelButton: true,
                    denyButtonText: `Cancel`,
                    confirmButtonText: 'Pesan Sekarang',
                })
                .then((req) => {
                    if (req.isConfirmed) $(e.target).closest('form').submit()
                    else Swal.fire.close()
                })
        })

        // INIT: GLOBAL VARIABLE
        let province_id = '';
        let regency_id = '';
        let district_id = '';
        let village_id = '';
        let alamatValue = '';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/get-provinsi",
            dataType: 'json',
            method: "GET",
            success: function(data) {
                let value = data.provinces;
                let pilih_provinsi = $('#pilih-provinsi');

                for (let i = 0; i < value.length; i++) {
                    let options = `<option value="${value[i].id}">${value[i].name}</option>`;
                    pilih_provinsi.append(options);
                }
            }
        });

        $('#pilih-provinsi').on('keyup change', function() {
            let selectedOptions = $('#pilih-provinsi').val();
            let value = $('#pilih-provinsi option:selected').text() + ", ";

            if (selectedOptions) {
                $('#alamat-tabbar #kabupaten-tab').removeAttr('disabled');
                $('#alamat-tabbar #kabupaten-tab').tab('show');
                alamatValue = "";
                alamatValue += value;

                $('#alamat').val(alamatValue);
                province_id = selectedOptions;

                $.ajax({
                    url: '/get-kabupaten',
                    dataType: 'json',
                    method: 'POST',
                    data: {
                        province_id: province_id
                    },
                    success: function(kabupaten) {
                        console.log(kabupaten);

                        $('#pilih-kabupaten').html("");


                        let value = kabupaten.regencies;
                        for (let i = 0; i < value.length; i++) {
                            let options = `<option value="${value[i].id}">${value[i].name}</option>`;
                            $('#pilih-kabupaten').append(options);
                        }
                    }
                })
            }


        });

        $('#pilih-kabupaten').on('keyup change', function() {
            let selectedOptions = $('#pilih-kabupaten').val();
            let provinsi = $('#pilih-provinsi option:selected').text();
            let kabupaten = $('#pilih-kabupaten option:selected').text() + ", ";

            if (selectedOptions) {
                $('#alamat-tabbar #kecamatan-tab').removeAttr('disabled');
                $('#alamat-tabbar #kecamatan-tab').tab('show');

                alamatValue = "";
                alamatValue = kabupaten + provinsi;

                $('#alamat').val(alamatValue);
                regency_id = selectedOptions;

                $.ajax({
                    url: '/get-kecamatan',
                    dataType: 'json',
                    method: 'POST',
                    data: {
                        regency_id: regency_id
                    },
                    success: function(data) {
                        console.log(data);

                        $('#pilih-kecamatan').html("");
                        let value = data.districts;

                        for (let i = 0; i < value.length; i++) {
                            let options = `<option value="${value[i].id}">${value[i].name}</option>`;
                            $('#pilih-kecamatan').append(options);
                        }
                    }
                })
            }
        });

        $('#pilih-kecamatan').on('keyup change', function() {
            let selectedOptions = $(this).val();
            let provinsi = $('#pilih-provinsi option:selected').text();
            let kabupaten = $('#pilih-kabupaten option:selected').text() + ", ";
            let Kecamatan = $('#pilih-kecamatan option:selected').text() + ", ";

            if (selectedOptions) {
                $('#alamat-tabbar #desa-tab').removeAttr('disabled');
                $('#alamat-tabbar #desa-tab').tab('show');

                alamatValue = "";
                alamatValue = Kecamatan + kabupaten + provinsi;

                $('#alamat').val(alamatValue);
                district_id = selectedOptions;

                $.ajax({
                    url: '/get-desa',
                    dataType: 'json',
                    method: 'POST',
                    data: {
                        district_id: district_id
                    },
                    success: function(data) {
                        console.log(data);

                        $('#pilih-desa').html("");
                        let value = data.villages;

                        for (let i = 0; i < value.length; i++) {
                            let options = `<option value="${value[i].id}">${value[i].name}</option>`;
                            $('#pilih-desa').append(options);
                        }
                    }
                })
            }
        })

        $('#pilih-desa').on('keyup change', function() {
            let selectedOptions = $(this).val();
            let provinsi = $('#pilih-provinsi option:selected').text();
            let kabupaten = $('#pilih-kabupaten option:selected').text() + ", ";
            let Kecamatan = $('#pilih-kecamatan option:selected').text() + ", ";
            let desa = $('#pilih-desa option:selected').text() + ", ";

            if (selectedOptions) {
                $('#alamat-tabbar #desa-tab').removeAttr('disabled');
                $('#alamat-tabbar #desa-tab').tab('show');

                alamatValue = "";
                alamatValue = desa + Kecamatan + kabupaten + provinsi;

                $('#alamat').val(alamatValue);
            }
        })
    </script>
@endpush
