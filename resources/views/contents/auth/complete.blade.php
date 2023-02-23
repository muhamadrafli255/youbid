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
                                                    <form id="msform" action="/complete-data" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <!-- progressbar -->
                                                        <ul id="progressbar" class="mx-auto">
                                                            <li class="active" id="account"><strong>Data Diri</strong></li>
                                                            <li id="personal"><strong>Identitas</strong></li>
                                                            <li id="payment"><strong>Bank</strong></li>
                                                        </ul>
                                                        <!-- fieldsets -->
                                                        @foreach ($users as $user)
                                                        <fieldset>
                                                            <div class="user row">
                                                                <h2 class="fs-title col-12">Informasi Data Diri</h2>
                                                                <div class="col-sm-6 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="">NIK</label>
                                                                    <input type="number" name="nik" class="form-control form-control-user @error('nik')
                                                                        is-invalid
                                                                    @enderror" placeholder="Masukkan NIK" value="@if($user->nik){{ $user->nik }}@else{{ old('nik') }}@endif" required>
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
                                                                    @enderror" placeholder="Masukkan No Telepon" value="@if($user->phone_number){{ $user->phone_number }}@else{{ old('phone_number') }}@endif" required>
                                                                    @error('phone_number')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-12 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for=",gender">Jenis Kelamin</label>
                                                                    <select name="gender" id="gender" class="form-control" required>
                                                                        @if ($user->gender == 1)
                                                                        <option value="1" selected>Laki - Laki</option>
                                                                        <option value="2">Perempuan</option>
                                                                        @else
                                                                        <option value="2" selected>Perempuan</option>
                                                                        <option value="1">Laki - Laki</option>    
                                                                        @endif
                                                                        <option>Jenis Kelamin...</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-6 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="">Provinsi</label>
                                                                    <select name="province" id="province" class="form-control" required>
                                                                        <option>Pilih Provinsi...</option>
                                                                        @foreach ($provinces as $province)
                                                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-6 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="">Kabupaten / Kota</label>
                                                                    <select name="city" id="cities" class="form-control" required>
                                                                        <option>Pilih Kabupaten / Kota...</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-6 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="">Kecamatan</label>
                                                                    <select name="district" id="districts" class="form-control" required>
                                                                        <option>Pilih Kecamatan...</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-6 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="">Desa</label>
                                                                    <select name="sub_district_id" id="sub_districts" class="form-control @error('sub_district_id')
                                                                        is-invalid
                                                                    @enderror" required>
                                                                        <option>Pilih Desa...</option>
                                                                    </select>
                                                                    @error('sub_district_id')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-12 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="">Kode Pos</label>
                                                                    <input type="text" name="postal_code" class="form-control @error('postal_code')
                                                                        is-invalid
                                                                    @enderror" placeholder="Masukkan Kode Pos" value="@if($user->postal_code){{ $user->postal_code }}@else{{ old('postal_code') }}@endif" required>
                                                                    @error('postal_code')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-12 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="full_address">Alamat Lengkap</label>
                                                                    <textarea name="full_address" id=full_address" cols="30" rows="10" class="form-control" required>@if($user->full_address){{ $user->full_address }}@else{{ old('full_address') }}@endif</textarea>
                                                                </div>
                                                                <div class="col-12 mx-auto img-thumbnail mb-3">
                                                                    <img src="/img/undraw_profile.svg" class="img-preview img-fluid rounded-circle" height="100px" width="200px">
                                                                </div>
                                                                <div class="col-12 form-group mb-3">
                                                                    <input type="file" name="image" class="form-control form-control-user" id="image" onchange="previewImage()" required>
                                                                    <label class="custom-file-label @error('image')
                                                                        is-invalid
                                                                    @enderror" for="image">Profile Image</label>
                                                                    @error('image')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
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
                                                                        class="img-preview-card" style="width: 300px;" />
                                                                    </div>
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="btn btn-danger btn-rounded">
                                                                            <label class="form-label text-white m-1" for="imageCard">Choose file</label>
                                                                            <input type="file" name="id_card_image" class="form-control d-none @error('id_card_image')
                                                                            is-invalid
                                                                            @enderror" id="imageCard" onchange="previewImageCard()" required>
                                                                            @error('id_card_image')
                                                                                <div class="invalid-feedback text-white">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
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
                                                                    <input type="text" name="account_owner" class="form-control @error('account_owner')
                                                                        is-invalid
                                                                    @enderror" placeholder="Masukkan Pemilik Rekening" value="{{ old('account_owner') }}" required>
                                                                    @error('account_owner')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-sm-6 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="">Nomor Rekening</label>
                                                                    <input type="text" name="account_number" class="form-control @error('account_number')
                                                                        is-invalid
                                                                    @enderror" placeholder="Masukkan Nomor Rekening" value="{{ old('account_number') }}" required>
                                                                    @error('account_number')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-12 form-group mb-3">
                                                                    <label class="font-weight-bold text-danger float-left" for="bank">Nama Bank</label>
                                                                    <select name="bank_id" id="bank" class="form-control @error('bank_id')
                                                                        is-invalid
                                                                    @enderror" required>
                                                                        <option>Pilih Bank...</option>
                                                                        @foreach ($banks as $bank)
                                                                            <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('bank_id')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <input type="button" name="previous" class="previous btn btn-secondary" value="Kembali"/>
                                                            <button type="submit" class="btn btn-danger">Kirim</button>
                                                        </fieldset>
                                                        @endforeach
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
