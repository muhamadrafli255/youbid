@extends('app.main')
        
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    @foreach ($brands as $brand)
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    <p class="mb-4">Berikut adalah formulir untuk mengubah merk pada aplikasi <a href="/" class="text-primary">YouBID</a>.</p>

    <div class="card show mb-4">
        <div class="card-header">
            <h6 class="text-primary font-weight-bold">Form Ubah Merk</h6>
        </div>
        <div class="card-body">
            <form action="/brands/{{ $brand->id }}/edit" method="POST" class="form-group" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-12 mx-auto mb-3">
                        <label class="font-weight-bold text-primary" for="">Nama Merk</label>
                        <input type="text" name="name" class="form-control @error('name')
                            is-invalid
                        @enderror" value="@if($brand->name){{ $brand->name }}@else {{ old('name') }} @endif" placeholder="Masukkan Nama Kategori" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 mx-auto mb-3">
                        <label class="font-weight-bold text-primary">Nama Kategori</label>
                        <select name="category_id" id="category" class="form-control">
                            <option value="{{ $brand->Category->id }}">{{ $brand->Category->name }}</option>
                            <option disabled>Pilih Kategori...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="font-weight-bold text-primary mx-auto mt-3 mb-2" for="">Logo Merk</label>
                    <div class="col-12 mb-3 text-center">
                        @if ($brand->image == null)
                        <img src="https://www.pngplay.com/wp-content/uploads/6/Black-Price-Tag-PNG.png" class="img-preview img-fluid border border-1" height="100px" width="200px">
                        @else
                        <img src="/img/brand-images/{{ $brand->image }}" class="img-preview img-fluid border border-1" height="100px" width="200px">
                        @endif
                    </div>
                    <div class="col-4 mb-4 mx-auto">
                        <input type="file" name="image" class="custom-file-input" id="image" onchange="previewImage()">
                        <label class="custom-file-label" for="image">Foto Kategori</label>
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 text-right">
                        <a href="/brands" class="btn btn-secondary text-light">Kembali</a>
                        <button type="submit" class="btn btn-primary">Ubah</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach
</div>
@include('components.scripts.previewimage')
@endsection