@extends('app.main')

@section('content')
@foreach ($societies as $society)
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    <p class="mb-4">Berikut adalah data masyarakat dengan nama <span class="text-danger">{{ $society->full_name }}.</span></p>

    {{-- Card Information --}}
    <div class="row">
        @if ($society->bank_account_id == null)
        <div class="col-12">
        @else
        <div class="col-lg-4 col-sm-12">
        @endif
            <div class="card shadow mb-4">
                <img class="m-2 mx-auto img-fluid rounded-circle border border-1 border-danger"
                    src="https://static.vecteezy.com/system/resources/thumbnails/004/607/791/small/man-face-emotive-icon-smiling-male-character-in-blue-shirt-flat-illustration-isolated-on-white-happy-human-psychological-portrait-positive-emotions-user-avatar-for-app-web-design-vector.jpg"
                    height="180" width="180" alt="">
                <h5 class="font-weight-bold text-danger text-center">{{ $society->full_name }}</h5>
                <h5 class="small text-center mb-4">{{ $society->email }}</h5>
            </div>
        </div>
        @if ($society->bank_account_id == null)
            
        @else
        <div class="col-lg-8 col-sm-12">
            <div class="card shadow">
                <div class="card-header">
                    <h6>Detail Bank</h6>
                </div>
                <img class="m-2 mx-auto img-fluid border"
                    src="{{ $society->BankAccount->Bank->image }}"
                    height="200" width="200" alt="">
                <h5 class="font-weight-bold text-danger text-center">{{ $society->BankAccount->account_number }}</h5>
                <h5 class="small text-center">{{ $society->BankAccount->account_owner }}</h5>
                <h5 class="small text-center mb-4">{{ $society->BankAccount->Bank->name }}</h5>
            </div>
        </div>
        @endif
        <div class="col-12">
            <div class="card shadow mb-3 mt-3">
                <div class="card-header">
                    <h6>Data Lengkap</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <h6 class="font-weight-bold">NIK</h6>
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            <h6>{{ $society->nik }}</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <h6 class="font-weight-bold">Nama Lengkap</h6>
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            <h6>{{ $society->full_name }}</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <h6 class="font-weight-bold">Email</h6>
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            <h6>{{ $society->email }}</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <h6 class="font-weight-bold">No Telepon</h6>
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            <h6>0{{ $society->phone_number }}</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <h6 class="font-weight-bold">Jenis Kelamin</h6>
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            @if ($society->gender == 1)
                            <h6>Laki - Laki</h6>
                            @else
                            <h6>Perempuan</h6>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <h6 class="font-weight-bold">Alamat Lengkap</h6>
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            <h6>{{ $society->full_address }}</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <h6 class="font-weight-bold">Kode Pos</h6>
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            <h6>{{ $society->postal_code }}</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <h6 class="font-weight-bold">Foto KTP</h6>
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            @if ($society->image == null)
                                <img src="https://disdukcapil.kamparkab.go.id/wp-content/uploads/2019/05/ktp.png" height="280" width="420">
                            @else
                            <img src="/img/id_card_image/{{ $society->id_card_image }}" height="280" width="420">
                            @endif
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
