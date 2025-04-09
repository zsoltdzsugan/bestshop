<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FlashSaleController extends Controller
{
    public function index(): View
    {
        $flashSaleEnd = FlashSale::first();
        $flashSaleProducts = Product::whereHas('flashitems', function ($query) {
            $query->where('status', 1);
        })->paginate(18);

        return view('public.flash-sale.index', compact('flashSaleEnd', 'flashSaleProducts'));
    }
}
