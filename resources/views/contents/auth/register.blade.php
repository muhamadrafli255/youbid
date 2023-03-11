@extends('app.auth')

@section('content')
            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">
    
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block">
                                    <img src="/assets/img/bg/bg-register.svg" class="img-fluid h-75 w-75" style="margin-top: 3rem; margin-left:3rem;" alt="bg-register">
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Silahkan Mendaftar!</h1>
                                        </div>
                                        <form class="user" action="/register" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" name="full_name" class="form-control form-control-user @error('full_name')
                                                    is-invalid
                                                @enderror"
                                                    placeholder="Masukkan Nama Lengkap" value="{{ old('full_name') }}">
                                                    @error('full_name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control form-control-user @error('email')
                                                    is-invalid
                                                @enderror"
                                                    placeholder="Masukkan Alamat Email" value="{{ old('email') }}">
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                            <div class="form-group">
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
                                                <input type="password" name="confirm_password" class="form-control form-control-user @error('confirm_password')
                                                    is-invalid
                                                @enderror" placeholder="Ulangi Password">
                                                @error('confirm_password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <span>Dengan mendaftar Anda telah mengetahui dan menyetujui <a href ="" class="text-primary">Syarat & Ketentuan</a> serta <a href ="" class="text-primary">Kebijakan Privasi</a> dari <a href ="" class="text-primary">YouBID</a></span>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block text-light font-weight-bold">
                                                Daftar
                                            </button>
                                            <hr>
                                        </form>
                                        <div class="text-center">
                                            <a class="small text-primary text-decoration-none" href="/login">Sudah Punya Akun?</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small text-primary text-decoration-none" href="/forgot-password">Lupa Password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
    
            </div>
@endsection