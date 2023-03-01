@extends('app.user')

@section('content')
<div class="container mx-auto">
    <div style="margin-top:170px;" class="bg-gradient-danger rounded">
        <hr>
        <h2 class="font-weight-bold text-white" style="margin-left: 35px;">{{ $title }}</h2>
        <p class="text-white" style="margin-left: 35px;">Silahkan Pilih Lelang Untuk Membeli Tiket</p>
        <hr>
    </div>
    <div class="card mt-4 mb-4 shadow">
        <h5 class="font-weight-bold mt-4 mx-4 mb-4">Kategori Pilihan</h5>
        <div class="card-body">
            @if (Request::is('buyticket/{name}'))
            <div class="auction-now">
                <div class="row">
                    @foreach ($lots as $lot)
                    <a class="text-decoration-none text-dark" href="/buyticket/{{ $lot->id }}">
                    <div class="col-lg-3 my-auto col-sm-6 mb-3">
                        <div class="card" style="width: 15rem;">
                            <img class="card-img-top rounded-5"
                                src="/img/item-images/{{ $lot->Item->ItemImage[0]->image_name }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $lot->Item->name }}</h5>
                                <p class="card-text justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <i class="ri-calendar-line"></i>
                                        <h6 class="year"> {{ $lot->Item->ItemModel->production_year }}</h6>
                                        <i class="ri-git-merge-fill"></i>
                                        @if ($lot->Item->DetailItem->transmission == 1)
                                        <h6 class="year"> AT</h6>
                                        @else
                                        <h6 class="year"> MT</h6>
                                        @endif
                                    </div>
                                    <h5 class="text-danger font-weight-bold">Rp. 76.000.000</h5>
                                    <div class="d-flex">
                                        <i class="ri-auction-line"></i>
                                        <h6 class="year font-weight-bold">{{ \Carbon\Carbon::parse($lot->opened_date)->format('d M Y H:i') }}</h6>
                                    </div>
                                    <div class="d-flex">
                                        <i class="ri-map-pin-line"></i>
                                        <h6 class="year font-weight-bold">{{ $lot->location }}</h6>
                                        <div class="text-right">
                                            <p><span class="badge badge-sm badge-danger">{{ $lot->name }}</span></p>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @else
                
            @endif
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                        <a class="text-decoration-none text-dark" href="/buyticket/mobil">
                        <div class="card-category card ml-2 mx-auto mb-4" style="width: 18rem;">
                            <img src="assets/img/option-search/mobil.png" class="card-img-top img-fluid"
                                height="75px" alt="..." height="90px" width="125px">
                            <div class="card-body">
                                <h5 class="card-title text-center mt-5">Mobil</h5>
                            </div>
                        </div>
                        </a>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <a class="text-decoration-none text-dark" href="/buyticket/motor">
                        <div class="card-category card ml-2 mx-auto mb-4" style="width: 18rem;">
                            <img src="assets/img/option-search/motor.png" class="card-img-top img-fluid"
                                height="75px" alt="..." height="84px" width="125px">
                            <div class="card-body">
                                <h5 class="card-title text-center">Motor</h5>
                            </div>
                        </a>
                        </div>
                        </div>
                    </div>
                </div>
        </div>
        <h5 class="font-weight-bold mt-4">Lelang Hari Ini <a href=""
                class="text-decoration-none h6 font-weight-bold ml-2 text-danger">Lihat Semua</a></h5>
        <div class="auction-now">
            <div class="row">
                @foreach ($lots as $lot)
                <a class="text-decoration-none text-dark" href="/buyticket/{{ $lot->id }}">
                <div class="col-lg-3 my-auto col-sm-6 mb-3">
                    <div class="card" style="width: 15rem;">
                        <img class="card-img-top rounded-5"
                            src="/img/item-images/{{ $lot->Item->ItemImage[0]->image_name }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $lot->Item->name }}</h5>
                            <p class="card-text justify-content-between align-items-center">
                                <div class="d-flex">
                                    <i class="ri-calendar-line"></i>
                                    <h6 class="year"> {{ $lot->Item->ItemModel->production_year }}</h6>
                                    <i class="ri-git-merge-fill"></i>
                                    @if ($lot->Item->DetailItem->transmission == 1)
                                    <h6 class="year"> AT</h6>
                                    @else
                                    <h6 class="year"> MT</h6>
                                    @endif
                                </div>
                                <h5 class="text-danger font-weight-bold">Rp. 76.000.000</h5>
                                <div class="d-flex">
                                    <i class="ri-auction-line"></i>
                                    <h6 class="year font-weight-bold">{{ \Carbon\Carbon::parse($lot->opened_date)->format('d M Y H:i') }}</h6>
                                </div>
                                <div class="d-flex">
                                    <i class="ri-map-pin-line"></i>
                                    <h6 class="year font-weight-bold">{{ $lot->location }}</h6>
                                    <div class="text-right">
                                        <p><span class="badge badge-sm badge-danger">{{ $lot->name }}</span></p>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                </a>
                @endforeach
            </div>
        </div>
</div>
@endsection
