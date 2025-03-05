<?php

use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'role:vendor'])
    ->prefix('vendor')
    ->as('vendor.')
    ->group(function () {
        Route::get('/dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
    });
