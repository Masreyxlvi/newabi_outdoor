@extends('dashboard.layouts.main')

@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#produk">
                Tambah Data
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Produk</th>
                            <th>Categori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produks as $produk)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $produk->nama_produk }}</td>
                                <td>{{ $produk->kategori->nama_kategori }}</td>
                                <td>Rp. {{ number_format($produk->harga) }}</td>
                                <td>{{ $produk->stok }}</td>
                                <td>Hapus | Edit
                                <td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('dashboard.produk.create')
@endsection
