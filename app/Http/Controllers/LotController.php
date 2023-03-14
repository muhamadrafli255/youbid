<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use App\Models\Item;
use App\Models\Auction;
use App\Models\Location;
use App\Models\ItemImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LotController extends Controller
{
    public function index()
    {
        $title = "Daftar Lot";
        $auction = Auction::where('opened_date', Carbon::now())->update(['status' => 1]);
        $auction = Auction::where('closed_date', Carbon::now())->update(['status' => 0]);
        return view('contents.lots.index', compact('title'));
    }

    public function create()
    {
        $title = "Tambah Lot";
        $items = Item::where('is_auction', 0)->get();
        $locations   = Location::get();
        return view('contents.lots.create', compact('title', 'items', 'locations'));            
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'item_id'       =>  'required',
            'location_id'      =>  'required'
        ]);

        Lot::create($validatedData);
        Item::where('id', $request->item_id)->update(['is_auction' => 1]);
        toast()->success('Berhasil!', 'Lot '.$request->name.' Berhasil Ditambahkan!');
        return redirect('/lots');
    }

    public function detail($id)
    {
        $title = "Detail Lot";
        $lots = Lot::where('id', $id)->get();
        foreach($lots as $lot)
        $images[] = ItemImage::where('item_id', $lot->Item->id)->get();
        return view('contents.lots.detail', compact('title', 'lots', 'images'));
    }

    public function edit($id)
    {
        $title = "Ubah Lot";
        $lots = Lot::where('id', $id)->get();
        $items = Item::where('is_auction', 0)->get();
        foreach($lots as $lot)
        $locations = Location::where('id', '!=', $lot->Location->id)->get();
        return view('contents.lots.edit', compact('title', 'lots', 'items', 'locations'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'item_id'       =>  'required',
            'location_id'      =>  'required'
        ]);

        $getLots = Lot::where('id', $id)->get();
        foreach($getLots as $lot)
        {
            Item::where('id', $lot->item_id)->update(['is_auction' => 0]);
        }
        Lot::where('id', $id)->update($validatedData);
        Item::where('id', $request->item_id)->update(['is_auction' => 1]);
        toast()->success('Berhasil!', 'Lot '.$lot->name.' Berhasil Dirubah!');
        return redirect('/lots');
    }

    public function delete($id)
    {
        $getLots = Lot::where('id', $id)->get();
        foreach($getLots as $lot)
        {
            Item::where('id', $lot->item_id)->update(['is_auction' => 0]);
        }
        Lot::where('id', $id)->delete();
        toast()->success('Berhasil!', 'Lot '.$lot->name.' Berhasil Dihapus!');
        return redirect('/lots');
    }
}
