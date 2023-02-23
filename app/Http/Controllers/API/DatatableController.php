<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use FFI;
use Yajra\DataTables\Contracts\DataTable;

class DatatableController extends Controller
{
    public function getSocieties(Request $request)
    {
        $data = \App\Models\User::getSocieties($request->query());
        return DataTables::of($data)->make(true);
    }

    public function getCategories(Request $request)
    {
        $data = \App\Models\Category::getCategories($request->query());
        return DataTables::of($data)->addColumn('quantity_brand', function($data){
            return $data->Brand->count();
        })->make(true);
    }

    public function getBrandOnCategories(Request $request)
    {
        $data = \App\Models\Brand::getBrandOnCategories($request->query());
        return DataTables::of($data)->addColumn('quantity_model', function($data){
            return $data->ItemModel->count();
        })->make(true);
    }

    public function getBrand(Request $request)
    {
        $data = \App\Models\Brand::getBrand($request->query());
        return DataTables::of($data)->addColumn('quantity_model', function($data){
            return $data->ItemModel->count();
        })->make(true);
    }
}