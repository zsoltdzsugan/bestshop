<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $sliders = Slider::where('status', 1)->orderBy('serial', 'asc')->get();
        $products = config('products.products');

        $categories = Category::all();

        return view(
            'public.home.home',
            compact(
                [
                    'sliders',
                    'products',
                ]
            )
        );
    }
}
