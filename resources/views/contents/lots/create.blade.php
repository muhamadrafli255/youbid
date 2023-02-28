@extends('app.main')
        
    @section('script')
    @include('components.scripts.select2')
    @endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    <p class="mb-4">Berikut adalah formulir untuk mendaftarkan lot ke dalam aplikasi <a href="/" class="text-danger">YouBID</a>.</p>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="text-danger font-weight-bold">Form Tambah Lot</h6>
        </div>
        <div class="card-body">
            <form action="/lots/create" method="POST" class="form-group">
                @csrf
                <div class="row">
                    <div class="col-12 mx-auto mb-3">
                        <label class="font-weight-bold text-danger" for="">Nama Barang</label>
                        <select name="item_id" id="selectItems" class="form-control col-12 @error('item_id')
                            is-invalid
                        @enderror">
                            <option selected disabled>Pilih Barang...</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->item_code }} | {{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('item_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 mx-auto mb-3">
                        <label class="font-weight-bold text-danger" for="">Waktu Pembukaan Lelang</label>
                        <input type="datetime-local" name="opened_date" class="form-control @error('opened_date')
                            is-invalid
                        @enderror" value="{{ old('opened_date') }}" required>
                        @error('opened_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 mx-auto mb-3">
                        <label class="font-weight-bold text-danger" for="">Waktu Penutupan Lelang</label>
                        <input type="datetime-local" name="closed_date" class="form-control @error('closed_date')
                            is-invalid
                        @enderror" value="{{ old('closed_date') }}" required>
                        @error('closed_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 mx-auto mb-3">
                        <label class="font-weight-bold text-danger" for="">Lokasi Lelang</label>
                        <input type="text" name="location" placeholder="Masukkan Lokasi Lelang" class="form-control @error('location')
                            is-invalid
                        @enderror" value="{{ old('location') }}" required>
                        @error('location')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 text-right">
                        <a href="/lots" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-danger">Tambah</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('components.scripts.previewimage')
@endsection