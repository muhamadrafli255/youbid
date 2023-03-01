@extends('app.user')

@section('content')
<div class="container-fluid mx-3">
    <div style="margin-top:170px;">
        <h3 class="font-weight-bold">{{ $title }}</h3>
        <hr>
    </div>
        <div class="row">
            <div class="col-10 mx-auto mb-3">
                <div class="card shadow">
                    <div class="card-header">
                        <h6 class="font-weight-bold text-danger">Data Pembelian Tiket</h6>
                    </div>
                    <div class="card-body">
                        @foreach ($lots as $lot)
                        <div class="row mt-2 ml-1">
                            <div class="col-5">
                                <h6 class="font-weight-bold">Nama Lot</h6>
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-4">
                                <h6>{{ $lot->name }}</h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2 ml-1">
                            <div class="col-5">
                                <h6 class="font-weight-bold">Nama Barang</h6>
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-4">
                                <h6>{{ $lot->Item->name }}</h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2 ml-1">
                            <div class="col-5">
                                <h6 class="font-weight-bold">Jadwal Lelang</h6>
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-4">
                                <h6>{{ \Carbon\Carbon::parse($lot->opened_date)->format('d M Y') }}</h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2 ml-1">
                            <div class="col-5">
                                <h6 class="font-weight-bold">Harga Tiket</h6>
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-4">
                                @foreach ($getPrice as $price)
                                <h6>IDR {{ $price->price }}</h6>
                                @endforeach
                            </div>
                        </div>
                        <hr>
                        <div class="col-12">
                            <div class="text-right">
                                <form action="/buyticket/{{ $lot->id }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="name" value="Tiket {{ $lot->name }}">
                                    <input type="hidden" name="quantity" value="1">
                                    @foreach ($getPrice as $price)
                                    <input type="hidden" name="total_price" value="{{ $price->price }}">
                                    @endforeach
                                    <button type="submit" class="btn btn-md rounded-pill btn-outline-danger">Beli Tiket</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
