<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use App\Models\Auction;
use App\Models\ItemImage;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function index()
    {
        $title = 'Daftar Lelang';
        return view('contents.auctions.index', compact('title'));
    }

    public function detail($id)
    {
        $title = "Detail Lelang";
        $auctions = Auction::where('id', $id)->get();
        foreach($auctions as $auction)
        $images[] = ItemImage::where('item_id', $auction->Lot->Item->id)->get();
        return view('contents.auctions.detail', compact('title', 'auctions', 'images'));
    }

    public function create()
    {
        $title = "Tambah Lelang";
        $lots = Lot::where('is_auction', 0)->get();
        return view('contents.auctions.create', compact('title', 'lots'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lot_id'        =>  'required',
            'opened_date'   =>  'required',
            'closed_date'   =>  'required',
            'initial_price' =>  'required|numeric',
        ]);

        Auction::create($validatedData);
        Lot::where('id', $request->lot_id)->update(['is_auction' => 1]);
        toast()->success('Berhasil!', 'Lelang Berhasil Ditambahkan!');
        return redirect('/auctions');
    }

    public function edit($id)
    {
        $title = "Ubah Lelang";
        $auctions = Auction::where('id', $id)->get();
        $lots = Lot::where('is_auction', 0)->get();
        return view('contents.auctions.edit', compact('title', 'auctions', 'lots'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'lot_id'        => 'required',
            'opened_date'   =>  'required',
            'closed_date'   =>  'required',
            'initial_price' =>  'required|numeric'
        ]);
        Auction::where('id', $id)->update($validatedData);
        toast()->success('Berhasil!', 'Lelang Berhasil Dirubah!');
        return redirect('/auctions');
    }
}
