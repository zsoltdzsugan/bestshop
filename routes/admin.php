<?php

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\ProfileController;
use App\Http\Controllers\Backend\Admin\BrandController;
use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\ChildCategoryController;
use App\Http\Controllers\Backend\Admin\SliderController;
use App\Http\Controllers\Backend\Admin\SubCategoryController;
use App\Http\Controllers\Backend\Admin\VendorController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'delete'])->name('profile.destroy');

        Route::resource('/slider', SliderController::class);

        Route::resource('/category', CategoryController::class);
        Route::resource('/sub-category', SubCategoryController::class);
        Route::get('/get-subcategory', [ChildCategoryController::class, 'getSubCategories'])->name('get-subcategories');
        Route::resource('/child-category', ChildCategoryController::class);

        Route::resource('/brand', BrandController::class);

        Route::resource('/vendor', VendorController::class);
    });

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
