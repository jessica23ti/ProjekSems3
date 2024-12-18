<?php

use App\Models\Member;
use App\Models\Produk;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PemesananController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::resource('pemesanan', PemesananController::class);
Route::resource('kategori', CategoryController::class);
// Route::resource('Produk', controller: ProdukController::class);
// Route::resource('member', MemberController::class);
