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
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/slider', [SliderController::class, 'index']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
