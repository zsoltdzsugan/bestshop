<?php

use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

        Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [UserProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [UserProfileController::class, 'delete'])->name('profile.destroy');
    });

Route::get('/login', [UserController::class, 'login'])->name('login');
