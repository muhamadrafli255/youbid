<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use App\Models\User;
use App\Models\Category;
use App\Models\TicketPrice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TransactionTicket;
use Illuminate\Support\Facades\Auth;
use App\Services\Midtrans\CreateSnapTokenService;

class TicketController extends Controller
{
    public function index()
    {
        $title = "Beli Tiket";
        $lots  = Lot::paginate(4);
        return view('contents.user.ticket.buyticket', compact('title', 'lots'));
    }

    public function review($id)
    {
        $title = "Review Pembelian Tiket";
        $lots  = Lot::where('id', $id)->get();
        foreach($lots as $lot)
        $getPrice = TicketPrice::where('category_id', $lot->Item->ItemModel->Brand->Category->id)->get();
        return view('contents.user.ticket.review', compact('title', 'lots', 'getPrice'));
    }

    public function store(Request $request)
    {
        TransactionTicket::create([
            'user_id'           =>  Auth::user()->id,
            'name'              =>  $request->name,
            'quantity'          =>  $request->quantity,
            'total_price'       =>  $request->total_price,
            'payment_status'    =>  1,
        ]);

        return redirect('/buyticket/transaction');
    }

    public function history()
    {
        $title  = "Transaksi Pembelian Tiket";
        $orders = TransactionTicket::where('user_id', Auth::user()->id)->get();
        return view('contents.user.ticket.transaction', compact('title', 'orders'));
    }

    public function show(TransactionTicket $order, $id)
    {
        $orders = $order->where('id', $id)->get();
        foreach($orders as $order)
        $title = "Detail Transaksi Pembelian Tiket";
        // dd($order);
        $snapToken = $order->snap_token;
        if (empty($snapToken)) {
            // Jika snap token masih NULL, buat token snap dan simpan ke database
 
            $midtrans = new CreateSnapTokenService($order);
            $snapToken = $midtrans->getSnapToken();
 
            $order->snaptoken = $snapToken;
            $order->save();
        }
 
        return view('contents.user.ticket.show', compact('order', 'snapToken', 'title'));
    }

    public function mobil($name)
    {
        // $title = "Beli Tiket";
        // $categories = Category::where('name', $name)->get();
        // foreach($categories as $category)
        // $brand = $category->Brand->;
        // dd($categories->Brand->id);
        // $lots  = Lot::where('item_id', $category->Brand->ItemModel->id)->get();
        // dd($lots);
        // return view('contents.user.ticket.buyticket', compact('title', 'lots'));
    }
}
