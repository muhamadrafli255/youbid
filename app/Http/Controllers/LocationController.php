<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $title = "Daftar Lokasi";
        return view('contents.location.index', compact('title'));
    }

    public function create()
    {
        $title = "Tambah Lokasi";
        return view('contents.location.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'  =>  'required',
            'full_address'  =>  'required'
        ]);

        Location::create($validatedData);
        toast()->success('Berhasil!', 'Lokasi '.$request->name.' Berhasil Ditambahkan!');
        return redirect('/location');
    }

    public function edit($id)
    {
        $title = "Ubah Lokasi";
        $locations  =   Location::where('id', $id)->get();
        return view('contents.location.edit', compact('title', 'locations'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'  =>  'required',
            'full_address'  =>  'required',
        ]);

        Location::where('id', $id)->update($validatedData);
        toast()->success('Berhasil!', 'Lokasi '.$request->name.' Berhasil Dirubah!');
        return redirect('/location');
    }

    public function delete($id)
    {
        $locations = Location::where('id', $id)->get();
        Location::where('id', $id)->delete();
        foreach($locations as $location)
        toast()->success('Berhasil!', 'Lokasi '.$location->name.' Berhasil Dihapus!');
        return redirect('/location');
    }
}
