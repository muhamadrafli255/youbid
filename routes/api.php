<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DatatableController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace' => 'API',
], function(){
    Route::group([
        'prefix' => 'datatables',
    ], function(){
        Route::get('/societies', [DatatableController::class, 'getSocieties']);
        Route::get('/officers', [DatatableController::class, 'getOfficers']);
        Route::get('/categories', [DatatableController::class, 'getCategories']);
        Route::get('/brands', [DatatableController::class, 'getbrand']);
        Route::get('/brands/categories', [DatatableController::class, 'getBrandOnCategories']);
        Route::get('/models/brands', [DatatableController::class, 'getModelsOnBrands']);
        Route::get('/models', [DatatableController::class, 'getModels']);
        Route::get('/items', [DatatableController::class, 'getItems']);
    });
});
