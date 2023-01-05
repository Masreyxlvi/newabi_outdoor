@extends('layouts.main')

@section('main')
    <div class="container">
        <section id="gallery">
            <h2>Riwayat Pesanan </h2>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Invoice</th>
                                <th scope="col">Atas Nama</th>
                                <th scope="col">Tanggal Pesan</th>
                                <th scope="col">Batas Waktu</th>
                                <th scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanans as $key => $pesanan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pesanan->kode_pesanan }}</td>
                                    <td>{{ $pesanan->user->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#detail{{ $key }}">
                                            <i class="bi bi-cart3"></i>
                                        </button>
                                        <a href="/faktur/{{ $pesanan->kode_pesanan }}"
                                            class="btn btn-outline-danger btn-sm"><i class="bi bi-printer"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    @foreach ($pesanans as $key => $pesanan)
        <div class="modal fade" id="detail{{ $key }}" tabindex="-1" aria-labelledby="detailLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailLabel">Detail Pesanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama Produk</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Jumlah Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pesanan->detailPesanan as $dp)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $dp->produk->nama_produk }}</td>
                                                <td>Rp. {{ number_format($dp->produk->harga) }}</td>
                                                <td>{{ $dp->qty }}</td>
                                                <td align="center">Rp. {{ number_format($dp->jumlah_harga) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <div class="pull-right text-end">
                                    <h5><b>Total Pembayaran : </b>Rp. {{ number_format($pesanan->total_bayar) }}</h5>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Modal -->
@endsection
