@extends('app.user')

@section('content')
<div class="container-fluid mx-3">
    <div style="margin-top:165px;">
        <h3 class="font-weight-bold">{{ $title }}</h3>
        <hr>
    </div>
        <div class="row">
            <div class="col-10 mx-auto mb-3">
                <div class="card shadow">
                    <div class="card-header">
                        <h6 class="font-weight-bold text-danger">{{ $title }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="row mt-2 ml-1">
                            <div class="col-5">
                                <h6 class="font-weight-bold">Nomor Pembayaran</h6>
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-4">
                                <h6>{{ $order->number }}</h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2 ml-1">
                            <div class="col-5">
                                <h6 class="font-weight-bold">Tiket Yang Dibeli</h6>
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-4">
                                <h6>{{ $order->name }}</h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2 ml-1">
                            <div class="col-5">
                                <h6 class="font-weight-bold">Harga</h6>
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-4">
                                <h6>IDR {{ $order->total_price }}</h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2 ml-1">
                            <div class="col-5">
                                <h6 class="font-weight-bold">Tanggal Transaksi</h6>
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-4">
                                <h6>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2 ml-1">
                            <div class="col-5">
                                <h6 class="font-weight-bold">Status</h6>
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-4">
                                @if ($order->payment_status == 1)
                                    <span class="badge badge-primary">Menunggu Dibayar</span>
                                @elseif($order->payment_status == 2)
                                    <span class="badge badge-primary">Selesai</span>
                                @elseif($order->payment_status == 3)
                                    <span class="badge badge-primary">Kadaluarsa</span>
                                @elseif($order->payment_status == 3)
                                    <span class="badge badge-primary">Gagal</span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="col-12">
                            <div class="text-right">
                                @if ($order->payment_status == 1)
                                    <button id="pay-button" class="btn btn-md rounded-pill btn-outline-danger">Bayar Sekarang</button>
                                @else

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
</script>
<script>
    const payButton = document.querySelector('#pay-button');
    payButton.addEventListener('click', function(e) {
        e.preventDefault();

        snap.pay('{{ $snapToken }}', {
            // Optional
            onSuccess: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
            }
        });
    });
</script>
@endsection
