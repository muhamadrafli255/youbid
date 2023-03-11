@extends('app.main')

@section('content')
    <div class="container-fluid">
                                <!-- Page Heading -->
                                <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
                                <p class="mb-4">Berikut adalah formulir untuk mendaftarkan masyarakat ke dalam aplikasi <a href="/" class="text-primary">YouBID</a>.</p>

                                <div class="card show mb-4">
                                    <div class="card-header">
                                        <h6 class="text-primary font-weight-bold">Form Tambah Masyarakat</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="/societies/create" method="POST" class="form-group">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-primary" for="">NIK</label>
                                                    <input type="number" name="nik" class="form-control @error('nik')
                                                        is-invalid
                                                    @enderror" value="{{ old('nik') }}" placeholder="Masukkan NIK" required>
                                                    @error('nik')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-primary" for="">Nama Lengkap</label>
                                                    <input type="text" name="full_name" class="form-control @error('full_name')
                                                        is-invalid
                                                    @enderror" placeholder="Masukkan Nama Lengkap" value="{{ old('full_name') }}" required>
                                                    @error('full_name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-primary" for="">Email</label>
                                                    <input type="email" name="email"  class="form-control @error('email')
                                                        is-invalid
                                                    @enderror" placeholder="Masukkan Email" value="{{ old('email') }}" required>
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-primary" for="">No Telepon</label>
                                                    <input type="number" name="phone_number" class="form-control @error('phone_number')
                                                        is-invalid
                                                    @enderror" placeholder="Masukkan No Telepon" value="{{ old('phone_number') }}" required>
                                                    @error('phone_number')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="font-weight-bold text-primary" for="">Jenis Kelamin</label>
                                                    <select name="gender" id="" class="form-control">
                                                        <option>Pilih Jenis Kelamin...</option>
                                                        <option value="1">Laki - Laki</option>
                                                        <option value="2">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-primary" for="province">Provinsi</label>
                                                    <select name="province" id="province" class="form-control">
                                                        <option>Pilih Provinsi...</option>
                                                        @foreach ($provinces as $province)
                                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-primary" for="cities">Kabupaten / Kota</label>
                                                    <select name="city" id="cities" class="form-control">
                                                        <option>Pilih Kota / Kabupaten...</option>
                                                    </select>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-primary" for="districts">Kecamatan</label>
                                                    <select name="district" id="districts" class="form-control">
                                                        <option>Pilih Kecamatan...</option>
                                                    </select>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-primary" for="sub_districts">Desa</label>
                                                    <select name="sub_district_id" id="sub_districts" class="form-control">
                                                        <option>Pilih Desa...</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="font-weight-bold text-primary" for="">Kode Pos</label>
                                                    <input type="number" name="postal_code" class="form-control @error('postal_code')
                                                        is-invalid
                                                    @enderror" placeholder="Masukkan Kode Pos" value="{{ old('postal_code') }}" required>
                                                    @error('postal_code')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="font-weight-bold text-primary" for="">Alamat Lengkap</label>
                                                    <textarea name="full_address" id="" cols="30" rows="10" class="form-control @error('full_address')
                                                        is-invalid
                                                    @enderror">{{ old('full_address') }}</textarea>
                                                </div>
                                                <div class="col-12 text-right">
                                                    <a href="/societies" class="btn btn-secondary text-light">Kembali</a>
                                                    <button type="submit" class="btn btn-primary">Tambah</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
    </div>
    @include('components.scripts.selectchange')
@endsection 