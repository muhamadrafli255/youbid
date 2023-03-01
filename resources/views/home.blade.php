@extends('app.user')

@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner mt-4">
        <div class="carousel-item active">
            <img src="assets/img/slides/slide1.png" height="400" class="d-block w-100 img-fluid" alt="...">
        </div>
        <div class="carousel-item">
            <img src="..." class="d-block w-100 bg-primary" alt="...">
        </div>
        <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>
</div>

<div class="container-fluid mt-4">
    <div class="info-card text-danger">
        <div class="d-flex">
            <i class="ri-alarm-warning-fill"></i>
            <span class="font-weight-bold">INFO</span>
            <marquee>Batal Lelang Karena Ada Kepentingan Meeting!</marquee>
        </div>
    </div>
    <div class="card mt-4 mb-4 shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <h5 class="font-weight-bold mb-4">Kategori Pilihan</h5>
                    <div class="row">
                        <div class="card-category card ml-2 mx-auto mb-4" style="width: 12rem;">
                            <img src="assets/img/option-search/mobil.png" class="card-img-top img-fluid"
                                height="75px" alt="..." height="90px" width="125px">
                            <div class="card-body">
                                <h5 class="card-title text-center mt-5">Mobil</h5>
                            </div>
                        </div>
                        <div class="card-category card ml-2 mx-auto mb-4" style="width: 12rem;">
                            <img src="assets/img/option-search/motor.png" class="card-img-top img-fluid"
                                height="75px" alt="..." height="90px" width="125px">
                            <div class="card-body">
                                <h5 class="card-title text-center mt-2">Motor</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <h5 class="font-weight-bold mb-4">Jadwal Lelang <a href=""
                            class="text-decoration-none h6 font-weight-bold ml-2 text-danger">Lihat Semua</a></h5>
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-active">Mobil</button>
                            <button class="btn">Motor</button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-2 col-sm-4 mb-3 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <p><span class="badge badge-danger">LIVE</span></p>
                                            <img src="assets/img/option-search/mobil.png" alt=""
                                                class="float-right img-fluid mb-1" height="95" width="175">
                                            <h6 class="font-weight-bold">20 FEB</h6>
                                            <p style="font-size: 12px;" class="font-weight-bold">11.00 WIB</p>
                                            <p style="font-size: 12px;" class="font-weight-bold">Bandung</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-4 mb-3 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <p><span class="badge badge-danger">LIVE</span></p>
                                            <img src="assets/img/option-search/mobil.png" alt=""
                                                class="float-right img-fluid mb-1" height="95" width="175">
                                            <h6 class="font-weight-bold">20 FEB</h6>
                                            <p style="font-size: 12px;" class="font-weight-bold">11.00 WIB</p>
                                            <p style="font-size: 12px;" class="font-weight-bold">Bandung</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-4 mb-3 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <p><span class="badge badge-danger">LIVE</span></p>
                                            <img src="assets/img/option-search/mobil.png" alt=""
                                                class="float-right img-fluid mb-1" height="95" width="175">
                                            <h6 class="font-weight-bold">20 FEB</h6>
                                            <p style="font-size: 12px;" class="font-weight-bold">11.00 WIB</p>
                                            <p style="font-size: 12px;" class="font-weight-bold">Bandung</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-4 mb-3 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <p><span class="badge badge-danger">LIVE</span></p>
                                            <img src="assets/img/option-search/mobil.png" alt=""
                                                class="float-right img-fluid mb-1" height="95" width="175">
                                            <h6 class="font-weight-bold">20 FEB</h6>
                                            <p style="font-size: 12px;" class="font-weight-bold">11.00 WIB</p>
                                            <p style="font-size: 12px;" class="font-weight-bold">Bandung</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-4 mb-3 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <p><span class="badge badge-danger">LIVE</span></p>
                                            <img src="assets/img/option-search/mobil.png" alt=""
                                                class="float-right img-fluid mb-1" height="95" width="175">
                                            <h6 class="font-weight-bold">20 FEB</h6>
                                            <p style="font-size: 12px;" class="font-weight-bold">11.00 WIB</p>
                                            <p style="font-size: 12px;" class="font-weight-bold">Bandung</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-4 mb-3 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <p><span class="badge badge-danger">LIVE</span></p>
                                            <img src="assets/img/option-search/mobil.png" alt=""
                                                class="float-right img-fluid mb-1" height="95" width="175">
                                            <h6 class="font-weight-bold">20 FEB</h6>
                                            <p style="font-size: 12px;" class="font-weight-bold">11.00 WIB</p>
                                            <p style="font-size: 12px;" class="font-weight-bold">Bandung</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <h5 class="font-weight-bold mt-5">Lelang Hari Ini <a href=""
                class="text-decoration-none h6 font-weight-bold ml-2 text-danger">Lihat Semua</a></h5>
        <div class="auction-now">
            <div class="row">
                @foreach ($lots as $lot)
                <div class="col-lg-3 col-sm-6 mb-3">
                    <div class="card" style="width: 18rem;">
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
                                    <h6 class="year font-weight-bold"{{ \Carbon\Carbon::parse($lot->opened_date)->format('d M Y H:i') }}</h6>
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
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection