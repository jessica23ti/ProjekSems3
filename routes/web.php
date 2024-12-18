<?php

use App\Http\Controllers\AdminController;
use App\Models\Produk;

use App\Models\Pemesanan;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProdukController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\PemesananController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::middleware(['auth'])->group(function () {
    // # email verfikasi noTICE rOUTE
    // Route::get('/email/verify', [AuthController::class, 'verifyEmail'])->name('verification.notice');

    // # email verfikasi
    // Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->middleware('signed')->name('verification.verify');
    // #resending email verfikasi
    // Route::post('/email/verification-notification', [AuthController::class, 'verifyHandler'])->middleware('throttle:6,1')->name('verification.send');
    Route::resource('/pemesanan', PemesananController::class);
    Route::resource('/produk', ProdukController::class);
    Route::get('/shop', [PemesananController::class, 'shop'])->name('shopCustomer');
    Route::get('/aboutUs', [PemesananController::class, 'AboutUs'])->name('AboutUsCustomer');
    Route::get('/ContactUs', [PemesananController::class, 'Contact'])->name('ContactCustomer');
    Route::get('/cart', [PemesananController::class, 'cart'])->name('cartCustomer');
    Route::resource('/AdminPage', AdminController::class);
    Route::resource('/Produk', ProdukController::class);
    Route::resource('/Kategori', CategoryController::class);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/login', [AuthController::class, 'showRegris'])->name('login');
Route::get('/Admin/login', [AuthController::class, 'showLoginAdmin'])->name('showLoginAdmin');
Route::post('/LogicRegrister', [AuthController::class, 'LogicRegrister'])->name('LogicRegrister');
Route::post('/Admin/logic', action: [AuthController::class, 'LogicLogin'])->name('LogicLogin');
