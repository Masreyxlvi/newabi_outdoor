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
                        <div class="col-lg-12 mt-4">
                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                        <button class="accordion-button" style="font-size: 15px" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne"
                                            aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                            <input type="text" class="form-control-plaintext "
                                                style="border: 0; outline:0;" id="alamat" name="alamat"
                                                placeholder="Pilih Alamat Di bawah ini"
                                                value="{{ Auth::user()->alamat }}" readonly>
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse w-100"
                                        aria-labelledby="panelsStayOpen-headingOne">
                                        <div class="accordion-body w-100">
                                            <ul class="nav nav-pills mb-3 w-100" id="alamat-tabbar" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="provinsi-tab"
                                                        data-bs-toggle="pill" data-bs-target="#tabpane-provinsi"
                                                        type="button" role="tab" aria-controls="tabpane-provinsi"
                                                        aria-selected="true">Provinsi</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="kabupaten-tab" data-bs-toggle="pill"
                                                        data-bs-target="#tabpane-kabupaten" type="button"
                                                        role="tab" aria-controls="tabpane-kabupaten"
                                                        aria-selected="false" disabled>Kabupaten/Kota</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="kecamatan-tab" data-bs-toggle="pill"
                                                        data-bs-target="#tabpane-kecamatan" type="button"
                                                        role="tab" aria-controls="tabpane-kecamatan"
                                                        aria-selected="false" disabled>Kecamatan</button>
                                                </li>
                                                <li class="nav-item text-dark" role="presentation">
                                                    <button class="nav-link" id="desa-tab" data-bs-toggle="pill"
                                                        data-bs-target="#tabpane-desa" type="button" role="tab"
                                                        aria-controls="tabpane-desa" aria-selected="false"
                                                        disabled>Desa</button>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="tabpane-provinsi"
                                                    role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                                    <select class="form-select" aria-label="Default select example"
                                                        id="pilih-provinsi">
                                                        <option value="" disabled selected>Pilih Provinsi
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="tab-pane fade" id="tabpane-kabupaten" role="tabpanel"
                                                    aria-labelledby="pills-profile-tab" tabindex="0">
                                                    <select class="form-select" aria-label="Default select example"
                                                        id="pilih-kabupaten">
                                                        <option value="" disabled selected>Pilih Kabupaten
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="tab-pane fade" id="tabpane-kecamatan" role="tabpanel"
                                                    aria-labelledby="pills-contact-tab" tabindex="0">
                                                    <select class="form-select" aria-label="Default select example"
                                                        id="pilih-kecamatan">
                                                        <option value="" disabled selected>Pilih Kecamatan
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="tab-pane fade" id="tabpane-desa" role="tabpanel"
                                                    aria-labelledby="pills-contact-tab" tabindex="0">
                                                    <select class="form-select" aria-label="Default select example"
                                                        id="pilih-desa">
                                                        <option value="" disabled selected>Pilih Desa</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
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
