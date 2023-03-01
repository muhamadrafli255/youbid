@extends('app.main')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    <p class="mb-4">Berikut adalah formulir untuk mengubah harga tiket pada aplikasi <a href="/" class="text-danger">YouBID</a>.</p>

    <div class="card shadow mb-4">
        @foreach ($ticketPrices as $price)
        <div class="card-header">
            <h6 class="text-danger font-weight-bold">Form Ubah Harga Tiket</h6>
        </div>
        <div class="card-body">
            <form action="/ticketprice/{{ $price->id }}/edit" method="POST" class="form-group">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-12 mx-auto mb-3">
                        <label class="font-weight-bold text-danger" for="category">Nama Kategori</label>
                        <select name="category_id" id="category" class="form-control col-12 @error('category_id')
                            is-invalid
                        @enderror">
                        <option selected value="{{ $price->category_id }}">{{ $price->Category->name }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 mx-auto mb-3">
                        <label class="font-weight-bold text-danger" for="price">Harga</label>
                        <input type="number" name="price" id="price" class="form-control @error('price')
                            is-invalid
                        @enderror" value="@if($price->price){{ $price->price }}@else{{ old('price') }}@endif" placeholder="Masukkan Harga Kelipatan" required>
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 text-right">
                        <a href="/ticketprice" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-danger">Ubah</a>
                    </div>
                </div>
            </form>
        </div>
        @endforeach
    </div>
</div>
@include('components.scripts.previewimage')
@endsection