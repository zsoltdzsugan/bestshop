<?php

use App\Http\Controllers\Backend\Vendor\ProfileController;
use App\Http\Controllers\Backend\Vendor\VendorController;
use App\Http\Controllers\Backend\Vendor\ShopController;
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

    });

Route::get('/vendor/login', [VendorController::class, 'login'])->name('vendor.login');
