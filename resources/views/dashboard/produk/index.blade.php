@extends('dashboard.layouts.main')

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
            {{-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#produk">
                Tambah Data
            </button> --}}
            <a href="/dashboard/produk/create" class="btn btn-info">Tambah Produk</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importData">
                import
            </button>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            {{-- <th>Gambar</th> --}}
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
                                {{-- <td><img src="{{ asset('storage/' . $produk->gambar1) }}" alt="{{ $produk->gambar }}"
                                        width="50px"></td> --}}
                                <td>{{ $produk->nama_produk }}</td>
                                <td>{{ $produk->kategori->nama_kategori }}</td>
                                <td>Rp. {{ number_format($produk->harga) }}</td>
                                <td>{{ $produk->stok }}</td>
                                <td>
                                    <a href="/dashboard/produk/{{ $produk->id }}/edit" class="btn btn-warning">Edit</a>
                                    <a href="/dashboard/produk/{{ $produk->id }}" class="btn btn-info">Show</a>
                                    <form action="/dashboard/produk/{{ $produk->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger border-0 delete"><i
                                                class="mdi me-2 mdi-delete">Delete</i></button>
                                    </form>
                                <td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- @include('dashboard.produk.create') --}}
    @include('dashboard.produk.import')
@endsection
