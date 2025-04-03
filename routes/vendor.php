<?php

use App\Http\Controllers\Backend\Vendor\Product\ImageGalleryController;
use App\Http\Controllers\Backend\Vendor\Product\VariantController;
use App\Http\Controllers\Backend\Vendor\Product\VariantItemController;
use App\Http\Controllers\Backend\Vendor\ProductController;
use App\Http\Controllers\Backend\Vendor\ProfileController;
use App\Http\Controllers\Backend\Vendor\ShopController;
use App\Http\Controllers\Backend\Vendor\VendorController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:vendor'])
    ->prefix('vendor')
    ->as('vendor.')
    ->group(function () {
        Route::get('/dashboard', [VendorController::class, 'dashboard'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'delete'])->name('profile.destroy');

        Route::resource('/shop', ShopController::class);

        Route::resource('/product', ProductController::class);

        Route::resource('/product.images', ImageGalleryController::class)
            ->parameters(['images' => 'image'])
            ->scoped(['image' => 'id']);

        Route::resource('/product.variants', VariantController::class)
            ->parameters(['variants' => 'variant'])
            ->scoped(['variant' => 'id']);

        Route::resource('/product.variants.items', VariantItemController::class)
            ->parameters(['variants' => 'variant', 'items' => 'item'])
            ->scoped(['variant' => 'id', 'item' => 'id']);
    });

Route::get('/vendor/login', [VendorController::class, 'login'])->name('vendor.login');
