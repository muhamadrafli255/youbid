<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LotController;
use App\Http\Controllers\MultiplePrice;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemModelController;
use App\Http\Controllers\TicketPriceController;
use App\Http\Controllers\MultiplePriceController;
use App\Http\Controllers\PaymentCallbackController;
use App\Http\Middleware\VerifyCsrfToken;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::post('/getcities', [AddressController::class, 'getCities']);
Route::post('/getdistricts', [AddressController::class, 'getDistricts']);
Route::post('/getsubdistricts', [AddressController::class, 'getSubDistricts']);
Route::post('/getmodel', [HomeController::class, 'getModel']);

Route::prefix('auction')->group(function()
{
    Route::get('/cars', [HomeController::class, 'getCars']);
    Route::get('/moto', [HomeController::class, 'getMoto']);
});
/*
|--------------------------------------------------------------------------
| Route Middleware Guest
|--------------------------------------------------------------------------
*/
Route::group([
    'namespace'     => 'App',
    'middleware'    => ['guest'],
], function()
{
    Route::prefix('register')->group(function()
    {
        Route::get('/', [AuthController::class, 'register']);
        Route::post('/', [AuthController::class, 'store']);
    });

    Route::prefix('login')->group(function()
    {
        Route::get('/', [AuthController::class, 'login'])->name('login');
        Route::post('/', [AuthController::class, 'authenticate']);
    });

    Route::prefix('forgot-password')->group(function()
    {
        Route::get('/', [AuthController::class, 'forgotPassword']);
        Route::post('/', [AuthController::class, 'mailReset']);
    });

    Route::prefix('create-password')->group(function()
    {
        Route::get('/{token}', [AuthController::class, 'resetPassword']);
        Route::post('/{token}', [AuthController::class, 'changePassword']);
    });
});

Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/complete-data', [AuthController::class, 'completeData'])->middleware('auth');
Route::post('/complete-data', [AuthController::class, 'sendCompleteData'])->middleware('auth');
/*
|--------------------------------------------------------------------------
| Route Middleware Auth
|--------------------------------------------------------------------------
*/

Route::group([
    'namespace'     =>  'App',
    'middleware'    =>  ['guest'],
], function(){
    Route::prefix('activation')->group(function(){
        Route::get('/{token}', [AuthController::class, 'activation']);
        Route::post('/{token}', [AuthController::class, 'activate']);
    });
});

Route::group([
    'namespace'     =>  'App',
    'middleware'    =>  ['auth', 'unverified'],
], function(){
        Route::get('/resend-activation', [AuthController::class, 'resendActivation']);
        Route::post('/resend-activation', [AuthController::class, 'newActivation']);
});

Route::group([
    'namespace'     =>  'App',
    'middleware'    =>  ['auth', 'verified'],
], function()
{
    Route::prefix('buyticket')->group(function(){
        Route::get('/', [TicketController::class, 'index']);
        // Route::get('/{name}', [TicketController::class, 'mobil']);
        Route::get('/transaction', [TicketController::class, 'history']);
        Route::get('/transaction/{id}', [TicketController::class, 'show']);
        Route::get('/{id}', [TicketController::class, 'review']);
        Route::post('/{id}', [TicketController::class, 'store']);
    });

});

