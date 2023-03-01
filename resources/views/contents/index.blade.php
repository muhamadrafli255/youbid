@extends('app.main')

@section('content')
    <h5 class="text-center">Selamat Datang {{ Auth::user()->full_name }}</h5>
@endsection