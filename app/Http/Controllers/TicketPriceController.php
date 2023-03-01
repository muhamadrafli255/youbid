<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\TicketPrice;
use Illuminate\Http\Request;

class TicketPriceController extends Controller
{
    public function index()
    {
        $title = "Daftar Harga Tiket";
        return view('contents.ticketprice.index', compact('title'));
    }

    public function create()
    {
        $title = "Tambah Harga Tiket";
        $categories = Category::get();
        return view('contents.ticketprice.create', compact('title', 'categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id'   => 'required|unique:ticket_prices',
            'price'         =>  'required|numeric'
        ]);

        TicketPrice::create($validatedData);
        toast()->success('Berhasil!', 'Harga Ticket Berhasil Ditambahkan!');
        return redirect('/ticketprice');
    }

    public function edit($id)
    {
        $title = "Ubah Harga Kelipatan";
        $ticketPrices = TicketPrice::where('id', $id)->get();
        foreach($ticketPrices as $price)
        // dd($price->category_id);
        $categories = Category::where('id', '!=', $price->category_id)->get();
        return view('contents.ticketprice.edit', compact('title', 'ticketPrices', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id'   =>  'required',
            'price'         =>  'required',
        ]);

        $prices = TicketPrice::where('id', $id)->get();
        foreach($prices as $price)
        if($request->category_id == $price->category_id){

            TicketPrice::where('id', $id)->update([
                'price' =>  $validatedData['price']
            ]);
        }else{
            TicketPrice::where('id', $id)->update($validatedData);
        }
        toast()->success('Berhasil!', 'Harga Tiket Berhasil Dirubah!');
        return redirect('/ticketprice');
    }
}
