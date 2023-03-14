@extends('app.main')
        
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    <p class="mb-4">Berikut adalah formulir untuk mendaftarkan lokasi ke dalam aplikasi <a href="/" class="text-primary">YouBID</a>.</p>

    <div class="card show mb-4">
        <div class="card-header">
            <h6 class="text-primary font-weight-bold">Form Tambah Lokasi</h6>
        </div>
        <div class="card-body">
            <form action="/location/create" method="POST" class="form-group">
                @csrf
                <div class="row">
                    <div class="col-12 mx-auto mb-3">
                        <label class="font-weight-bold text-primary" for="name">Nama Lokasi</label>
                        <input type="text" name="name" class="form-control @error('name')
                            is-invalid
                        @enderror" value="{{ old('name') }}" placeholder="Masukkan Nama Lokasi" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 mx-auto mb-3">
                        <label class="font-weight-bold text-primary" for="full_address">Alamat Lengkap</label>
                        <textarea name="full_address" id="full_address" class="form-control @error('full_address')
                            is-invalid
                        @enderror" cols="30" rows="10">{{ old('full_address') }}</textarea>
                        @error('full_address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 text-right">
                        <a href="/location" class="btn btn-secondary text-light">Kembali</a>
                        <button type="submit" class="btn btn-primary">Tambah</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection