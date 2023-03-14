<!-- Modal -->
<div class="modal fade" id="FormAlamat" tabindex="-1" aria-labelledby="FormAlamatLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="FormAlamatLabel">Tambah Alamat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/user/{{ Auth::user()->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row mb-3">
                                <label for="name" class=" col-form-label custom-label">Nama
                                    :</label>
                                <div class="">
                                    <input type="text" id="name" name="name"
                                        class="form-control-plaintext costum-input" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row mb-3">
                                <label for="name" class=" col-form-label custom-label">No Hand
                                    Phone
                                    :</label>
                                <div class="">
                                    <input type="number" id="no_hp" name="no_hp"
                                        class="form-control-plaintext costum-input"
                                        @if (empty(Auth::user()->no_hp)) value=""  placeholder="81313362467"
                                         @else 
                                            value="{{ Auth::user()->no_hp }}" @endif>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row mb-3">
                                <label for="name" class=" col-form-label custom-label">Alamat
                                    :</label>
                                <div class="">
                                    <textarea id="alamat" name="alamat" class="form-control-plaintext costum-textarea" name="alamat"
                                        placeholder="Pilih Data Dibawah Untuk Mengisi Data Alamat" readonly>{{ Auth::user()->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="row justify-content-end mb-3">
                                <div id="inputAlamat" class="col-lg-12">
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
                                            <button class="nav-link" id="desa-tab" data-bs-toggle="tab"
                                                data-bs-target="#desa" type="button" role="tab"
                                                aria-controls="desa" aria-selected="false" disabled
                                                style="cursor:not-allowed">Desa</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="provinsi" role="tabpanel"
                                            aria-labelledby="provinsi-tab">
                                            <select class="form-select" aria-label="Default select example"
                                                id="pilih-provinsi">
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
                                            <select class="form-select" aria-label="Default select example"
                                                id="pilih-desa">
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
                                <label for="name" class=" col-form-label custom-label">Alamat
                                    Detail
                                    :</label>
                                <div class="">
                                    <textarea id="alamat_detail" name="alamat_detail" class="form-control-plaintext costum-textarea"
                                        name="alamat_detail" placeholder="(No Rumah / Gang / RT / RW)">{{ Auth::user()->alamat_detail }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </form>
    </div>
</div>
