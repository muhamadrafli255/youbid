@extends('app.main')
        
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    <p class="mb-4">Berikut adalah formulir untuk merubah model pada aplikasi <a href="/" class="text-danger">YouBID</a>.</p>
    @foreach ($models as $model)
    <div class="card show mb-4">
        <div class="card-header">
            <h6 class="text-danger font-weight-bold">Form Ubah Model</h6>
        </div>
        <div class="card-body">
            <form action="/models/{{ $model->id }}/edit" method="POST" class="form-group">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-12 mx-auto mb-3">
                        <label class="font-weight-bold text-danger" for="name">Nama Model</label>
                        <input type="text" name="name" class="form-control @error('name')
                            is-invalid
                        @enderror" value="@if($model->name){{ $model->name }}@else{{ old('name') }}@endif" placeholder="Masukkan Nama Model" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 mx-auto mb-3">
                        <label class="font-weight-bold text-danger" for="production_year">Tahun Produksi</label>
                        <input type="text" name="production_year" class="form-control @error('production_year')
                            is-invalid
                        @enderror" value="@if($model->production_year){{ $model->production_year }}@else{{ old('production_year') }}@endif" placeholder="Masukkan Tahun Produksi" required>
                        @error('production_year')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 mx-auto mb-3">
                        <label class="font-weight-bold text-danger" for="brand">Nama Merk</label>
                        <select name="brand_id" id="brand" class="form-control @error('brand_id')
                            is-invalid
                        @enderror" required>
                            <option value="{{ $model->Brand->id }}">{{ $model->Brand->name }}</option>
                            <option>Pilih Merk...</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 text-right">
                        <a href="/models" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-danger">Ubah</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach
</div>
@include('components.scripts.previewimage')
@endsection