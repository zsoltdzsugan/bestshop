<?php

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\BrandController;
use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\ChildCategoryController;
use App\Http\Controllers\Backend\Admin\ProductController;
use App\Http\Controllers\Backend\Admin\ProfileController;
use App\Http\Controllers\Backend\Admin\SliderController;
use App\Http\Controllers\Backend\Admin\SubCategoryController;
use App\Http\Controllers\Backend\Admin\UserController;
use App\Http\Controllers\Backend\Admin\ShopController;
use App\Http\Controllers\Backend\Product\ImageGalleryController;
use App\Http\Controllers\Backend\Product\VariantController;
use App\Http\Controllers\Backend\Product\VariantItemController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'delete'])->name('profile.destroy');

        Route::resource('/user', UserController::class);

        Route::resource('/slider', SliderController::class);

        Route::resource('/category', CategoryController::class);
        Route::get('/get-subcategory/{categoryId}', [SubCategoryController::class, 'getSubCategories'])->name('get-subcategories');
        Route::resource('/sub-category', SubCategoryController::class);
        Route::get('/get-childcategory/{subcategoryId}', [ChildCategoryController::class, 'getChildCategories'])->name('get-childcategories');
        Route::resource('/child-category', ChildCategoryController::class);

        Route::resource('/brand', BrandController::class);

        Route::resource('/product', ProductController::class);

        Route::resource('/shop', ShopController::class);

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

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
