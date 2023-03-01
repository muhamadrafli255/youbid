<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\ItemModel;
use App\Models\Lot;
use Illuminate\Http\Request;
use App\Models\MultiplePrice;
use PhpParser\Parser\Multiple;

class MultiplePriceController extends Controller
{
    public function index()
    {
        $title = "Daftar Harga Kelipatan";
        return view('contents.multipleprice.index', compact('title'));
    }

    public function create()
    {
        $title = "Tambah Harga Kelipatan";
        $categories = Category::get();
        return view('contents.multipleprice.create', compact('title', 'categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id'   => 'required|unique:multiple_prices',
            'price'         =>  'required|numeric'
        ]);

        MultiplePrice::create($validatedData);
        toast()->success('Berhasil!', 'Harga Kelipatan Berhasil Ditambahkan!');
        return redirect('/multipleprice');
    }

    public function edit($id)
    {
        $title = "Ubah Harga Kelipatan";
        $multiplePrices = MultiplePrice::where('id', $id)->get();
        foreach($multiplePrices as $price)
        // dd($price->category_id);
        $categories = Category::where('id', '!=', $price->category_id)->get();
        return view('contents.multipleprice.edit', compact('title', 'multiplePrices', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id'   =>  'required',
            'price'         =>  'required',
        ]);

        $prices = MultiplePrice::where('id', $id)->get();
        foreach($prices as $price)
        if($request->category_id == $price->category_id){

            MultiplePrice::where('id', $id)->update([
                'price' =>  $validatedData['price']
            ]);
        }else{
            MultiplePrice::where('id', $id)->update($validatedData);
        }
        toast()->success('Berhasil!', 'Harga Kelipatan Berhasil Dirubah!');
        return redirect('/multipleprice');
    }

    public function delete($id)
    {
        
    }
}
