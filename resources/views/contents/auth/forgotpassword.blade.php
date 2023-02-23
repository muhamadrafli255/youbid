@extends('app.auth')

@section('content')
            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    @if (session('failed'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
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
                                            <h1 class="h4 text-gray-900 mb-4">Lupa Password!</h1>
                                        </div>
                                        <form class="user" action="/forgot-password" method="POST">
                                            @csrf
                                            <div class="form-group mb-4">
                                                <input type="email" name="email" class="form-control form-control-user @error('email')
                                                    is-invalid
                                                @enderror"
                                                    placeholder="Masukkan Alamat Email" required>
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                            <button type="submit" class="btn btn-danger btn-user btn-block">
                                                Atur Ulang Password
                                            </button>
                                            <hr>
                                        </form>
                                        <div class="text-center mt-4">
                                            <a class="small text-danger" href="/login">Ingat Password?</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small text-danger" href="/register">Belum Punya Akun?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
    
            </div>
@endsection