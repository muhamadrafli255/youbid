<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index()
    {
        $title = "Daftar Kategori";
        return view('contents.categories.index', compact('title'));
    }

    public function create()
    {
        $title = "Tambah Kategori";
        return view('contents.categories.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'  =>  'required',
            'image' =>  'required|file|max:5120',
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
    
            $destinationPath = public_path('/img/category-images');
            $image->move($destinationPath, $validatedData['image']);

            Category::create([
                'name'  =>  $validatedData['name'],
                'image' =>  $validatedData['image']
            ]);
            toast()->success('Berhasil','Kategori '.$request->name.' Berhasil Ditambahkan!');
            return redirect('/categories');
        }
        return back();
    }

    public function detail($id)
    {
        $title = "Detail Kategori";
        $categories = Category::where('id', $id)->get();
        return view('contents.categories.detail', compact('title', 'categories'));
    }

    public function edit($id)
    {
        $title = "Ubah Kategori";
        $categories = Category::where('id', $id)->get();
        return view('contents.categories.edit', compact('title', 'categories'));
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
    
            $destinationPath = public_path('/img/category-images');
            $image->move($destinationPath, $validatedData['image']);

            Category::where('id', $id)->update([
                'name'  =>  $validatedData['name'],
                'image' =>  $validatedData['image']
            ]);
            toast()->success('Berhasil','Kategori '.$request->name.' Berhasil Dirubah!');
            return redirect('/categories');
        }
        Category::where('id', $id)->update([
            'name'  =>  $validatedData['name'],
        ]);
        toast()->success('Berhasil','Kategori '.$request->name.' Berhasil Dirubah!');
        return redirect('/categories');
    }

    public function delete($id)
    {
        $categories = Category::where('id', $id)->get();
        foreach($categories as $category)
        // dd($category->Brand->count());
        if($category->Brand->count() != 0)
        {
            toast()->error('Gagal!', 'Kategori tidak bisa dihapus karena masih ada merk didalamnya!');
            return redirect('/categories');
        }else{
        $image_path = 'img/category-images/'.$category->image;
        $thumbnail_path = 'img/thumbnail/'.$category->image;
        unlink($image_path);
        unlink($thumbnail_path);
        Category::where('id', $id)->delete();
        toast()->success('Berhasil!', 'Kategori '.$category->name.' Berhasil Dihapus!');
        return redirect('/categories');
        }
    }
}
