<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;
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

Route::get('/produk/{id}', [ProdukController::class, 'show']);
Route::post('/produk/create/', [ProdukController::class, 'store']);
Route::put('produk/update/{id}', [ProdukController::class, 'update']);
Route::delete('produk/delete/{id}', [ProdukController::class, 'destroy']);
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/slider', [SliderController::class, 'index']);
Route::get('/setting', function () {
    return DB::table('settings')->get();
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
