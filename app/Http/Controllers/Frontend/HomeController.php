<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $slides = config('slides.home');
        $products = config('products.products');

        return view('public.home.home', compact(['slides', 'products']));
    }
}
