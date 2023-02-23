@extends('app.auth')

@section('content')
            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">
    
                    <div class="card o-hidden border-0 shadow-lg" style="margin-top: 100px;">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">   
                                <div class="col-12">
                                    <div class="p-5">
                                        <div class="text-center mt-4">
                                            <h1 class="h4 text-gray-900 mb-4">Atur Ulang Password!</h1>
                                        </div>
                                        <form class="user" action="/create-password/{{ $myToken }}" method="POST">
                                            @csrf
                                            <div class="form-group mb-4">
                                                <input type="password" name="password" class="form-control form-control-user @error('password')
                                                    is-invalid
                                                @enderror"
                                                    placeholder="Masukkan Password"  required>
                                                    @error('password')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}</div>   
                                                    @enderror
                                            </div>
                                            <div class="form-group mb-4">
                                                <input type="password" name="confirm_password" class="form-control form-control-user @error('confirm_password')
                                                    is-invalid
                                                @enderror"
                                                    placeholder="Ulangi Password"  required>
                                                    @error('confirm_password')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                            <button type="submit" class="btn btn-danger btn-user btn-block">
                                                Atur Ulang
                                            </button>
                                            <hr>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
    
            </div>
@endsection