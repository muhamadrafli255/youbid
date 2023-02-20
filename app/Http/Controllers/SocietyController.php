<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocietyController extends Controller
{
    public function index()
    {
        $title = "Daftar Masyarakat";
        return view('contents.societies.index', compact('title'));
    }

    public function detail()
    {
        $title = "Detail Masyarakat";
        return view('contents.societies.detail', compact('title'));
    }

    public function create()
    {
        $title = "Tambah Masyarakat";
        return view('contents.societies.create', compact('title'));
    }
}
