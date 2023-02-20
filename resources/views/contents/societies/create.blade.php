@extends('app.main')

@section('content')
    <div class="container-fluid">
                                <!-- Page Heading -->
                                <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
                                <p class="mb-4">Berikut adalah formulir tambah data masyarakat dari <a href="/" class="text-danger">YouBID</a>.</p>

                                <div class="card show mb-4">
                                    <div class="card-header">
                                        <h6 class="text-danger">Form Tambah Masyarakat</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="" class="form-group">
                                            <div class="row">
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-danger" for="">NIK</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-danger" for="">Nama Lengkap</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-danger" for="">Email</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-danger" for="">No Telepon</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="font-weight-bold text-danger" for="">Jenis Kelamin</label>
                                                    <select name="" id="" class="form-control">
                                                        <option>Pilih Jenis Kelamin...</option>
                                                        <option value="1">Laki - Laki</option>
                                                        <option value="2">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-danger" for="">Provinsi</label>
                                                    <select name="" id="" class="form-control">
                                                        <option>Pilih Provinsi...</option>
                                                        <option value="1">Jawa Barat</option>
                                                        <option value="2">Jawa Tengah</option>
                                                    </select>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-danger" for="">Kabupaten / Kota</label>
                                                    <select name="" id="" class="form-control">
                                                        <option>Pilih Kota / Kabupaten...</option>
                                                        <option value="1">Bandung</option>
                                                        <option value="2">Cianjur</option>
                                                    </select>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-danger" for="">Kecamatan</label>
                                                    <select name="" id="" class="form-control">
                                                        <option>Pilih Kecamatan...</option>
                                                        <option value="1">Katapang</option>
                                                        <option value="2">Garut</option>
                                                    </select>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label class="font-weight-bold text-danger" for="">Desa</label>
                                                    <select name="" id="" class="form-control">
                                                        <option>Pilih Desa...</option>
                                                        <option value="1">Sukamukti</option>
                                                        <option value="2">Sukamau</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="font-weight-bold text-danger" for="">Kode Pos</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="font-weight-bold text-danger" for="">Alamat Lengkap</label>
                                                    <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                                </div>
                                                <div class="col-12 text-right">
                                                    <a href="/societies" class="btn btn-secondary">Kembali</a>
                                                    <a href="" class="btn btn-danger">Tambah</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
    </div>
@endsection 