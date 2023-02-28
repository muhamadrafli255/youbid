<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use App\Models\Item;
use Illuminate\Http\Request;

class LotController extends Controller
{
    public function index()
    {
        $title = "Daftar Lot";
        return view('contents.lots.index', compact('title'));
    }

    public function create()
    {
        $title = "Tambah Lot";
        $items = Item::where('is_auction', 0)->get();
        return view('contents.lots.create', compact('title', 'items'));            
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'item_id'       =>  'required',
            'opened_date'   =>  'required',
            'closed_date'   =>  'required',
            'location'      =>  'required'
        ]);

        Lot::create($validatedData);
        Item::where('id', $request->item_id)->update(['is_auction' => 1]);
        toast()->success('Berhasil!', 'Lot '.$request->name.' Berhasil Ditambahkan!');
        return redirect('/lots');
    }

    public function edit($id)
    {
        $title = "Ubah Lot";
        $lots = Lot::where('id', $id)->get();
        $items = Item::where('is_auction', 0)->get();
        return view('contents.lots.edit', compact('title', 'lots', 'items'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'item_id'       =>  'required',
            'opened_date'   =>  'required',
            'closed_date'   =>  'required',
            'location'      =>  'required'
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