Route::group([
    'namespace'     =>  'App',
    'middleware'    =>  ['auth', 'verified', 'role:admin|officer'],
], function()
{
    Route::prefix('dashboard')->group(function(){
        Route::get('/', [DashboardController::class, 'index']);
    });

    Route::prefix('societies')->group(function(){
        Route::get('/', [SocietyController::class, 'index']);
        Route::get('/create', [SocietyController::class, 'create']); 
        Route::post('/create', [SocietyController::class, 'store']); 
        Route::get('/{uuid}', [SocietyController::class, 'detail']);
        Route::get('/{uuid}/edit', [SocietyController::class, 'edit']);
        Route::post('/{uuid}/edit', [SocietyController::class, 'update']);
        Route::get('/{uuid}/delete', [SocietyController::class, 'delete']);
        Route::get('/{uuid}/verify', [SocietyController::class, 'verify']);
    });

    Route::prefix('categories')->group(function(){
        Route::get('/', [CategoryController::class, 'index']);
        Route::get('/create', [CategoryController::class, 'create']);
        Route::post('/create', [CategoryController::class, 'store']);
        Route::get('/{id}/brands', [CategoryController::class, 'detail']);
        Route::get('/{id}/edit', [CategoryController::class, 'edit']);
        Route::put('/{id}/edit', [CategoryController::class, 'update']);
        Route::get('/{id}/delete', [CategoryController::class, 'delete']);
    }); 

    Route::prefix('brands')->group(function(){
        Route::get('/', [BrandController::class, 'index']);
        Route::get('/create', [BrandController::class, 'create']);
        Route::post('/create', [BrandController::class, 'store']);
        Route::get('/{id}/models', [BrandController::class, 'detail']);
        Route::get('/{id}/edit', [BrandController::class, 'edit']);
        Route::put('/{id}/edit', [BrandController::class, 'update']);
        Route::get('/{id}/delete', [BrandController::class, 'delete']);
    });

    Route::prefix('models')->group(function(){
        Route::get('/', [ItemModelController::class, 'index']);
        Route::get('/create', [ItemModelController::class, 'create']);
        Route::post('/create', [ItemModelController::class, 'store']);
        Route::get('/{id}/models', [ItemModelController::class, 'detail']);
        Route::get('/{id}/edit', [ItemModelController::class, 'edit']);
        Route::put('/{id}/edit', [ItemModelController::class, 'update']);
        Route::get('/{id}/delete', [ItemModelController::class, 'delete']);
    });

    Route::prefix('items')->group(function(){
        Route::get('/', [ItemController::class, 'index']);
        Route::get('/create', [ItemController::class, 'create']);
        Route::post('/create', [ItemController::class, 'store']);
        Route::get('/{id}', [ItemController::class, 'detail']);
        Route::get('/{id}/edit', [ItemController::class, 'edit']);
        Route::put('/{id}/edit', [ItemController::class, 'update']);
        Route::get('/{id}/delete', [ItemController::class, 'delete']);
    });

    Route::prefix('lots')->group(function(){
        Route::get('/', [LotController::class, 'index']);
        Route::get('/create', [LotController::class, 'create']);
        Route::post('/create', [LotController::class, 'store']);
        Route::get('/{id}', [LotController::class, 'detail']);
        Route::get('/{id}/edit', [LotController::class, 'edit']);
        Route::put('/{id}/edit', [LotController::class, 'update']);
        Route::get('/{id}/delete', [LotController::class, 'delete']);
    });

    Route::prefix('multipleprice')->group(function(){
        Route::get('/', [MultiplePriceController::class, 'index']);
        Route::get('/create', [MultiplePriceController::class, 'create']);
        Route::post('/create', [MultiplePriceController::class, 'store']);
        Route::get('/{id}', [MultiplePriceController::class, 'detail']);
        Route::get('/{id}/edit', [MultiplePriceController::class, 'edit']);
        Route::put('/{id}/edit', [MultiplePriceController::class, 'update']);
        Route::get('/{id}/delete', [MultiplePriceController::class, 'delete']);
    });

    Route::prefix('ticketprice')->group(function(){
        Route::get('/', [TicketPriceController::class, 'index']);
        Route::get('/create', [TicketPriceController::class, 'create']);
        Route::post('/create', [TicketPriceController::class, 'store']);
        Route::get('/{id}', [TicketPriceController::class, 'detail']);
        Route::get('/{id}/edit', [TicketPriceController::class, 'edit']);
        Route::put('/{id}/edit', [TicketPriceController::class, 'update']);
        Route::get('/{id}/delete', [TicketPriceController::class, 'delete']);
    });

    Route::prefix('auctions')->group(function(){
        Route::get('/', [AuctionController::class, 'index']);
        Route::get('/create', [AuctionController::class, 'create']);
        Route::post('/create', [AuctionController::class, 'store']);
        Route::get('/{id}', [AuctionController::class, 'detail']);
        Route::get('/{id}/edit', [AuctionController::class, 'edit']);
        Route::put('/{id}/edit', [AuctionController::class, 'update']);
        Route::get('/{id}/delete', [AuctionController::class, 'delete']);
    });
});

Route::group([
    'namespace'     =>  'App',
    'middleware'    =>  ['auth', 'verified', 'role:admin'],
], function()
{
    Route::prefix('officers')->group(function(){
        Route::get('/', [OfficerController::class, 'index']);
        Route::get('/create', [OfficerController::class, 'create']); 
        Route::post('/create', [OfficerController::class, 'store']); 
        Route::get('/{uuid}', [OfficerController::class, 'detail']);
        Route::get('/{uuid}/edit', [OfficerController::class, 'edit']);
        Route::post('/{uuid}/edit', [OfficerController::class, 'update']);
        Route::get('/{uuid}/delete', [OfficerController::class, 'delete']);
        Route::get('/{uuid}/verify', [OfficerController::class, 'verify']);
    });
});    