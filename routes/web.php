<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('home');
});

Route::post('/getcities', [AddressController::class, 'getCities']);
Route::post('/getdistricts', [AddressController::class, 'getDistricts']);
Route::post('/getsubdistricts', [AddressController::class, 'getSubDistricts']);

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

    Route::prefix('reset-password')->group(function()
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
});

Route::group([
    'namespace'     =>  'App',
    'middleware'    =>  ['auth', 'verified'],
], function()
{
    Route::prefix('dashboard')->group(function(){
        Route::get('/', [DashboardController::class, 'index']);
    });

    Route::prefix('societies')->group(function(){
        Route::get('/', [SocietyController::class, 'index']);
        Route::get('/create', [SocietyController::class, 'create']); 
        Route::get('/{id}', [SocietyController::class, 'detail']);
    });
});