@extends('app.user')

@section('content')
@include('components.home.slider')
<div class="container mt-3">
    <div class="col-12">
        <div class="card shadow mb-3">
            <div class="row">
                <div class="col-4">
                    <h4 class="text-category mb-3">Kategori Pilihan</h4>
                    <div class="row m-1">
                        <a class="text-decoration-none text-black text-center" href="/auction/cars">
                        <div class="col-4">
                            <div class="card" style="width: 100px; height: 100px;">
                                <i class="fas fa-car car text-center text-primary my-auto w-100"></i>
                                <span class="text-center" style="font-weight: bold; font-size: 14px;">Mobil</span>
                            </div>
                        </a>
                        </div>
                        <div class="col-4">
                            <a class="text-decoration-none text-black text-center" href="/auction/moto">
                            <div class="card" style="width: 100px; height: 100px;">
                                <i class="fas fa-motorcycle car text-center text-primary my-auto"></i>
                                <span class="text-center" style="font-weight: bold; font-size: 14px;">Motor</span>
                            </div>
                        </a>
                        </div>
                        <div class="col-4">
                            <div class="card" style="width: 100px; height: 100px;">
                                <i class="fas fa-gear car text-center text-primary my-auto"></i>
                                <span class="text-center" style="font-weight: bold; font-size: 14px;">Sparepart</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-auto">
                        <div class="col-4 mt-4">
                            <div class="card rounded-pill">
                                <div class="d-flex m-2">
                                    <i class="fas fa-motorcycle my-auto mx-auto m-1 text-primary"
                                        style="font-size: 18px;"></i>
                                    <p class="my-auto mx-auto m-1">Aerox</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mt-4">
                            <div class="card rounded-pill">
                                <div class="d-flex m-2">
                                    <i class="fas fa-car my-auto mx-auto m-1 text-primary"
                                        style="font-size: 18px;"></i>
                                    <p class="my-auto mx-auto m-1">Innova</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mt-4">
                            <div class="card rounded-pill">
                                <div class="d-flex m-2">
                                    <i class="fas fa-motorcycle my-auto mx-auto m-1 text-primary"
                                        style="font-size: 18px;"></i>
                                    <p class="my-auto mx-auto m-1">Aerox</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8 mb-4">
                    <h4 class="text-category mb-3 ml-4">Jadwal Lelang <a class="text-decoration-none text-primary"
                            style="font-size: 14px;" href="">Lihat Semua</a></h4>
                    <div class="col-12">
                        <div class="card mx-3">
                            <div class="row">
                                <div class="col-3 mx-auto my-3">
                                    <div class="card">
                                        <div class="mt-1 ml-1 mx-1">
                                            <p class="badge bg-primary">LOT 1</p>
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6 class="date">03 Mar</h6>
                                                    <p class="time">13:00</p>
                                                    <p class="location">Bandung</p>
                                                </div>
                                                <div class="col-6">
                                                    <i class="fas fa-car car text-primary"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mx-auto my-3">
                                    <div class="card">
                                        <div class="mt-1 ml-1 mx-1">
                                            <p class="badge bg-primary">LOT 1</p>
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6 class="date">03 Mar</h6>
                                                    <p class="time">13:00</p>
                                                    <p class="location">Bandung</p>
                                                </div>
                                                <div class="col-6">
                                                    <i class="fas fa-car car text-primary"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mx-auto my-3">
                                    <div class="card">
                                        <div class="mt-1 ml-1 mx-1">
                                            <p class="badge bg-primary">LOT 1</p>
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6 class="date">03 Mar</h6>
                                                    <p class="time">13:00</p>
                                                    <p class="location">Bandung</p>
                                                </div>
                                                <div class="col-6">
                                                    <i class="fas fa-car car text-primary"></i>
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
        </div>
        <hr>
    </div>
</div>

<div class="container mt-5 mb-3">
    <h4 class="text-category">Lelang Hari Ini <a class="text-decoration-none text-primary" style="font-size: 14px;"
            href="">Lihat Semua</a></h4>
    </h4>
    <div class="col-12">
        <div class="card poster" style="height: 449px; width: 287px;">
            <div class="row">
                <div class="col-4" style="margin-top: 150px; margin-left: 20px;">
                    <i class="fas fa-gavel text-light" style="font-size: 120px;"></i>
                    <h5 style="font-size: 16px; color: #ffff; margin-top: 10px;">Temukan Barang Impianmu!</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="card id"
                        style="margin-top: -275px; margin-left: 180px; height: 320px; width: 200px;">
                        dasdsad
                    </div>
                </div>
                <div class="col-3">
                    <div class="card id"
                        style="margin-top: -275px; margin-left: 350px; height: 320px; width: 200px;">
                        dasdsad
                    </div>
                </div>
                <div class="col-3">
                    <div class="card id"
                        style="margin-top: -275px; margin-left: 520px; height: 320px; width: 200px;">
                        dasdsad
                    </div>
                </div>
                <div class="col-3">
                    <div class="card id"
                        style="margin-top: -275px; margin-left: 680px; height: 320px; width: 200px;">
                        dasdsad
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection