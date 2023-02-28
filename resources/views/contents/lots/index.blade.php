@extends('app.main')

    @section('style')
        @include('components.styles.datatable')
    @endsection

    @section('script')
        @include('components.scripts.newdatatable')
        @include('components.scripts.momentjs')
        <script src="/app/lot/index.js"></script>
    @endsection


@section('content')
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
                            <p class="mb-4">Berikut adalah data lot yang ada di <a href="/" class="text-danger">YouBID</a>.</p>
        
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4 dt-container">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-danger">Tabel Lot</h6>
                                </div>
                                <div class="card-body">
                                    <div class="btn-group dropright">
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded mb-2"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-download"></i>
                                        </button>
                                        <div class="dropdown-menu w-100 text-center">
                                            <button class="btn btn-sm btn-success col w-75 mb-2 dt-excel"><i class="fas fa-file-excel"></i> Excel</button>
                                            <button class="btn btn-sm btn-danger col w-75 mb-2 dt-pdf"><i class="fas fa-file-pdf"></i> PDF</button>
                                            <button class="btn btn-sm btn-secondary col w-75 mb-2 dt-print"><i class="fas fa-print"></i> Print</button>
                                        </div>
                                    </div>
                                    <a href="/lots/create" class="btn btn-sm btn-outline-danger rounded mb-2"><i
                                            class="fas fa-plus"></i> Tambah</a>
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
                                        <table id="dtLots" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Lot</th>
                                                    <th>Waktu Dibuka</th>
                                                    <th>Waktu Ditutup</th>
                                                    <th>Lokasi</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                        <!-- /.container-fluid -->  
@endsection