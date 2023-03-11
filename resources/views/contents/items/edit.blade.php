@extends('app.main')

    @include('components.styles.formwizarditem')
    @include('components.scripts.formwizard')
    @include('components.scripts.previewitem')

@section('content')
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            @foreach ($items as $item)
                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
                            <p class="mb-4">Berikut adalah halaman untuk merubah data barang pada aplikasi <a href="/" class="text-primary">YouBID</a>.</p>
        
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <h6 class="text-primary font-weight-bold">Form Ubah Barang</h6>
                                </div>
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">   
                                        <div class="col-12">
                                            <div class="p-5">
                                                <div class="row">
                                                    <div class="col-md-12 mx-0">
                                                        <form id="msform" action="/items/{{ $item->id }}/edit" method="POST" enctype="multipart/form-data">
                                                            @method('put')
                                                            @csrf
                                                            <!-- progressbar -->
                                                            <ul id="progressbar" class="mx-auto">
                                                                <li class="active" id="account"><strong>Data Barang</strong></li>
                                                                <li id="personal"><strong>Detail Data Barang</strong></li>
                                                                <li id="payment"><strong>Grade Barang</strong></li>
                                                            </ul>
                                                            <!-- fieldsets -->
                                                            <fieldset>
                                                                <div class="user row">
                                                                    <h2 class="fs-title col-12">Data Barang</h2>
                                                                    <div class="col-12 text-left from-group mb-3">
                                                                        <label class="font-weight-bold text-primary" for="name">Nama Barang</label>
                                                                        <input type="text" class="form-control @error('name')
                                                                            is-invalid
                                                                        @enderror" name="name" id="name" placeholder="Masukkan Nama Barang" value="{{ $item->name }}" required>
                                                                        @error('name')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-12 text-left from-group mb-3">
                                                                        <label class="font-weight-bold text-primary" for="item_model_id">Nama Model</label>
                                                                        <select name="item_model_id" id="item_model_id" class="form-control @error('item_model_id')
                                                                            is-invalid
                                                                        @enderror" required>
                                                                        <option value="{{ $item->ItemModel->id }}">{{ $item->ItemModel->name }}</option>
                                                                            <option>Pilih Model...</option>
                                                                            @foreach ($models as $model)
                                                                                <option value="{{ $model->id }}">{{ $model->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('item_model_id')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-12 text-left form-group mb-3">
                                                                        <label class="font-weight-bold text-primary" for="description">Deskripsi</label>
                                                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description')
                                                                            is-invalid
                                                                        @enderror" required>{{ $item->description }}</textarea>
                                                                        @error('description')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <input type="button" name="next" class="next btn btn-primary mt-4" value="Selanjutnya"/>
                                                            </fieldset>
                                                            <fieldset>
                                                                <div class="user row mb-4">
                                                                    <h2 class="fs-title col-12 mb-3">Detail Data Barang</h2>
                                                                    <div class="col-sm-6 from-group mb-3 text-left">
                                                                        <label class="font-weight-bold text-primary" for="policeNumber">Nomor Polisi</label>
                                                                        <input type="text" class="form-control @error('police_number')
                                                                        is-invalid
                                                                    @enderror" id="policeNumber" name="police_number" placeholder="Masukkan Nomor Polisi" value="{{ $item->DetailItem->police_number }}" required>
                                                                    @error('police_number')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                                    </div>
                                                                    <div class="col-sm-6 from-group mb-3 text-left">
                                                                        <label class="font-weight-bold text-primary" for="machineCapacity">Kapasitas Mesin</label>
                                                                        <input type="number" class="form-control @error('machine_capacity')
                                                                        is-invalid
                                                                    @enderror" id="machineCapacity" name="machine_capacity" placeholder="Masukkan Kapasitas Mesin" value="{{ $item->DetailItem->machine_capacity }}" required>
                                                                    @error('machine_capacity')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                    </div>
                                                                    <div class="col-sm-6 from-group mb-3 text-left">
                                                                        <label class="font-weight-bold text-primary" for="transmission">Transmisi</label>
                                                                        <select class="form-control @error('transmission')
                                                                        is-invalid
                                                                    @enderror" id="transmission" name="transmission" required>
                                                                            @if ($item->DetailItem->transmission == 1)
                                                                            <option selected value="1">AT</option>
                                                                            <option value="2">MT</option>
                                                                            @else
                                                                            <option selected value="2">MT</option>
                                                                            <option value="1">AT</option>
                                                                            @endif
                                                                        </select>
                                                                        @error('transmission')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-sm-6 from-group mb-3 text-left">
                                                                        <label class="font-weight-bold text-primary" for="chassisNumber">Nomor Rangka</label>
                                                                        <input type="text" class="form-control @error('chassis_number')
                                                                        is-invalid
                                                                    @enderror" id="chassisNumber" name="chassis_number" placeholder="Masukkan Nomor Rangka" value="{{ $item->DetailItem->chassis_number }}" required>
                                                                    @error('chassis_number')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-sm-6 from-group mb-3 text-left">
                                                                        <label class="font-weight-bold text-primary" for="machineNumber">Nomor Mesin</label>
                                                                        <input type="text" class="form-control @error('machine_number')
                                                                        is-invalid
                                                                    @enderror" id="machineNumber" name="machine_number" placeholder="Masukkan Nomor Mesin" value="{{ $item->Detailitem->machine_number }}" required>
                                                                    @error('machine_number')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-sm-6 from-group mb-3 text-left">
                                                                        <label class="font-weight-bold text-primary" for="kilometers">Kilometer</label>
                                                                        <input type="text" class="form-control @error('kilometers')
                                                                        is-invalid
                                                                    @enderror" id="kilometers" name="kilometers" placeholder="Masukkan Kilometer" value="{{ $item->DetailItem->kilometers }}" required>
                                                                    @error('kilometers')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-sm-6 from-group mb-3 text-left">
                                                                        <label class="font-weight-bold text-primary" for="fuel">Bahan Bakar</label>
                                                                        <input type="text" class="form-control @error('fuel')
                                                                        is-invalid
                                                                    @enderror" id="fuel" name="fuel" placeholder="Masukkan Bahan Bakar" value="{{ $item->DetailItem->fuel }}" required>
                                                                    @error('fuel')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-sm-6 from-group mb-3 text-left">
                                                                        <label class="font-weight-bold text-primary" for="physicalColor">Warna Fisik</label>
                                                                        <input type="text" class="form-control @error('physical_color')
                                                                        is-invalid
                                                                    @enderror" id="physicalColor" name="physical_color" placeholder="Masukkan Warna Fisik" value="{{ $item->DetailItem->physical_color }}" required>
                                                                    @error('physical_color')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-sm-6 from-group mb-3 text-left">
                                                                        <label class="font-weight-bold text-primary" for="vehicleRegistration">STNK</label>
                                                                        <select class="form-control @error('vehicle_registration')
                                                                        is-invalid
                                                                    @enderror" id="vehicleRegistration" name="vehicle_registration" required>
                                                                            @if ($item->DetailItem->vehicle_registration == 1)
                                                                            <option selected value="1">Ada</option>
                                                                            <option value="2">Tidak Ada</option>
                                                                            @else
                                                                            <option selected value="2">Tidak Ada</option>
                                                                            <option value="1">Ada</option>
                                                                            @endif
                                                                        </select>
                                                                        @error('vehicle_registration')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-sm-6 from-group mb-3 text-left">
                                                                        <label class="font-weight-bold text-primary" for="vehicleRegistrationDate">Tanggal STNK</label>
                                                                        <input type="date" class="form-control @error('vehicle_registration_date')
                                                                        is-invalid
                                                                    @enderror" id="vehicleRegistrationDate" name="vehicle_registration_date" value="{{ $item->DetailItem->vehicle_registration_date }}" required>
                                                                    @error('vehicle_registration_date')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-sm-6 from-group mb-3 text-left">
                                                                        <label class="font-weight-bold text-primary" for="bookVehicleOwner">BPKB</label>
                                                                        <select class="form-control @error('book_vehicle_owner')
                                                                        is-invalid
                                                                    @enderror" id="bookVehicleOwner" name="book_vehicle_owner" required>
                                                                    @if ($item->DetailItem->book_vehicle_owner == 1)
                                                                    <option selected value="1">Ada</option>
                                                                    <option value="2">Tidak Ada</option>
                                                                    @else
                                                                    <option selected value="2">Tidak Ada</option>
                                                                    <option value="1">Ada</option>
                                                                    @endif
                                                                        </select>
                                                                        @error('book_vehicle_owner')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-sm-6 from-group mb-3 text-left">
                                                                        <label class="font-weight-bold text-primary" for="invoice">Faktur</label>
                                                                        <select class="form-control @error('invoice')
                                                                        is-invalid
                                                                    @enderror" id="invoice" name="invoice" required>
                                                                    @if ($item->DetailItem->invoice == 1)
                                                                    <option selected value="1">Ada</option>
                                                                    <option value="2">Tidak Ada</option>
                                                                    @else
                                                                    <option selected value="2">Tidak Ada</option>
                                                                    <option value="1">Ada</option>
                                                                    @endif
                                                                        </select>
                                                                        @error('invoice')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-sm-6 from-group mb-3 text-left">
                                                                        <label class="font-weight-bold text-primary" for="receipt">Kuitansi</label>
                                                                        <select class="form-control @error('receipt')
                                                                        is-invalid
                                                                    @enderror" id="receipt" name="receipt" required>
                                                                    @if ($item->DetailItem->receipt == 1)
                                                                    <option selected value="1">Ada</option>
                                                                    <option value="2">Tidak Ada</option>
                                                                    @else
                                                                    <option selected value="2">Tidak Ada</option>
                                                                    <option value="1">Ada</option>
                                                                    @endif
                                                                        </select>
                                                                        @error('receipt')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-sm-6 from-group mb-3 text-left">
                                                                        <label class="font-weight-bold text-primary" for="ownerIdentity">KTP Pemilik</label>
                                                                        <select class="form-control @error('owner_identity')
                                                                        is-invalid
                                                                    @enderror" id="ownerIdentity" name="owner_identity" required>
                                                                    @if ($item->DetailItem->owner_identity == 1)
                                                                    <option selected value="1">Ada</option>
                                                                    <option value="2">Tidak Ada</option>
                                                                    @else
                                                                    <option selected value="2">Tidak Ada</option>
                                                                    <option value="1">Ada</option>
                                                                    @endif
                                                                        </select>
                                                                        @error('owner_identity')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-12 from-group mb-3 text-left mt-3">
                                                                        <div class="row">
                                                                            <div class="custom-file mt-3">
                                                                                <input type="file" name="image_name[]" id="image" data-max_lenght="4" onchange="previewImages()" class="custom-file-input" multiple>
                                                                                <label class="custom-file-label @error('image_name')
                                                                                is-invalid
                                                                            @enderror" for="image">Foto Barang</label>
                                                                            @error('image_name')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                            </div>
                                                                            <div class="row mt-2" id="previewImages">
                                                                                
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <hr>
                                                                </div>
                                                                <input type="button" name="previous" class="previous btn btn-secondary text-light mt-4" value="Kembali"/>
                                                                <input type="button" name="next" class="next btn btn-primary mt-4" value="Selanjutnya"/>
                                                            </fieldset>
                                                            <fieldset>
                                                                <div class="user row">
                                                                    <h2 class="col-12 fs-title">Grade Barang</h2>
                                                                    <div class="col-sm-6 from-group mb-3 text-left">
                                                                        <label class="font-weight-bold text-primary" for="interior">Interior</label>
                                                                        <select class="form-control @error('interior')
                                                                        is-invalid
                                                                    @enderror" id="interior" name="interior" required>
                                                                            @if ($item->grade_item_id != null)
                                                                                <option value="{{ $item->GradeItem->interior }}">{{ $item->GradeItem->interior }}</option>
                                                                            @else
                                                                            <option selected disabled>Pilih Grade Interior...</option>
                                                                            @endif
                                                                            <option value="A">A</option>
                                                                            <option value="B">B</option>
                                                                            <option value="C">C</option>
                                                                            <option value="D">D</option>
                                                                        </select>
                                                                        @error('interior')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-sm-6 from-group mb-3 text-left">
                                                                        <label class="font-weight-bold text-primary" for="exterior">Eksterior</label>
                                                                        <select class="form-control @error('exterior')
                                                                        is-invalid
                                                                    @enderror" id="exterior" name="exterior" required>
                                                                            <option value="{{ $item->GradeItem->exterior }}">{{ $item->GradeItem->exterior }}</option>
                                                                            <option value="A">A</option>
                                                                            <option value="B">B</option>
                                                                            <option value="C">C</option>
                                                                            <option value="D">D</option>
                                                                        </select>
                                                                        @error('exterior')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-sm-6 from-group mb-3 text-left">
                                                                        <label class="font-weight-bold text-primary" for="machine">Mesin</label>
                                                                        <select class="form-control @error('machine')
                                                                        is-invalid
                                                                    @enderror" id="machine" name="machine" required>
                                                                            <option value="{{ $item->GradeItem->machine }}">{{ $item->GradeItem->machine }}</option>
                                                                            <option value="A">A</option>
                                                                            <option value="B">B</option>
                                                                            <option value="C">C</option>
                                                                            <option value="D">D</option>
                                                                        </select>
                                                                        @error('machine')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-sm-6 from-group mb-3 text-left">
                                                                        <label class="font-weight-bold text-primary" for="chassis">Rangka</label>
                                                                        <select class="form-control @error('chassis')
                                                                        is-invalid
                                                                    @enderror" id="chasiss" name="chassis" required>
                                                                            <option value="{{ $item->GradeItem->chassis }}">{{ $item->GradeItem->chassis }}</option>
                                                                            <option value="A">A</option>
                                                                            <option value="B">B</option>
                                                                            <option value="C">C</option>
                                                                            <option value="D">D</option>
                                                                        </select>
                                                                        @error('chassis')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <input type="button" name="previous" class="previous btn btn-secondary text-light mt-4" value="Kembali"/>
                                                                <button type="submit" class="btn btn-primary mt-4">Kirim</button>
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- /.container-fluid -->  
@endsection