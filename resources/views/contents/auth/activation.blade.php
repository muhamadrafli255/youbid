@extends('app.auth')

@section('content')
            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">
                    @if (session('failed'))
                    <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
                        {{ session('failed') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="card o-hidden border-0 shadow-lg" style="margin-top: 100px;">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">   
                                <div class="col-12">
                                    <div class="p-5">
                                        <div class="text-center mt-4">
                                            <h1 class="h4 text-gray-900 mb-4">Aktivasi Akun!</h1>
                                            <p>Silahkan masukan kode OTP yang dikirimkan kedalam email anda!.</p>
                                        </div>
                                        <form class="user" action="/activation/{{ $mytoken }}" method="POST">
                                            @csrf
                                            <div class="form-group mb-4">
                                                <input type="number" name="otp" class="form-control form-control-user"
                                                    placeholder="Masukkan Kode OTP">
                                                    <input type="hidden" name="token" value="{{ $mytoken }}">
                                            </div>
                                            <button type="submit" class="btn btn-primary text-light font-weight-bold btn-user btn-block">
                                                Aktivasi
                                            </button>
                                            <hr>
                                        </form>
                                        <div class="text-center mt-4">
                                            <a class="small text-primary text-decoration-none" href="/login">Tidak Mendapatkan Kode OTP?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
    
            </div>
@endsection