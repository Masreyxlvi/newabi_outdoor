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
            <a href="/dashboard/user/create" class="btn btn-info">Tambah Produk</a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            {{-- <th>Gambar</th> --}}
                            <th>Nama User</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Alamat Detail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>

                                <td>{{ $user->name }}</td>
                                <td>{{ $user->no_hp }}</td>
                                <td>{{ $user->alamat }}</td>
                                <td>{{ $user->alamat_detail }}</td>
                                <td>
                                    <a href="/dashboard/user/{{ $user->id }}/edit" class="btn btn-warning">Edit</a>

                                    <form action="/dashboard/user/{{ $user->id }}" method="POST" class="d-inline">
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
    {{-- @include('dashboard.produk.import') --}}
@endsection
