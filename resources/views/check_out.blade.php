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
        <div class="row justify-content-between">
            <div class="col-lg-10 col-12 d-flex align-items-start flex-column">
                <h2 class="text-end mb-3">
                    <i class="fa-solid fa-cart-shopping"></i> <span>CheckOut</span>
                </h2>
            </div>
            <div class="col-lg-2 col-12 d-flex align-items-end flex-column">
                <a href="/products" class="btn btn-outline-dark mb-3"><i class="bi bi-box-arrow-left"></i> Back To Shop</a>
            </div>
        </div>


        @if (!empty($pesanan))
            <div class="card mt-4">
                <div class="card-header text-danger">
                    <h5><i class="fa-solid fa-location-dot"></i> Alamat Pengiriman</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <h5>{{ Auth::user()->name }}</h5>
                            @if (empty(Auth::user()->no_hp))
                                <p>(+62) <i>Harap Isi No Hp </i></p>
                            @else
                                <p>(+62) {{ Auth::user()->no_hp }}</p>
                            @endif
                        </div>
                        <div class="col-lg-7">
                            @if (empty(Auth::user()->alamat))
                                <p><i>Harap Isi Alamat Untuk Melanjutkan Pemesanan</i></p>
                            @else
                                <p>{{ Auth::user()->alamat_detail }}, {{ Auth::user()->alamat }}</p>
                            @endif
                        </div>
                        <div class="col-lg-2 text-end">

                            <button type="button" class="border-0 text-danger bg-light" data-bs-toggle="modal"
                                data-bs-target="#FormAlamat">
                                @if (empty(Auth::user()->no_hp || Auth::user()->alamat))
                                    Lengkapi
                                @else
                                    Ubah
                                @endif
                            </button>
                        </div>
                        <div class="col-lg-12">
                            <h1></h1>
                        </div>
                    </div>
                </div>
            </div>

            @include('modal')


            <table class="mt-2">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>SubTotal</th>
                    </tr>
                </thead>
                @foreach ($DetailPesanans as $detailPesanan)
                    <tbody>
                        <tr>
                            <td>
                                <div class="cart-info">
                                    <img src="{{ asset('storage/' . $detailPesanan->produk->mainImage()->image) }}"
                                        alt="{{ $detailPesanan->produk->gambar }}">
                                    <div>
                                        <p>{{ $detailPesanan->produk->nama_produk }}</p>
                                        <small>Rp.
                                            {{ number_format($detailPesanan->produk->harga) }}</small>
                                        <br>
                                        <small>
                                            {{ $detailPesanan->lama_pesan }} Hari</small>

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
                            <td>{{ $detailPesanan->qty }}</td>
                            <td>Rp. {{ number_format($detailPesanan->jumlah_harga) }}</td>
                        </tr>

                    </tbody>
                    <tfoot>

                    </tfoot>
                @endforeach
            </table>
            <form action="/konfirmasi" method="POST">
                @csrf
                <div class="total-price">
                    <table class="price">
                        <tr class="delivery">
                            <td><b>Pengiriman Barang</b></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input type="radio" required name="pickup" value="jasa_antar" id="jasa_antar" hidden>
                                    <label for="jasa_antar">
                                        <div class="card mb-0">
                                            <div class="card-body text-center">
                                                <span>Pakai Jasa Antar</span>
                                                <div class="float-end px-1 py-1">
                                                    {{-- <i class="fas fa-check-circle"></i> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input type="radio" required name="pickup" value="ke_lokasi" id="tempat" hidden>
                                    <label for="tempat">
                                        <div class="card mb-0">
                                            <div class="card-body text-center">
                                                <span>Pergi Ke Lokasi</span>
                                                <div class="float-end px-1 py-1">
                                                    {{-- <i class="fas fa-check-circle"></i> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Jaminan</b></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <select name="jaminan" required id="jaminan" class="form-control">
                                    <option value="ktp">KTP</option>
                                    <option value="sim">SIM</option>
                                    <option value="kartu_pelajar">Kartu Pelajar</option>
                                </select>
                            </td>
                        </tr>

                        <tr class="delivery">
                            <td><b>Total Pembayaran</b> </td>
                            <td>
                                Rp. {{ number_format($pesanan->total_bayar) }}
                            </td>
                        </tr>
                        <tr class="d-none " id="ongkir">
                            {{-- <td>&nbsp;</td> --}}
                            <td colspan="2"><i>*Belum Termasuk Ongkir*</i> </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="btn btn-dark"> <i
                                        class="fa-solid fa-cart-shopping"></i>Proceed
                                    To CheckOut</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        @else
            <div class="container cart-page mt-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 text-center">
                                <h2>Belum Ada produk di Keranjang</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
@push('script')
    <script>
        $('[name="pickup"]').on('change', function() {
            if ($(this).val() == 'jasa_antar') {
                $('#ongkir').removeClass('d-none');
            } else {
                $('#ongkir').addClass('d-none');
            }
        });
    </script>
    <script>
        $('.check_out').click(function(e) {
            e.preventDefault()
            let data = $(this).closest('form').find('buttom').text()
            Swal.fire({
                    title: 'Sudah Yakin Dengan Pesanan Anda?',
                    icon: "info",
                    showDenyButton: true,
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
                $('#myTab  #kabupaten-tab').removeAttr('disabled');
                $('#myTab  #kabupaten-tab').tab('show');
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

                        $('#pilih-kabupaten').html(
                            "<option disabled selected>Pilih Kabupaten</option>");


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
                $('#myTab  #kecamatan-tab').removeAttr('disabled');
                $('#myTab  #kecamatan-tab').tab('show');

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

                        $('#pilih-kecamatan').html(
                            "<option disabled selected>Pilih Kecamatan</option>");
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
                $('#myTab  #desa-tab').removeAttr('disabled');
                $('#myTab  #desa-tab').tab('show');

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

                        $('#pilih-desa').html("<option disabled selected>Pilih Desa</option>");
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
                $('#myTab  #desa-tab').removeAttr('disabled');
                $('#myTab  #desa-tab').tab('show');

                alamatValue = "";
                alamatValue = desa + Kecamatan + kabupaten + provinsi;

                $('#alamat').val(alamatValue);
            }
        })
    </script>
@endpush
