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
    @foreach ($items as $item)
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    <p class="mb-4">Berikut adalah detail barang dari barang <span class="text-primary">{{ $item->name }}</span>.</p>

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
                                        <img src="/img/item-images/{{ $image[0]->image_name }}" alt="{{ $item->name }}">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="/img/item-images/{{ $image[1]->image_name }}" alt="{{ $item->name }}">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="/img/item-images/{{ $image[2]->image_name }}" alt="{{ $item->name }}">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="/img/item-images/{{ $image[3]->image_name }}" alt="{{ $item->name }}">
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
                                    <h6>{{ $item->item_code }}</h6>
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
                                    <h6>{{ $item->name }}</h6>
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
                                    <h6>{{ $item->ItemModel->name }}</h6>
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
                                    <h6>{{ $item->ItemModel->Brand->name }}</h6>
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
                                    <h6>{{ $item->ItemModel->Brand->Category->name }}</h6>
                                </div>
                            </div>
                            <div class="col-12 mt-5">
                                <div class="card shadow mt-3 px-4">
                                    <div class="row">
                                        <div class="col-4 mx-auto text-center mt-2">
                                            <i style="font-size: 24px" class="fas fa-calendar"></i>
                                            <p class="text-center mt-2" style="font-size: 10px;">Tahun Produksi</p>
                                            <p class="text-center font-weight-bold"
                                                style="font-size: 10px; margin-top:-20px;">
                                                {{ $item->ItemModel->production_year }}</p>
                                        </div>
                                        <div class="col-4 mx-auto text-center mt-2">
                                            <i style="font-size: 24px" class="fas fa-gas-pump"></i>
                                            <p class="text-center mt-2" style="font-size: 10px;">Bahan Bakar</p>
                                            <p class="text-center font-weight-bold"
                                                style="font-size: 10px; margin-top:-20px;">{{ $item->DetailItem->fuel }}
                                            </p>
                                        </div>
                                        <div class="col-4 mx-auto text-center mt-2">
                                            <i style="font-size: 24px" class="fas fa-code-branch"></i>
                                            <p class="text-center mt-2" style="font-size: 10px;">Transmisi</p>
                                            @if ($item->DetailItem->transmission == 1)
                                            <p class="text-center font-weight-bold"
                                                style="font-size: 10px; margin-top:-20px;">AT</p>
                                            @else
                                            <p class="text-center font-weight-bold"
                                                style="font-size: 10px; margin-top:-20px;">MT</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($item->grade_item_id == null)
                        <div class="col-lg-8 col-sm-12">
                            <div class="card shadow mt-5">
                                <h5 class="mx-3 my-2 font-weight-bold">Info</h5>
                                <hr>
                                <div class="row mt-2 ml-1">
                                    <div class="col-5">
                                        <h6 class="font-weight-bold">Nomor Polisi</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $item->DetailItem->police_number }}</h6>
                                    </div>
                                </div>
                                <div class="row mt-2 ml-1">
                                    <div class="col-5">
                                        <h6 class="font-weight-bold">Kapasitas Mesin</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $item->DetailItem->machine_capacity }} CC</h6>
                                    </div>
                                </div>
                                <div class="row mt-2 ml-1">
                                    <div class="col-5">
                                        <h6 class="font-weight-bold">Nomor Rangka</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $item->DetailItem->chassis_number }}</h6>
                                    </div>
                                </div>
                                <div class="row mt-2 ml-1">
                                    <div class="col-5">
                                        <h6 class="font-weight-bold">Nomor Mesin</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $item->DetailItem->machine_number }}</h6>
                                    </div>
                                </div>
                                <div class="row mt-2 ml-1">
                                    <div class="col-5">
                                        <h6 class="font-weight-bold">Kilometer</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $item->DetailItem->kilometers }}</h6>
                                    </div>
                                </div>
                                <div class="row mt-2 ml-1">
                                    <div class="col-5">
                                        <h6 class="font-weight-bold">Warna Fisik</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-4" style="margin-bottom: 2.5rem;">
                                        <h6>{{ $item->DetailItem->physical_color }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col-lg-5 col-sm-12">
                            <div class="card shadow mt-5">
                                <h5 class="mx-3 my-2 font-weight-bold">Info</h5>
                                <hr>
                                <div class="row mt-2 ml-1">
                                    <div class="col-5">
                                        <h6 class="font-weight-bold">Nomor Polisi</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $item->DetailItem->police_number }}</h6>
                                    </div>
                                </div>
                                <div class="row mt-2 ml-1">
                                    <div class="col-5">
                                        <h6 class="font-weight-bold">Kapasitas Mesin</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $item->DetailItem->machine_capacity }} CC</h6>
                                    </div>
                                </div>
                                <div class="row mt-2 ml-1">
                                    <div class="col-5">
                                        <h6 class="font-weight-bold">Nomor Rangka</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $item->DetailItem->chassis_number }}</h6>
                                    </div>
                                </div>
                                <div class="row mt-2 ml-1">
                                    <div class="col-5">
                                        <h6 class="font-weight-bold">Nomor Mesin</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $item->DetailItem->machine_number }}</h6>
                                    </div>
                                </div>
                                <div class="row mt-2 ml-1">
                                    <div class="col-5">
                                        <h6 class="font-weight-bold">Kilometer</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $item->DetailItem->kilometers }}</h6>
                                    </div>
                                </div>
                                <div class="row mt-2 ml-1">
                                    <div class="col-5">
                                        <h6 class="font-weight-bold">Warna Fisik</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-4" style="margin-bottom: 2.5rem;">
                                        <h6>{{ $item->DetailItem->physical_color }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-lg-4 col-sm-12">
                            <div class="card shadow mt-5">
                                <h5 class="mx-3 my-2 font-weight-bold">Dokumen</h5>
                                <hr>
                                <div class="row mt-2 ml-1">
                                    <div class="col-4">
                                        <h6 class="font-weight-bold">STNK</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-5">
                                        @if ($item->DetailItem->vehiche_registration)
                                        <h6>Ada</h6>
                                        @else
                                        <h6>Tidak Ada</h6>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-2 ml-1">
                                    <div class="col-4">
                                        <h6 class="font-weight-bold">Tanggal STNK</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-5">
                                        <h6>{{ $item->DetailItem->vehicle_registration_date }}</h6>
                                    </div>
                                </div>
                                <div class="row mt-2 ml-1">
                                    <div class="col-4">
                                        <h6 class="font-weight-bold">BPKB</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-5">
                                        @if ($item->DetailItem->book_vehicle_owner)
                                        <h6>Ada</h6>
                                        @else
                                        <h6>Tidak Ada</h6>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-2 ml-1">
                                    <div class="col-4">
                                        <h6 class="font-weight-bold">Faktur</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-5">
                                        @if ($item->DetailItem->invoice)
                                        <h6>Ada</h6>
                                        @else
                                        <h6>Tidak Ada</h6>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-2 ml-1">
                                    <div class="col-4">
                                        <h6 class="font-weight-bold">Kuitansi</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-5">
                                        @if ($item->DetailItem->receipt)
                                        <h6>Ada</h6>
                                        @else
                                        <h6>Tidak Ada</h6>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-2 ml-1">
                                    <div class="col-4">
                                        <h6 class="font-weight-bold">KTP Pemilik</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-5">
                                        @if ($item->DetailItem->owner_identity)
                                        <h6>Ada</h6>
                                        @else
                                        <h6>Tidak Ada</h6>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($item->grade_item_id == null)

                        @else
                        <div class="col-lg-3 col-sm-12">
                            <div class="card shadow mt-5">
                                <h5 class="mx-3 my-2 font-weight-bold">Grade</h5>
                                <hr>
                                <div class="row ml-1 mt-2">
                                    <div class="col-6">
                                        <h6 class="font-weight-bold">Interior</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-3">
                                        <h6>{{ $item->GradeItem->interior }}</h6>
                                    </div>
                                </div>
                                <div class="row ml-1 mt-2">
                                    <div class="col-6">
                                        <h6 class="font-weight-bold">Eksterior</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-3">
                                        <h6>{{ $item->GradeItem->exterior }}</h6>
                                    </div>
                                </div>
                                <div class="row ml-1 mt-2">
                                    <div class="col-6">
                                        <h6 class="font-weight-bold">Mesin</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-3">
                                        <h6>{{ $item->GradeItem->machine }}</h6>
                                    </div>
                                </div>
                                <div class="row ml-1 mt-2 mb-2">
                                    <div class="col-6">
                                        <h6 class="font-weight-bold">Rangka</h6>
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-3">
                                        <h6>{{ $item->GradeItem->chassis }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-12">
                            <div class="card shadow mt-3">
                                <h5 class="mx-3 my-2 font-weight-bold">Deskripsi</h5>
                                <hr>
                                <p class="ml-4 mt-2 mb-4">{{ $item->description }}</p>
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
