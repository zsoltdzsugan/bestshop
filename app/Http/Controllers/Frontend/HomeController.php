<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FlashSale;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $sliders = Slider::where('status', 1)->orderBy('serial', 'asc')->get();
        $products = config('products.products');
        $flashSaleEnd = FlashSale::first();
        $flashSaleProducts = Product::whereHas('flashitems', function ($query) {
            $query->where('is_featured', 1)
                ->where('status', 1);
        })->get();

        $categories = Category::all();

        return view(
            'public.home.index',
            compact(
                [
                    'sliders',
                    'products',
                    'flashSaleEnd',
                    'flashSaleProducts',
                ]
            )
        );
    }
}
