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

    public function detail($id)
    {
        $title = "Detail Merk";
        $brands = Brand::where('id', $id)->get();
        return view('contents.brands.detail', compact('title', 'brands'));
    }


    public function edit($id)
    {
        $title = "Ubah Merk";
        $brands = Brand::where('id', $id)->get();
        $categories = Category::get();
        return view('contents.brands.edit', compact('title', 'brands', 'categories'));
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name'  =>  'required',
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

            $getBrand = Brand::where('id', $id)->get();
            foreach($getBrand as $brand)
            $imagePath = 'img/brand-images/'.$brand->image;
            $thumbnailPath = 'img/thumbnail/'.$brand->image;
            unlink($imagePath);
            unlink($thumbnailPath);

            Brand::where('id', $id)->update([
                'name'  =>  $validatedData['name'],
                'image' =>  $validatedData['image']
            ]);
            toast()->success('Berhasil','Merk '.$request->name.' Berhasil Dirubah!');
            return redirect('/brands');
        }
        Brand::where('id', $id)->update([
            'name'  =>  $validatedData['name'],
        ]);
        toast()->success('Berhasil','Merk '.$request->name.' Berhasil Dirubah!');
        return redirect('/brands');
    }

    public function delete($id)
    {
        $brands = Brand::where('id', $id)->get();
        foreach($brands as $brand)
        // dd($category->Brand->count());
        if($brand->ItemModel->count() != 0)
        {
            toast()->error('Gagal!', 'Merk tidak bisa dihapus karena masih ada model didalamnya!');
            return redirect('/brands');
        }else{
        $image_path = 'img/brand-images/'.$brand->image;
        $thumbnail_path = 'img/thumbnail/'.$brand->image;
        unlink($image_path);
        unlink($thumbnail_path);
        Brand::where('id', $id)->delete();
        toast()->success('Berhasil!', 'Merk '.$brand->name.' Berhasil Dihapus!');
        return redirect('/brands');
        }
    }
}
