@extends('layouts.main')

@section('main')
    @if (session()->has('success'))
        @push('script')
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Profile Berhasil Diubah',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
        @endpush
    @endif
    @if (session()->has('error'))
        @push('script')
            <script>
                Swal.fire({
                    icon: 'info',
                    title: 'Harap Isi Alamat & No Handphone',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
        @endpush
    @endif
    <div class="container-sm">
        <section id="profile">
            <h2><i class="bi bi-person-circle"></i> My Profile</h2>
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-lg-3">
                            <div class="card card-body shadow">
                                <img src="{{ asset('assets') }}/img/icons/user.png" alt="" width="100px"
                                    class="rounded mx-auto d-block">
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="card card-body">
                                <form action="/user/{{ Auth::user()->id }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Nama Lengkap" value="{{ Auth::user()->name }}">
                                                <label for="name">Nama Lengkap</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="no_hp" name="no_hp"
                                                    placeholder="8131327" value="{{ Auth::user()->no_hp }}">
                                                <label for="name">No Handphone</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="alamat" name="alamat"
                                                    readonly value="{{ Auth::user()->alamat }}">
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
                                                        aria-controls="kabupaten" disabled
                                                        aria-selected="false">Kabupaten</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="kecamatan-tab" data-bs-toggle="tab"
                                                        data-bs-target="#kecamatan" type="button" role="tab"
                                                        aria-controls="kecamatan" disabled
                                                        aria-selected="false">Kecamatan</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="desa-tab" data-bs-toggle="tab"
                                                        data-bs-target="#desa" type="button" role="tab"
                                                        aria-controls="desa" aria-selected="false" disabled>Desa</button>
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
                                        <div class="col-lg-12 mt-4">
                                            <div class="form-floating mb-3">
                                                <textarea name="alamat_detail" id="" class="form-control"
                                                    placeholder="Detail lainnya (Nama jalan Rt Rw No Rumah)"> {{ Auth::user()->alamat_detail }}</textarea>
                                                <label for="name">Alamat Detail</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-end">
                                        <button type="submit" class="btn btn-primary">Edit Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('script')
    <script>
        // INIT: GLOBAL VARIABLE
        let province_id = '';
        let regency_id = '';
        let district_id = '';
        let village_id = '';
        let alamatValue = '';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/get-provinsi",
            dataType: 'json',
            method: "GET",
            success: function(data) {
                let value = data.provinces;
                let pilih_provinsi = $('#pilih-provinsi');

                for (let i = 0; i < value.length; i++) {
                    let options = `<option value="${value[i].id}">${value[i].name}</option>`;
                    pilih_provinsi.append(options);
                }
            }
        });

        $('#pilih-provinsi').on('keyup change', function() {
            let selectedOptions = $('#pilih-provinsi').val();
            let value = $('#pilih-provinsi option:selected').text() + ", ";

            if (selectedOptions) {
                $('#myTab #kabupaten-tab').removeAttr('disabled');
                $('#myTab #kabupaten-tab').tab('show');
                alamatValue = "";
                alamatValue += value;

                $('#alamat').val(alamatValue);
                province_id = selectedOptions;

                $.ajax({
                    url: '/get-kabupaten',
                    dataType: 'json',
                    method: 'POST',
                    data: {
                        province_id: province_id
                    },
                    success: function(kabupaten) {
                        console.log(kabupaten);

                        $('#pilih-kabupaten').html("");


                        let value = kabupaten.regencies;
                        for (let i = 0; i < value.length; i++) {
                            let options = `<option value="${value[i].id}">${value[i].name}</option>`;
                            $('#pilih-kabupaten').append(options);
                        }
                    }
                })
            }


        });

        $('#pilih-kabupaten').on('keyup change', function() {
            let selectedOptions = $('#pilih-kabupaten').val();
            let provinsi = $('#pilih-provinsi option:selected').text();
            let kabupaten = $('#pilih-kabupaten option:selected').text() + ", ";

            if (selectedOptions) {
                $('#myTab #kecamatan-tab').removeAttr('disabled');
                $('#myTab #kecamatan-tab').tab('show');

                alamatValue = "";
                alamatValue = kabupaten + provinsi;

                $('#alamat').val(alamatValue);
                regency_id = selectedOptions;

                $.ajax({
                    url: '/get-kecamatan',
                    dataType: 'json',
                    method: 'POST',
                    data: {
                        regency_id: regency_id
                    },
                    success: function(data) {
                        console.log(data);

                        $('#pilih-kecamatan').html("");
                        let value = data.districts;

                        for (let i = 0; i < value.length; i++) {
                            let options = `<option value="${value[i].id}">${value[i].name}</option>`;
                            $('#pilih-kecamatan').append(options);
                        }
                    }
                })
            }
        });

        $('#pilih-kecamatan').on('keyup change', function() {
            let selectedOptions = $(this).val();
            let provinsi = $('#pilih-provinsi option:selected').text();
            let kabupaten = $('#pilih-kabupaten option:selected').text() + ", ";
            let Kecamatan = $('#pilih-kecamatan option:selected').text() + ", ";

            if (selectedOptions) {
                $('#myTab #desa-tab').removeAttr('disabled');
                $('#myTab #desa-tab').tab('show');

                alamatValue = "";
                alamatValue = Kecamatan + kabupaten + provinsi;

                $('#alamat').val(alamatValue);
                district_id = selectedOptions;

                $.ajax({
                    url: '/get-desa',
                    dataType: 'json',
                    method: 'POST',
                    data: {
                        district_id: district_id
                    },
                    success: function(data) {
                        console.log(data);

                        $('#pilih-desa').html("");
                        let value = data.villages;

                        for (let i = 0; i < value.length; i++) {
                            let options = `<option value="${value[i].id}">${value[i].name}</option>`;
                            $('#pilih-desa').append(options);
                        }
                    }
                })
            }
        })

        $('#pilih-desa').on('keyup change', function() {
            let selectedOptions = $(this).val();
            let provinsi = $('#pilih-provinsi option:selected').text();
            let kabupaten = $('#pilih-kabupaten option:selected').text() + ", ";
            let Kecamatan = $('#pilih-kecamatan option:selected').text() + ", ";
            let desa = $('#pilih-desa option:selected').text() + ", ";

            if (selectedOptions) {
                $('#myTab #desa-tab').removeAttr('disabled');
                $('#myTab #desa-tab').tab('show');

                alamatValue = "";
                alamatValue = desa + Kecamatan + kabupaten + provinsi;

                $('#alamat').val(alamatValue);
            }
        })
    </script>
@endpush
