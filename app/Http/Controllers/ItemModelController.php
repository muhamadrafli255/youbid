<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\ItemModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ItemModelController extends Controller
{
    public function index()
    {
        $title = "Daftar Model";
        return view('contents.models.index', compact('title'));
    }

    public function create()
    {
        $title  =   "Tambah Model";
        $brands =   Brand::get();
        return view('contents.models.create', compact('title', 'brands'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'              =>  'required',
            'brand_id'          =>  'required',
            'production_year'   =>  'required'
        ]);

        ItemModel::create($validatedData);
        toast()->success('Berhasil','Model '.$request->name.' Berhasil Ditambahkan!');
        return redirect('/models');
    }

    public function edit($id)
    {
        $title = 'Ubah Model';
        $models = ItemModel::where('id', $id)->get();
        $brands = Brand::get();
        return view('contents.models.edit', compact('title', 'models', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'              =>  'required',
            'production_year'   =>  'required',
            'brand_id'          =>  'required'
        ]);

        ItemModel::where('id', $id)->update($validatedData);
        toast()->success('Berhasil','Model '.$request->name.' Berhasil Dirubah!');
        return redirect('/models');
    }

    public function delete($id)
    {
        $models = ItemModel::where('id', $id)->get();
        foreach($models as $model)
        // dd($category->Brand->count());
        if($model->Item->count() != 0)
        {
            toast()->error('Gagal!', 'Model tidak bisa dihapus karena masih ada merk didalamnya!');
            return redirect('/models');
        }else{
        ItemModel::where('id', $id)->delete();
        toast()->success('Berhasil!', 'Kategori '.$model->name.' Berhasil Dihapus!');
        return redirect('/models');
        }
    }
}
