@extends('app.main')

    @section('style')
        @include('components.styles.datatable')
    @endsection

    @section('script')
        @include('components.scripts.datatable')
        @include('components.scripts.momentjs')
        @include('components.scripts.categoryid')
        <script src="/app/brandsoncategories/index.js"></script>
    @endsection

@section('content')
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            @foreach ($categories as $category)
                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
                            <p class="mb-4">Berikut adalah detail kategori dari kategori <span class="text-danger">{{ $category->name }}</span>.</p>
        
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
                                            <h6 class="m-0 font-weight-bold text-danger">Detail Kategori</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4 mx-auto">
                                                    <div class="card mx-auto">
                                                        <img class="text-center" src="/img/category-images/{{ $category->image }}" alt="">
                                                    </div>
                                                    <p class="font-weight-bold mt-2 text-center">Nama Kategori : <span>{{ $category->name }}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4 dt-container">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-danger">Tabel Merk</h6>
                                    <p class="m-0">Berikut adalah data merk yang ada pada kategori <span class="text-danger">{{ $category->name }}</span>.</p>
                                </div>
                                <div class="card-body">
                                            <div class="float-right ml-2 mb-2">
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
                                        <table id="dtBrandsOnCategories" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Logo</th>
                                                    <th>Nama</th>
                                                    <th>Jumlah Model</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- /.container-fluid -->  
@endsection