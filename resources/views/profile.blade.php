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
            <h2 class="text-center"><i class="bi bi-person-circle"></i> My Profile</h2>
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">

                        <div class="mb-3">
                            <button type="button" id="edit" class="btn btn-dark">Edit Profile</button>
                        </div>
                        <div class="col-lg-12">
                            <div class="card card-body">
                                <form action="/user/{{ Auth::user()->id }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row mb-3">
                                                <label for="name" class="col-sm-4 col-form-label custom-label">Nama
                                                    :</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="name" name="name"
                                                        class="form-control-plaintext costum-input" readonly
                                                        value="{{ Auth::user()->name }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="name" class="col-sm-4 col-form-label custom-label">No Hand
                                                    Phone
                                                    :</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="no_hp" name="no_hp"
                                                        class="form-control-plaintext costum-input" readonly
                                                        value="{{ Auth::user()->no_hp }}">
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
                                                            <button class="nav-link active" id="provinsi-tab"
                                                                data-bs-toggle="tab" data-bs-target="#provinsi"
                                                                type="button" role="tab" aria-controls="provinsi"
                                                                aria-selected="true">Provinsi</button>
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
                                                        <div class="tab-pane fade show active" id="provinsi"
                                                            role="tabpanel" aria-labelledby="provinsi-tab">
                                                            <select class="form-select"
                                                                aria-label="Default select example" id="pilih-provinsi">
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
                                                            <select class="form-select"
                                                                aria-label="Default select example" id="pilih-kecamatan">
                                                                <option value="" disabled selected>Pilih
                                                                    Kecamatan
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="tab-pane fade" id="desa" role="tabpanel"
                                                            aria-labelledby="desa-tab">
                                                            <select class="form-select"
                                                                aria-label="Default select example" id="pilih-desa">
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
                                                        readonly name="alamat_detail" value="">{{ Auth::user()->alamat_detail }}</textarea>
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
                $('#myTab #kabupaten-tab').css('cursor', 'pointer');
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
                $('#myTab #kecamatan-tab').css('cursor', 'pointer');
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
                $('#myTab #desa-tab').css('cursor', 'pointer');
                $('#myTab #desa-tab').tab('show');

                alamatValue = "";
                alamatValue = desa + Kecamatan + kabupaten + provinsi;

                $('#alamat').val(alamatValue);
            }
        })


        $('#edit').on('click', function() {
            // alert('hello')
            $('#name').prop('readonly', false);
            $('#no_hp').prop('readonly', false);
            $('#inputAlamat').removeClass('d-none');
            $('#submit').removeClass('d-none');
            $('#alamat_detail').prop('readonly', false);
            $('#addres').addClass('mt-4');
            // $('#inputAlamat').addClass('d-block');
        });
    </script>
@endpush
