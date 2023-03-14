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
    @foreach ($auctions as $auction)
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    <p class="mb-4">Berikut adalah detail lelang dari <span class="text-primary">{{ $auction->Lot->name }}</span>.</p>

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
                    <h6 class="m-0 font-weight-bold text-primary">Detail Barang</h6>
                </div>
                @foreach ($images as $image)
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div id="custCarousel" class="carousel slide mb-5" data-ride="carousel" align="center">
                                <!-- slides -->
                                <div class="carousel-inner rounded">
                                    <div class="carousel-item active">
                                        <img src="/img/item-images/{{ $image[0]->image_name }}" alt="{{ $auction->Lot->name }}">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="/img/item-images/{{ $image[1]->image_name }}" alt="{{ $auction->Lot->name }}">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="/img/item-images/{{ $image[2]->image_name }}" alt="{{ $auction->Lot->name }}">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="/img/item-images/{{ $image[3]->image_name }}" alt="{{ $auction->Lot->name }}">
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
                                    <h6>{{ $auction->Lot->Item->item_code }}</h6>
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
                                    <h6>{{ $auction->Lot->Item->name }}</h6>
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
                                    <h6>{{ $auction->Lot->Item->ItemModel->name }}</h6>
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
                                    <h6>{{ $auction->Lot->Item->ItemModel->Brand->name }}</h6>
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
                                    <h6>{{ $auction->Lot->Item->ItemModel->Brand->Category->name }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-sm-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Detail Lelang</h6>
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
                                            <h6>{{ $auction->Lot->name }}</h6>
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
                                            <h6>{{ $auction->Lot->Location->name }}</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-1 ml-1 mb-2">
                                        <div class="col-5">
                                            <h6 class="font-weight-bold">Harga Awal</h6>
                                        </div>
                                        <div class="col-1">
                                            :
                                        </div>
                                        <div class="col-4">
                                            <h6>{{ 'Rp. '.strrev(implode('.',str_split(strrev(strval($auction->initial_price)),3))); }}</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-1 ml-1 mb-2">
                                        <div class="col-5">
                                            <h6 class="font-weight-bold">Waktu Pembukaan</h6>
                                        </div>
                                        <div class="col-1">
                                            :
                                        </div>
                                        <div class="col-4">
                                            <h6>{{ \Carbon\Carbon::parse($auction->opened_date)->format('d-M-Y, H:i') }}</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-1 ml-1 mb-2">
                                        <div class="col-5">
                                            <h6 class="font-weight-bold">Waktu Penutupan</h6>
                                        </div>
                                        <div class="col-1">
                                            :
                                        </div>
                                        <div class="col-4">
                                            <h6>{{ \Carbon\Carbon::parse($auction->closed_date)->format('d-M-Y, H:i') }}</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-1 ml-1 mb-2">
                                        <div class="col-5">
                                            <h6 class="font-weight-bold">Status</h6>
                                        </div>
                                        <div class="col-1">
                                            :
                                        </div>
                                        <div class="col-4">
                                            @if ($auction->status == 0)
                                                <span class="badge badge-danger">Ditutup</span>
                                            @else
                                                <span class="badge badge-primary">Dibuka</span>
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-sm-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Bid</h6>
                                </div>
                                <div class="card-body">
                                    <div class="btn-group dropright">
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded mb-2"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-download"></i>
                                        </button>
                                        <div class="dropdown-menu w-100 text-center">
                                            <button class="btn btn-sm btn-success col w-75 mb-2 dt-excel"><i class="fas fa-file-excel"></i> Excel</button>
                                            <button class="btn btn-sm btn-primary col w-75 mb-2 dt-pdf"><i class="fas fa-file-pdf"></i> PDF</button>
                                            <button class="btn btn-sm btn-secondary col w-75 mb-2 dt-print"><i class="fas fa-print"></i> Print</button>
                                        </div>
                                    </div>
                                            <div class="float-right ml-2">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                class="fas fa-search"></i></span>
                                                    </div>
                                                    <input type="text" id="SearchBox" class="form-control form-control-sm dt-search"
                                                        placeholder="Masukan Kata Kunci" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="float-right">
                                                <div class="d-flex">
                                                <select name="lengthMenu" id="lengthMenu" class="form-control form-control-sm dt-length">
                                                    <option value="10">10</option>
                                                    <option value="20">20</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                    <option value="-1">All</option>
                                                </select>
                                                </div>
                                            </div>
                                    <div class="table-responsive">
                                        <table id="dtAuctions" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Masyarakat</th>
                                                    <th>Jumlah Bid</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
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
