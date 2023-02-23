@extends('dashboard.layouts.main')

@section('container')
    <div class="card shadow mt-4">
        <div class="card-header py-3">
            <h2>Tambah Barang</h2>
        </div>
        <div class="card-body">
            <form action="/dashboard/produk" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="kategori">Pilih Kategori</label>
                    <select class="form-control" id="kategori" required name="kategori_id">
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" name="harga" id="harga" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" name="stok" id="stok" placeholder="" required>
                </div>
                <label for="stok">Gambar</label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02" name="images[]" accept="image/*"
                        multiple>
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Produk</label>
                    <textarea class="form-control" id="deskripsi" name="keterangan" rows="3"></textarea>
                </div>
                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script')
    {{-- <script>
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
    </script> --}}
@endpush
