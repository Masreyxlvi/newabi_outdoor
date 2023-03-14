@extends('dashboard.layouts.main')

@push('head')
    <link rel="stylesheet" href="{{ asset('assets') }}/dashboard/css/style.css">
@endpush
@section('container')
    @if (session()->has('succes'))
        <div class="alert alert-success" id="succes-alert" role="alert">
            {{ session('succes') }}
        </div>
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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#produk">
                Tambah Data
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importData">
                import
            </button>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No Invoice</th>
                            <th>Nama</th>
                            <th>Jaminan</th>
                            <th>layanan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanans as $key => $pesanan)
                            <tr>
                                <td>{{ $pesanan->kode_pesanan }}</td>
                                <td>{{ Auth::user()->name }}</td>
                                {{-- <td>{{ Auth::user()->alamat }} {{ Auth::user()->alamat_detail }}</td>
                                <td>{{ Auth::user()->no_hp }}</td> --}}
                                <td>{{ $pesanan->jaminan }}</td>
                                <td>
                                    @if ($pesanan->pickup == 'jasa_antar')
                                        Jasa Antar
                                    @else
                                        Datang Ke Lokasi
                                    @endif
                                </td>
                                <td>
                                    @if (empty($pesanan->ongkir) && $pesanan->pickup == 'jasa_antar')
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#ongkir{{ $key }}">
                                            <i class="fa fa-truck"></i>
                                        </button>
                                    @endif
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#detailPesanan{{ $key }}">
                                        <i class="fa fa-eye"></i>
                                    </button>

                                    <a href="/dashboard/pesanan/faktur/{{ $pesanan->kode_pesanan }}" class="btn btn-info">
                                        <i class="fa fa-book" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- @include('dashboard.produk.create') --}}
    @include('dashboard.pesanan.detail_pesanan')
    @include('dashboard.pesanan.ongkir')
@endsection
