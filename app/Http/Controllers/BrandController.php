<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function index()
    {
        $title = 'Daftar Merk';
        return view('contents.brands.index', compact('title'));
    }

    public function create()
    {
        $title = 'Tambah Merk';
        $categories = Category::get();
        return view('contents.brands.create', compact('title', 'categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'          =>  'required',
            'category_id'   =>  'required',
            'image'         =>  'required'
        ]);

        if($request->image != null)
        {
            $image = $request->file('image');
            $validatedData['image'] = time().'.'.$image->extension();
        
            $destinationPath = public_path('/img/thumbnail');
            $img = Image::make($image->path());
            $img->resize(200, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$validatedData['image']);
    
            $destinationPath = public_path('/img/brand-images');
            $image->move($destinationPath, $validatedData['image']);

            Brand::create($validatedData);
            toast()->success('Berhasil','Merk '.$request->name.' Berhasil Ditambahkan!');
            return redirect('/brands');
        }

        return back();
    }

    public function edit($id)
    {
        $title = "Ubah Kategori";
        $brands = Brand::where('id', $id)->get();
        $categories = Category::get();
        return view('contents.brands.edit', compact('title', 'brands', 'categories'));
    }
}
