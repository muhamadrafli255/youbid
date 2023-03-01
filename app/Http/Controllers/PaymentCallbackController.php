<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\TransactionTicket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\Midtrans\CallbackService;

class PaymentCallbackController extends Controller
{
    public function receive()
    {
        $callback = new CallbackService;
 
        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $order = $callback->getOrder();
 
            if ($callback->isSuccess()) {
                TransactionTicket::where('id', $order->id)->update([
                    'payment_status' => 2,
                ]);

            }
 
            if ($callback->isExpire()) {
                TransactionTicket::where('id', $order->id)->update([
                    'payment_status' => 3,
                ]);
            }
 
            if ($callback->isCancelled()) {
                TransactionTicket::where('id', $order->id)->update([
                    'payment_status' => 4,
                ]);
            }
 
            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notifikasi berhasil diproses',
                ]);
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key tidak terverifikasi',
                ], 403);
        }
    }

    public function post(Request $request)
    {   
        $get_user = TransactionTicket::where('number', $request->order_id)->get();
        foreach($get_user as $user)
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'pending'){
                $order = TransactionTicket::where('number', $request->order_id);
                $order->update(['payment_status' => 1]);
            }elseif($request->transaction_status == 'settlement'){
                $order = TransactionTicket::where('number', $request->order_id);
                $order->update(['payment_status' => 2]);
                Ticket::create([
                    'user_id'       => $user->user_id,
                    'ticket_number' =>  $request->order_id,
                ]);
                return redirect('/buyticket/transaction');
            }elseif($request->transaction_status == 'failure'){
                $order = TransactionTicket::where('number', $request->order_id);
                $order->update(['payment_status' => 4]);
            }
            elseif($request->transaction_status == 'expire'){
                $order = TransactionTicket::where('number', $request->order_id);
                $order->update(['payment_status' => 3]);
            }
        }
    }
}
