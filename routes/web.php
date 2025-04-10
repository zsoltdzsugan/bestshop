<?php

use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale');

Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

require __DIR__.'/auth.php';
