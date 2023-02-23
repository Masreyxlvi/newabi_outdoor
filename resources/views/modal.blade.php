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
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Your Name" value="{{ Auth::user()->name }}">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="no_hp" name="no_hp"
                                    placeholder="Phone Number" value="{{ Auth::user()->no_hp }}">
                                <label for="name">Your Phone Number</label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="alamat" name="alamat" readonly
                                    value="{{ Auth::user()->alamat }}">
                                <label for="name">Alamat</label>
                            </div>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="provinsi-tab" data-bs-toggle="tab"
                                        data-bs-target="#provinsi" type="button" role="tab"
                                        aria-controls="provinsi" aria-selected="true">Provinsi</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="kabupaten-tab" data-bs-toggle="tab"
                                        data-bs-target="#kabupaten" type="button" role="tab"
                                        aria-controls="kabupaten" disabled aria-selected="false">Kabupaten</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="kecamatan-tab" data-bs-toggle="tab"
                                        data-bs-target="#kecamatan" type="button" role="tab"
                                        aria-controls="kecamatan" disabled aria-selected="false">Kecamatan</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="desa-tab" data-bs-toggle="tab" data-bs-target="#desa"
                                        type="button" role="tab" aria-controls="desa" aria-selected="false"
                                        disabled>Desa</button>
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
                        <div class="col-lg-12 mt-4">
                            <div class="form-floating mb-3">
                                <textarea name="alamat_detail" id="" class="form-control"
                                    placeholder="Detail lainnya (Nama jalan Rt Rw No Rumah)"> {{ Auth::user()->alamat_detail }}</textarea>
                                <label for="name">Address Detail</label>
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
