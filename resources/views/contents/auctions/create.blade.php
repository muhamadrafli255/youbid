@extends('app.main')
        
    @section('script')
    @include('components.scripts.select2')
    @endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    <p class="mb-4">Berikut adalah formulir untuk mendaftarkan lelang ke dalam aplikasi <a href="/" class="text-primary">YouBID</a>.</p>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="text-primary font-weight-bold">Form Tambah Lelang</h6>
        </div>
        <div class="card-body">
            <form action="/auctions/create" method="POST" class="form-group">
                @csrf
                <div class="row">
                    <div class="col-12 mx-auto mb-3">
                        <label class="font-weight-bold text-primary" for="">Nama Lot</label>
                        <select name="lot_id" id="selectItems" class="form-control col-12 @error('lot_id')
                            is-invalid
                        @enderror">
                            <option selected disabled>Pilih Lot...</option>
                            @foreach ($lots as $lot)
                                <option value="{{ $lot->id }}">{{ $lot->name }}</option>
                            @endforeach
                        </select>
                        @error('lot_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 mx-auto mb-3">
                        <label class="font-weight-bold text-primary" for="">Waktu Pembukaan</label>
                        <input type="datetime-local" name="opened_date" id="opened_date" class="form-control @error('opened_date')
                            is-invalid
                        @enderror">
                        @error('opened_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 mx-auto mb-3">
                        <label class="font-weight-bold text-primary" for="">Waktu Penutupan</label>
                        <input type="datetime-local" name="closed_date" id="closed_date" class="form-control @error('closed_date')
                            is-invalid
                        @enderror">
                        @error('closed_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 mx-auto mb-3">
                        <label class="font-weight-bold text-primary" for="">Harga Awal</label>
                        <input type="number" name="initial_price" id="initial_price" class="form-control @error('initial_price')
                            is-invalid
                        @enderror" placeholder="Rp. ....">
                        @error('initial_price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 text-right">
                        <a href="/auctions" class="btn btn-secondary text-light">Kembali</a>
                        <button type="submit" class="btn btn-primary">Tambah</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('components.scripts.previewimage')
@endsection