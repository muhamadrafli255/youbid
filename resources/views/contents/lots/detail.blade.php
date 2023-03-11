@extends('app.main')

@section('style')
@include('components.styles.datatable')
<style>
    .carousel-inner img {
        width: 100%;
        height: 80%;
    }

    #custCarousel .carousel-indicators {
        position: static;
        margin-top: 5px;
    }

    #custCarousel .carousel-indicators>li {
        width: 100px;
    }

    #custCarousel .carousel-indicators li img {
        display: block;
        opacity: 0.5;
    }

    #custCarousel .carousel-indicators li.active img {
        opacity: 1;
    }

    #custCarousel .carousel-indicators li:hover img {
        opacity: 0.75;
    }

</style>
@endsection

@section('script')
@include('components.scripts.datatable')
@include('components.scripts.momentjs')
{{-- @include('components.scripts.categoryid') --}}
<script src="/app/brandsoncategories/index.js"></script>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    @foreach ($lots as $lot)
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    <p class="mb-4">Berikut adalah detail lot dari <span class="text-primary">{{ $lot->name }}</span>.</p>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Lot</h6>
                </div>
                @foreach ($images as $image)
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div id="custCarousel" class="carousel slide mb-5" data-ride="carousel" align="center">
                                <!-- slides -->
                                <div class="carousel-inner rounded">
                                    <div class="carousel-item active">
                                        <img src="/img/item-images/{{ $image[0]->image_name }}" alt="{{ $lot->name }}">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="/img/item-images/{{ $image[1]->image_name }}" alt="{{ $lot->name }}">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="/img/item-images/{{ $image[2]->image_name }}" alt="{{ $lot->name }}">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="/img/item-images/{{ $image[3]->image_name }}" alt="{{ $lot->name }}">
                                    </div>
                                </div>

                                <!-- Left right -->
                                <a class="carousel-control-prev" href="#custCarousel" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                                <a class="carousel-control-next" href="#custCarousel" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </a>

                                <!-- Thumbnails -->
                                <ol class="carousel-indicators list-inline">
                                    <li class="list-inline-item active">
                                        <a id="carousel-selector-0" class="selected" data-slide-to="0"
                                            data-target="#custCarousel">
                                            <img src="/img/item-images/{{ $image[0]->image_name }}" class="img-fluid">
                                        </a>
                                    </li>

                                    <li class="list-inline-item">
                                        <a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel">
                                            <img src="/img/item-images/{{ $image[1]->image_name }}" class="img-fluid">
                                        </a>
                                    </li>

                                    <li class="list-inline-item">
                                        <a id="carousel-selector-2" data-slide-to="2" data-target="#custCarousel">
                                            <img src="/img/item-images/{{ $image[2]->image_name }}" class="img-fluid">
                                        </a>
                                    </li>

                                    <li class="list-inline-item">
                                        <a id="carousel-selector-2" data-slide-to="3" data-target="#custCarousel">
                                            <img src="/img/item-images/{{ $image[3]->image_name }}" class="img-fluid">
                                        </a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 mt-sm-4">
                            <div class="row mt-1 ml-1 mb-2">
                                <div class="col-5">
                                    <h6 class="font-weight-bold">Kode Barang</h6>
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-4">
                                    <h6>{{ $lot->Item->item_code }}</h6>
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
                            <div class="row mt-1 ml-1">
                                <div class="col-5">
                                    <h6 class="font-weight-bold">Model Barang</h6>
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-4">
                                    <h6>{{ $lot->Item->ItemModel->name }}</h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-1 ml-1">
                                <div class="col-5">
                                    <h6 class="font-weight-bold">Merk Barang</h6>
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-4">
                                    <h6>{{ $lot->Item->ItemModel->Brand->name }}</h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-1 ml-1">
                                <div class="col-5">
                                    <h6 class="font-weight-bold">Kategori Barang</h6>
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-4">
                                    <h6>{{ $lot->Item->ItemModel->Brand->Category->name }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-sm-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Lot</h6>
                                </div>
                                    <div class="card-body">
                                        <div class="row mt-1 ml-1 mb-2">
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
                                        <div class="row mt-1 ml-1 mb-2">
                                            <div class="col-5">
                                                <h6 class="font-weight-bold">Waktu Dibuka</h6>
                                            </div>
                                            <div class="col-1">
                                                :
                                            </div>
                                            <div class="col-4">
                                                <h6>{{ \Carbon\Carbon::parse($lot->opened_date)->format('d M Y H:i') }}</h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mt-1 ml-1 mb-2">
                                            <div class="col-5">
                                                <h6 class="font-weight-bold">Waktu Ditutup</h6>
                                            </div>
                                            <div class="col-1">
                                                :
                                            </div>
                                            <div class="col-4">
                                                <h6>{{ \Carbon\Carbon::parse($lot->closed_date)->format('d M Y H:i') }}</h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mt-1 ml-1 mb-2">
                                            <div class="col-5">
                                                <h6 class="font-weight-bold">Lokasi</h6>
                                            </div>
                                            <div class="col-1">
                                                :
                                            </div>
                                            <div class="col-4">
                                                <h6>{{ $lot->location }}</h6>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- /.container-fluid -->
@endsection
