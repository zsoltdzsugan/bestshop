<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function show(string $slug): View
    {
        $product = Product::with(['images' => function ($query) {
            $query->orderBy('id', 'desc');
        }])->where('slug', $slug)->firstOrFail();

        return view('public.product.index', compact('product'));
    }
}
