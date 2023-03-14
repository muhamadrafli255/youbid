@extends('app.main')
        
    @section('script')
    @include('components.scripts.select2')
    @endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    <p class="mb-4">Berikut adalah formulir untuk mengubah data lot pada aplikasi <a href="/" class="text-primary">YouBID</a>.</p>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="text-primary font-weight-bold">Form Ubah Lot</h6>
        </div>
        @foreach ($lots as $lot)
        <div class="card-body">
            <form action="/lots/{{ $lot->id }}/edit" method="POST" class="form-group">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-12 mx-auto mb-3">
                        <label class="font-weight-bold text-primary" for="">Nama Barang</label>
                        <select name="item_id" id="selectItems" class="form-control col-12 @error('item_id')
                            is-invalid
                        @enderror">
                            <option selected value="{{ $lot->item_id }}">{{ $lot->Item->item_code }} | {{ $lot->Item->name }}</option>
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
                        <label class="font-weight-bold text-primary" for="location_id">Lokasi Lelang</label>
                        <select name="location_id" id="location_id" class="form-control">
                            <option disabled>Pilih Lokasi...</option>
                            <option selected value="{{ $lot->Location->id }}">{{ $lot->Location->name }}</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 text-right">
                        <a href="/lots" class="btn btn-secondary text-light">Kembali</a>
                        <button type="submit" class="btn btn-primary">Ubah</a>
                    </div>
                </div>
            </form>
        </div>
        @endforeach
    </div>
</div>
@include('components.scripts.previewimage')
@endsection