@extends('app.auth')

@section('content')
<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if (session('failed'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{ session('failed') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="/assets/img/bg/bg-login-image.jpg" class="img-fluid" alt="" height="600" width="500">
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center mt-4">
                                <h1 class="h4 text-gray-900 mb-4">Silahkan Masuk!</h1>
                            </div>
                            <form class="user" action="/login" method="POST">
                                @csrf
                                <div class="form-group mb-4">
                                    <input type="email" name="email" class="form-control form-control-user @error('email')
                                                    is-invalid
                                                @enderror" placeholder="Masukkan Alamat Email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <input type="password" name="password" class="form-control form-control-user @error('password')
                                                    is-invalid
                                                @enderror" placeholder="Masukkan Password">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <span>Anda telah mengetahui dan menyetujui <a href="" class="text-danger">Syarat
                                                & Ketentuan</a> serta <a href="" class="text-danger">Kebijakan
                                                Privasi</a> dari <a href="" class="text-danger">YouBID</a></span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger btn-user btn-block">
                                    Login
                                </button>
                                <hr>
                            </form>
                            <div class="text-center mt-4">
                                <a class="small text-danger" href="/register">Belum Punya Akun?</a>
                            </div>
                            <div class="text-center">
                                <a class="small text-danger" href="/forgot-password">Lupa Kata Sandi?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
