@extends('dashboard.layouts.main')

@section('container')
    <div class="card shadow mt-4">
        <div class="card-header py-3">
            <h2>Tambah User</h2>
        </div>
        <div class="card-body">
            <form action="/dashboard/user" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row mb-3">
                            <label for="name" class="col-sm-4 col-form-label custom-label">Nama
                                :</label>
                            <div class="col-sm-8">
                                <input type="text" id="name" name="name" class="form-control costum-input">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-4 col-form-label custom-label">No Hand
                                Phone
                                :</label>
                            <div class="col-sm-8">
                                <input type="text" id="no_hp" name="no_hp" class="form-control costum-input">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row mb-3">
                            <label for="name" class="col-sm-4 col-form-label custom-label">Alamat
                                :</label>
                            <div class="col-sm-8">
                                <textarea type="text" id="alamat" name="alamat" class="form-control-plaintext costum-input" readonly
                                    value="">{{ Auth::user()->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="row justify-content-end mb-3">
                            <div id="inputAlamat" class="d-none col-lg-8">
                                <ul class="nav nav-tabs justify-content-center flex-column flex-sm-row nav-justified"
                                    id="myTab" role="tablist">
                                    <li class="nav-item " role="presentation">
                                        <button class="nav-link active" id="provinsi-tab" data-bs-toggle="tab"
                                            data-bs-target="#provinsi" type="button" role="tab"
                                            aria-controls="provinsi" aria-selected="true">Provinsi</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="kabupaten-tab" data-bs-toggle="tab"
                                            data-bs-target="#kabupaten" type="button" role="tab"
                                            aria-controls="kabupaten" disabled aria-selected="false"
                                            style="cursor:not-allowed">Kabupaten</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="kecamatan-tab" data-bs-toggle="tab"
                                            data-bs-target="#kecamatan" type="button" role="tab"
                                            aria-controls="kecamatan" disabled aria-selected="false"
                                            style="cursor:not-allowed">Kecamatan</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="desa-tab" data-bs-toggle="tab" data-bs-target="#desa"
                                            type="button" role="tab" aria-controls="desa" aria-selected="false"
                                            disabled style="cursor:not-allowed">Desa</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="provinsi" role="tabpanel"
                                        aria-labelledby="provinsi-tab">
                                        <select class="form-select" aria-label="Default select example" id="pilih-provinsi">
                                            <option value="" disabled selected>Pilih
                                                Provinsi
                                            </option>
                                        </select>
                                    </div>
                                    <div class="tab-pane fade" id="kabupaten" role="tabpanel"
                                        aria-labelledby="kabupaten-tab"> <select class="form-select"
                                            aria-label="Default select example" id="pilih-kabupaten">
                                            <option value="" disabled selected>Pilih
                                                Kabupaten
                                            </option>
                                        </select></div>
                                    <div class="tab-pane fade" id="kecamatan" role="tabpanel"
                                        aria-labelledby="kecamatan-tab">
                                        <select class="form-select" aria-label="Default select example"
                                            id="pilih-kecamatan">
                                            <option value="" disabled selected>Pilih
                                                Kecamatan
                                            </option>
                                        </select>
                                    </div>
                                    <div class="tab-pane fade" id="desa" role="tabpanel"
                                        aria-labelledby="desa-tab">
                                        <select class="form-select" aria-label="Default select example" id="pilih-desa">
                                            <option value="" disabled selected>Pilih
                                                Desa
                                            </option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 addres">
                        <div class="row mb-3">
                            <label for="name" class="col-sm-4 col-form-label custom-label">Alamat
                                Detail
                                :</label>
                            <div class="col-sm-8">
                                <textarea type="text" id="alamat_detail" name="alamat_detail" class="form-control-plaintext costum-input"
                                    readonly name="alamat_detail" value=""></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-12 text-end">
                    <button type="submit" id="submit" class="btn btn-dark d-none">Submit
                    </button>
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
