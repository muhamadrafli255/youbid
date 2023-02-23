@extends('app.main')
        
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    <p class="mb-4">Berikut adalah formulir untuk mendaftarkan kategori ke dalam aplikasi <a href="/" class="text-danger">YouBID</a>.</p>

    <div class="card show mb-4">
        <div class="card-header">
            <h6 class="text-danger font-weight-bold">Form Tambah Kategori</h6>
        </div>
        <div class="card-body">
            <form action="/categories/create" method="POST" class="form-group" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 mx-auto mb-3">
                        <label class="font-weight-bold text-danger" for="">Nama Kategori</label>
                        <input type="text" name="name" class="form-control @error('name')
                            is-invalid
                        @enderror" value="{{ old('name') }}" placeholder="Masukkan Nama Kategori" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <label class="font-weight-bold text-danger mx-auto mt-3 mb-2" for="">Foto Kategori</label>
                    <div class="col-12 mb-3 text-center">
                        <img src="https://cdn.pixabay.com/photo/2012/04/23/17/09/bike-39131_960_720.png" class="img-preview img-fluid border border-1" height="100px" width="200px">
                    </div>
                    <div class="col-4 mb-4 mx-auto">
                        <input type="file" name="image" class="custom-file-input" id="image" onchange="previewImage()" required>
                        <label class="custom-file-label" for="image">Foto Kategori</label>
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 text-right">
                        <a href="/categories" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-danger">Tambah</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('components.scripts.previewimage')
@endsection