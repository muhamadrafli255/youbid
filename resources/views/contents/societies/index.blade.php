@extends('app.main')

@section('content')
                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
                        <p class="mb-4">Berikut adalah data masyarakat dari <a href="/" class="text-danger">YouBID</a>.</p>
    
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-danger">Tabel Masyarakat</h6>
                            </div>
                            <div class="card-body">
                                <div class="btn-group dropright">
                                    <button type="button" class="btn btn-sm btn-outline-secondary rounded mb-2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <div class="dropdown-menu w-100 text-center">
                                        <button class="btn btn-sm btn-success col w-75 mb-2"><i class="fas fa-file-excel dt-excel"></i> Excel</button>
                                        <button class="btn btn-sm btn-danger col w-75 mb-2"><i class="fas fa-file-pdf dt-pdf"></i> PDF</button>
                                        <button class="btn btn-sm btn-secondary col w-75 mb-2"><i class="fas fa-print dt-print"></i> Print</button>
                                    </div>
                                </div>
                                <a href="/societies/create" class="btn btn-sm btn-outline-danger rounded mb-2"><i
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
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Foto Profile</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td class="text-center"><img class="img-fluid rounded-circle border border-1 border-danger" src="/img/undraw_profile.svg" height="100" width="100" alt=""></td>
                                                <td>320123290493</td>
                                                <td>Eman Simatupang</td>
                                                <td>emanganteng@gmail.com</td>
                                                <td class="text-center"><span class="badge badge-success">Terverifikasi</span></td>
                                                <td class="text-center">
                                                    <a href="/societies/{id}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                                    <a href="" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td class="text-center"><img class="img-fluid rounded-circle border border-1 border-danger" src="/img/undraw_profile.svg    " height="100" width="100" alt=""></td>
                                                <td>320123287652</td>
                                                <td>Dadang Siheru</td>
                                                <td>dadangganteng@gmail.com</td>
                                                <td class="text-center"><span class="badge badge-success">Terverifikasi</span></td>
                                                <td class="text-center">
                                                    <a href="" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                                    <a href="" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    
                    </div>
                    <!-- /.container-fluid -->  
@endsection