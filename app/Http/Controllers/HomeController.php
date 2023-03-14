<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemModel;
use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $title = "Beranda";
        $getDate = Lot::get();
        $lots = Lot::whereDate('opened_date', '=', date('Y-m-d'))->get();
        return view('home', compact('title', 'lots'));
    }

    public function getCars()
    {
        $title = "Lelang Mobil";
        $brands = Brand::where('category_id', 1)->get();
        $lots = Lot::whereHas('Item', function($query){
                return $query->whereHas('ItemModel', function ($query) {
                return $query->whereHas('Brand', function($query){
                return $query->where('category_id', '=', 1);
                });
                });
                })
                ->get();
                // dd($lots->count());
                if($lots->count() == 0){
                    $name = 'Mobil';
                    $count = "0";
                }else{
                    $count = $lots->count();
                    foreach($lots as $lot)
                    // dd($count);
                    $name = $lot->Item->ItemModel->Brand->Category->name;
                }
                    return view('contents.user.auction.cars', compact('title', 'lots', 'name', 'count', 'brands'));
    }

    public function getMoto()
    {
        $title = "Lelang Motor";
        $brands = Brand::where('category_id', 2)->get();
        $lots = Lot::whereHas('Item', function($query){
                return $query->whereHas('ItemModel', function ($query) {
                return $query->whereHas('Brand', function($query){
                return $query->where('category_id', '=', 2);
                });
                });
                })
                ->get();
                // dd($lots);
                if($lots->count() == 0){
                    $name = 'Motor';
                    $count = "0";
                }else{
                    $count = $lots->count();
                    foreach($lots as $lot)
                    $name = $lot->Item->ItemModel->Brand->Category->name;
                }
                    return view('contents.user.auction.moto', compact('title', 'lots', 'name', 'count', 'brands'));
    }

    public function getModel(Request $request)
    {
        $models = ItemModel::where('brand_id', $request->brand_id)->get();

        echo "<option>Pilih Model...</option>";

        foreach($models as $model)
        {
            echo "
                    <option value='$model->id'>$model->name | $model->production_year</option>
                ";
        }
    }

    public function getCategory(Request $request)
    {
        $brands = Brand::where('category_id', $request->category_id)->get();

        echo "<option>Pilih Merk...</option>";

        foreach($brands as $brand)
        {
            echo "
                    <option value='$brand->id'>$brand->name</option>
                ";
        }
    }

    public function auctionObject()
    {
        $title = "Objek Lelang";
        $lots = Lot::get();
        $categories = Category::get();
        return view('contents.user.auction.object', compact('title', 'lots', 'categories'));
    }
}