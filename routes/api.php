<?php

use App\Http\Controllers\Backend\Category\ChildCategoryController;
use App\Http\Controllers\Backend\Category\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin,vendor'])
    ->prefix('api')
    ->as('api.')
    ->group(function () {
        Route::get('/get-subcategories/{categoryId}', [SubCategoryController::class, 'getSubcategories'])->name('get-subcategories');
        Route::get('/get-childcategories/{subcategoryId}', [ChildCategoryController::class, 'getChildcategories'])->name('get-childcategories');
    });

require __DIR__.'/auth.php';
