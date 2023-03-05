@extends('dashboard.layouts.main')

@push('head')
    <link rel="stylesheet" href="{{ asset('assets') }}/css/faktur.css">
@endpush
@section('container')
    <div class="page-content container">
        <div class="page-header text-blue-d2">
            <h1 class="page-title text-secondary-d1">
                Invoice
                <small class="page-info">
                    <i class="fa fa-angle-double-right text-80"></i>
                    ID: {{ $pesanan->kode_pesanan }}
                </small>
            </h1>

            <div class="page-tools">
                <div class="action-buttons">
                    <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                        <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                        Print
                    </a>
                    <a class="btn bg-white btn-light mx-1px text-95" href="/dashboard/pesanan/cetakPdf/{{ $pesanan->id }}"
                        target="_blank" data-title="PDF">
                        <i class="mr-1 fa fa-file-pdf text-danger-m1 text-120 w-2"></i>
                        Export
                    </a>
                </div>
            </div>
        </div>

        <div class="container px-0">
            <div class="row mt-4">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center text-150">
                                <img src="{{ asset('assets') }}/img/logo/logo.png" alt="" width="60px" />
                                <span class="fs-4">&nbsp; NEWABI OUTDOOR</span>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->

                    <hr class="row brc-default-l1 mx-n1 mb-4" />

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">Kepada :</span>
                                <span
                                    class="text-600 text-110 text-blue align-middle text-capitalize">{{ $pesanan->user->name }}</span>
                            </div>
                            <div class="text-grey-m2">
                                @if ($pesanan->pickup == 'jasa_antar')
                                    <div class="my-1">
                                        {{ $pesanan->user->alamat_detail }}
                                        <br>
                                        {{ $pesanan->user->alamat }}
                                    </div>
                                @else
                                    <div class="my-1">
                                        Jln Baros, Gg H Sulaeman, RT 01, RW 05
                                        <br>
                                        Sukataris, Karangtengah, Cianjur
                                    </div>
                                @endif
                                <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b
                                        class="text-600">+62 {{ $pesanan->user->no_hp }}</b>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->

                        <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                            <hr class="d-sm-none" />
                            <div class="text-grey-m2">
                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                    Invoice
                                </div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">ID:</span> {{ $pesanan->kode_pesanan }}</div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90 ">Jaminan: <span class="text-uppercase">
                                            {{ $pesanan->jaminan }}</span> </span> </div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">
                                        Layanan: @if ($pesanan->pickup == 'jasa_antar')
                                            Jasa Antar
                                        @else
                                            Datang Ke Lokasi
                                        @endif
                                    </span>

                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>


                    <div class="table-responsive">
                        <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                            <thead class="bg-none bgc-default-tp1">
                                <tr class="text-white">
                                    <th class="opacity-2">#</th>
                                    <th>Nama Produk</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th width="140">SubTotal</th>
                                </tr>
                            </thead>

                            <tbody class="text-95 text-secondary-d3">
                                @foreach ($pesanan->detailPesanan as $dp)
                                    <tr>
                                        <td>
                                            <small class="d-block">
                                                <b> Pickup : </b>
                                                {{ date('d/M/Y', strtotime($dp->tgl_pesan)) }}
                                                at
                                                {{ date('H:i', strtotime($dp->tgl_pesan)) }}
                                            </small>
                                            <small class="d-block">
                                                <b> Dropoff :
                                                </b>{{ date('d/M/Y', strtotime($dp->batas_waktu)) }} at
                                                {{ date('H:i', strtotime($dp->batas_waktu)) }}
                                            </small>
                                            <small>
                                                <b> Total Hari : </b>{{ $dp->lama_pesan }} hari
                                            </small>

                                        </td>
                                        <td>{{ $dp->produk->nama_produk }}</td>
                                        <td>{{ $dp->qty }}</td>
                                        <td class="text-95">Rp. {{ number_format($dp->produk->harga) }}</td>
                                        <td class="text-secondary-d2">Rp. {{ number_format($dp->jumlah_harga) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="row mt-2">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            <div class="row align-items-center bgc-primary-l3 p-2">

                            </div>
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right fs-5">
                                    Ongkos Kirim
                                </div>
                                <div class="col-5">
                                    @if (empty($pesanan->ongkir))
                                        <span class="text-110 text-success-d3 opacity-2">-</span>
                                    @else
                                        <span class="text-110 text-success-d3 opacity-2">Rp.
                                            {{ number_format($pesanan->ongkir) }}</span>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right fs-5">
                                    Total Pembayaran
                                </div>
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2">Rp.
                                        {{ number_format($pesanan->total_bayar) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div>
                        <span class="text-secondary-d1 text-105">Thank you for your business</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
