@extends('app.user')

@section('script')
    @include('components.scripts.selectchange')
@endsection

@section('content')
<div class="container d-flex flex-column mt-5">
    <div class="row flex-grow-1">
        <div class="col-3">
            <h5 class="font-weight-bold">Filter</h5>
            <div class="card shadow">
                <form class="m-3" action="">
                    <div class="form-group mb-3">
                        <label for="brands" class="font-weight-bold">Merk</label>
                        <select name="brand" id="brands" class="form-control">
                            <option>Pilih Merk...</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="model" class="font-weight-bold">Model</label>
                        <select name="model" id="model" class="form-control">
                            <option>Pilih Model...</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary text-light col-12">Filter</button>
                </form>
            </div>
        </div>
        <div class="col-9 mt-2">
            <div class="row">
                <h6>Menampilkan {{ $count }} lelang dengan kategori barang <span class="font-weight-bold">"{{ $name }}"</span></h6>
                <hr>
                @foreach ($lots as $lot)
                    <div class="col-3 mb-3">
                        <div class="card shadow">
                            <img class="card-img-top" src="/img/item-images/{{ $lot->Item->ItemImage[0]->image_name }}" alt="">
                            <div class="card-body">
                                <h6 class="card-title">{{ $lot->Item->name }}</h6>
                                <div class="d-flex">
                                    <span class="d-flex small">
                                        <i class="fas fa-calendar text-primary"></i>
                                        <p class="small ml-1 font-weight-bold">{{ $lot->Item->ItemModel->production_year }}</p>
                                        <i class="fas fa-code-branch text-primary ml-4"></i>
                                        @if ($lot->Item->DetailItem->transmission == 1)
                                        <p class="small ml-1 font-weight-bold">AT</p>
                                        @else
                                        <p class="small ml-1 font-weight-bold">MT</p>
                                        @endif
                                    </span>
                                </div>
                                <p class="font-weight-bold" style="margin-top: -13px; margin-bottom: 1px;">{{ $lot->initial_price }}</p>
                                <span class="d-flex">
                                    <i class="fas fa-location-dot text-primary"></i>
                                    <h6 class="small ml-2">{{ $lot->location }}</h6>
                                </span>
                                    <span class="badge bg-primary small">
                                        {{ $lot->name }}
                                    </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection