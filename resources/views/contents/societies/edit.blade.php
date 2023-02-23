@extends('app.main')

@section('content')
    <div class="container-fluid">
                                <!-- Page Heading -->
                                <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
                                <p class="mb-4">Berikut adalah formulir untuk merubah data masyarakat di <a href="/" class="text-danger">YouBID</a>.</p>

                                @foreach ($societies as $society)
                                <div class="card show mb-4">
                                    <div class="card-header">
                                        <h6 class="text-danger font-weight-bold">Form Edit Masyarakat</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="/societies/{{ $society->id }}/edit" method="POST" class="form-group">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-danger" for="">NIK</label>
                                                    <input type="number" name="nik" class="form-control @error('nik')
                                                        is-invalid
                                                    @enderror" value="@if($society->nik){{ $society->nik }}@else{{ old('nik') }}@endif" placeholder="Masukkan NIK" required>
                                                    @error('nik')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-danger" for="">Nama Lengkap</label>
                                                    <input type="text" name="full_name" class="form-control @error('full_name')
                                                        is-invalid
                                                    @enderror" placeholder="Masukkan Nama Lengkap" value="@if($society->full_name){{ $society->full_name }}@else{{ old('full_name') }}@endif" required>
                                                    @error('full_name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-danger" for="">Email</label>
                                                    <input type="email" name="email"  class="form-control @error('email')
                                                        is-invalid
                                                    @enderror" placeholder="Masukkan Email" value="@if($society->email){{ $society->email }}@else{{ old('email') }}@endif" required>
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-danger" for="">No Telepon</label>
                                                    <input type="number" name="phone_number" class="form-control @error('phone_number')
                                                        is-invalid
                                                    @enderror" placeholder="Masukkan No Telepon" value="@if($society->phone_number){{ $society->phone_number }}@else{{ old('phone_number') }}@endif" required>
                                                    @error('phone_number')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="font-weight-bold text-danger" for="">Jenis Kelamin</label>
                                                    <select name="gender" id="" class="form-control">
                                                        @if ($society->gender = 1)
                                                            <option value="1" selected>Laki - Laki</option>
                                                            <option value="2">Perempuan</option>
                                                        @else
                                                        <option value="2" selected>Perempuan</option>
                                                        <option value="1">Laki - Laki</option>
                                                        @endif  
                                                    </select>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-danger" for="province">Provinsi</label>
                                                    <select name="province" id="province" class="form-control">
                                                        @foreach ($provinces as $province)
                                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                        @endforeach
                                                        @foreach ($province_select as $p)
                                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-danger" for="cities">Kabupaten / Kota</label>
                                                    <select name="city" id="cities" class="form-control">
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-danger" for="districts">Kecamatan</label>
                                                    <select name="district" id="districts" class="form-control">
                                                        @foreach ($districts as $district)
                                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-danger" for="sub_districts">Desa</label>
                                                    <select name="sub_district_id" id="sub_districts" class="form-control">
                                                        <option value="{{ $society->sub_district_id }}">{{ $society->SubDistrict->name }}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="font-weight-bold text-danger" for="">Kode Pos</label>
                                                    <input type="number" name="postal_code" class="form-control @error('postal_code')
                                                        is-invalid
                                                    @enderror" placeholder="Masukkan Kode Pos" value="@if($society->postal_code){{ $society->postal_code }}@else{{ old('postal_code') }}@endif" required>
                                                    @error('postal_code')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="font-weight-bold text-danger" for="">Alamat Lengkap</label>
                                                    <textarea name="full_address" id="" cols="30" rows="10" class="form-control @error('full_address')
                                                        is-invalid
                                                    @enderror">@if($society->full_address){{ $society->full_address }}@else{{ old('full_address') }}@endif</textarea>
                                                </div>
                                                <div class="col-12 text-right">
                                                    <a href="/societies" class="btn btn-secondary">Kembali</a>
                                                    <button type="submit" class="btn btn-danger">Ubah</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
    </div>
    @include('components.scripts.selectchange')
@endsection 