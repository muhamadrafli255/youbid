@extends('app.auth')

    @include('components.styles.formwizard')
    @include('components.scripts.formwizard')
    @include('components.scripts.previewimage')

@section('content')
                <!-- Outer Row -->
                <div class="row justify-content-center">

                    <div class="col-xl-10 col-lg-12 col-md-9">
        
                        <div class="card o-hidden border-0 shadow-lg mb-5" style="margin-top: 30px;">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">   
                                    <div class="col-12">
                                        <div class="p-5">
                                            <div class="text-center mt-4">
                                                <h1 class="h4 text-gray-900">{{ $title }}!</h1>
                                                <p class="mb-4">Silahkan untuk melengkapi data agar dapat mengakses semua fitur <span class="text-danger">Youbid</span></p>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mx-0">
                                                    <form id="msform" action="/complete-data" method="POST">
                                                        @csrf
                                                        <!-- progressbar -->
                                                        <ul id="progressbar" class="mx-auto">
                                                            <li class="active" id="account"><strong>Data Diri</strong></li>
                                                            <li id="personal"><strong>Identitas</strong></li>
                                                            <li id="payment"><strong>Bank</strong></li>
                                                        </ul>
                                                        <!-- fieldsets -->
                                                        <fieldset>
                                                            <div class="user row">
                                                                <h2 class="fs-title col-12">Informasi Data Diri</h2>
                                                                <div class="col-sm-6 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="">NIK</label>
                                                                    <input type="number" name="nik" class="form-control form-control-user @error('nik')
                                                                        is-invalid
                                                                    @enderror" placeholder="Masukkan NIK" value="{{ old('nik') }}" required>
                                                                    @error('nik')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-sm-6 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="">No Telepon</label>
                                                                    <input type="number" name="phone_number" class="form-control form-control-user @error('phone_number')
                                                                        is-invalid
                                                                    @enderror" placeholder="Masukkan No Telepon" value="{{ old('phone_number') }}" required>
                                                                    @error('phone_number')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-12 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="gender">Jenis Kelamin</label>
                                                                    <select name="gender" id="gender" class="form-control">
                                                                        <option>Pilih Jenis Kelamin...</option>
                                                                        <option value="1">Laki - Laki</option>
                                                                        <option value="2">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-6 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="">Provinsi</label>
                                                                    <select name="province" id="province" class="form-control">
                                                                        <option>Pilih Provinsi...</option>
                                                                        @foreach ($provinces as $province)
                                                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-6 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="">Kabupaten / Kota</label>
                                                                    <select name="city" id="cities" class="form-control">
                                                                        <option>Pilih Kabupaten / Kota...</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-6 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="">Kecamatan</label>
                                                                    <select name="district" id="districts" class="form-control">
                                                                        <option>Pilih Kecamatan...</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-6 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="">Desa</label>
                                                                    <select name="sub_district_id" id="sub_districts" class="form-control">
                                                                        <option>Pilih Desa...</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-12 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="">Kode Pos</label>
                                                                    <input type="text" class="form-control" placeholder="Masukkan Kode Pos">
                                                                </div>
                                                                <div class="col-12 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="">Alamat Lengkap</label>
                                                                    <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                                                </div>
                                                                <div class="col-12 mx-auto img-thumbnail mb-3">
                                                                    <img src="/img/undraw_profile.svg" class="img-preview img-fluid rounded-circle" height="100px" width="200px">
                                                                </div>
                                                                <div class="col-12 form-group mb-3">
                                                                    <input type="file" class="form-control form-control-user" id="image" onchange="previewImage()">
                                                                    <label class="custom-file-label" for="image">Profile Image</label>
                                                                </div>
                                                            </div>
                                                            <input type="button" name="next" class="next btn btn-danger mt-4" value="Selanjutnya"/>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="user row mb-4">
                                                                <h2 class="fs-title col-12 mb-3 text-center">Kartu Identitas</h2>
                                                                <div class="mx-auto">
                                                                    <div class="mb-4 d-flex justify-content-center align-items-center">
                                                                        <img src="https://disdukcapil.kamparkab.go.id/wp-content/uploads/2019/05/ktp.png"
                                                                        alt="example placeholder" style="width: 300px;" />
                                                                    </div>
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="btn btn-danger btn-rounded">
                                                                            <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                                                                            <input type="file" class="form-control d-none" id="customFile1" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <input type="button" name="previous" class="previous btn btn-secondary mt-4" value="Kembali"/>
                                                            <input type="button" name="next" class="next btn btn-danger mt-4" value="Selanjutnya"/>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="user row">
                                                                <h2 class="col-12 fs-title">Rekening Bank</h2>
                                                                <div class="col-sm-6 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="">Pemilik Rekening</label>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                                <div class="col-sm-6 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="">Nomor Rekening</label>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                                <div class="col-12 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="">Nama Bank</label>
                                                                    <select name="" id="" class="form-control">
                                                                        <option>Pilih Bank...</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <input type="button" name="previous" class="previous btn btn-secondary" value="Kembali"/>
                                                            <input type="button" name="make_payment" class="next btn btn-danger" value="Kirim"/>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@include('components.scripts.selectchange')
@endsection