@extends('dashboard.layouts.main')

@section('container')
    <div class="card shadow  mb-4">
        <div class="card-header py-3">
            <h2> Edit Produk </h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <form action="/dashboard/produk/{{ $produk->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder=""
                                required value="{{ old('nama_produk', $produk->nama_produk) }}">
                        </div>
                        <div class="form-group">
                            <label for="kategori">Pilih Kategori</label>
                            <select class="form-control" id="kategori" required name="kategori_id">
                                @foreach ($kategoris as $kategori)
                                    @if (old('kategori_id', $produk->kategori_id) == $kategori->id)
                                        <option value="{{ $kategori->id }}" selected>{{ $kategori->nama_kategori }}</option>
                                    @else
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga" placeholder="" required
                                value="{{ old('harga', $produk->harga) }}">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control" name="stok" id="stok" placeholder="" required
                                value="{{ old('stok', $produk->stok) }}">
                        </div>
                        <label for="stok">Gambar</label>
                        <input type="hidden" name="oldGambar" value="{{ $produk->gambar1 }}">
                        @if ($produk->gambar1)
                            <img src="{{ asset('storage/' . $produk->gambar1) }}"
                                class="img-preview img-fluid mb-3 col-sm-3 d-block">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-3">
                        @endif
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar1" name="gambar1"
                                    aria-describedby="inputGroupFileAddon01" onchange="previewImage()">
                                <label class="custom-file-label" for="gambar1">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Produk</label>
                            <textarea class="form-control" id="deskripsi" name="keterangan" rows="3">{{ $produk->keterangan }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function previewImage() {
            const image = document.querySelector('#gambar1');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush
