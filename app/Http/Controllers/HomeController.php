<?php

namespace App\Http\Controllers;

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
}
