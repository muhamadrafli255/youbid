@extends('app.user')

@section('content')
<div class="container-fluid mx-3">
    <div style="margin-top:170px;">
        <h3 class="font-weight-bold">{{ $title }}</h3>
        <hr>
    </div>
    <div class="row">
        <div class="col-10 mx-auto mb-3">
            <div class="card shadow" style="margin-bottom: 140px;">
                <div class="card-header">
                    <h6 class="font-weight-bold text-danger">Data Pembelian Tiket</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            @foreach ($orders as $order)
                            <tr>
                                <th scope="col">Nomor Transaksi</th>
                                <th scope="col">Nama Transaksi</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Status</th>
                                @if ($order->payment_status == 1)
                                <th scope="col">Opsi</th>
                                @else

                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $order->number }}</td>
                                <td>{{ $order->name }}</td>
                                <td>IDR {{ $order->total_price }}</td>
                                <td>
                                @if ($order->payment_status == 1)
                                    <span class="badge badge-primary">Menunggu Dibayar</span>
                                @elseif($order->payment_status == 2)
                                <span class="badge badge-success">Sudah Dibayar</span>
                                @elseif($order->payment_status == 3)
                                <span class="badge badge-warning">Kadaluarsa</span>
                                @elseif($order->payment_ == 4)
                                <span class="badge badge-danger">Batal</span>
                                @endif
                                </td>
                                <td>
                                    @if ($order->payment_status == 1)
                                    <a href="/buyticket/transaction/{{ $order->id }}" class="btn btn-success">Detail</a>
                                    @else

                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
