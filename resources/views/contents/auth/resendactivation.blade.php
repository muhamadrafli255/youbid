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
                                            <h1 class="h4 text-gray-900 mb-4">Aktivasi Akun!</h1>
                                            <p>Akun anda belum diaktivasi silahkan cek email anda untuk aktivasi!.</p>
                                        </div>
                                        <div class="text-center mt-4">
                                            <a class="small text-danger" href="/login">Tidak Mendapatkan Email?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
    
            </div>
@endsection