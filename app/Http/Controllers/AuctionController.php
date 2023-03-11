<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function index()
    {
        $title = 'Daftar Lelang';
        return view('contents.auctions.index', compact('title'));
    }
}
