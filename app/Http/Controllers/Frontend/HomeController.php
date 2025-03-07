<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $slides = [
            [
                'imgSrc' => 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-1.webp',
                'imgAlt' => 'Vibrant abstract painting with swirling blue and light pink hues on a canvas.',
                'title' => 'New Arrivals',
                'description' => 'Men\'s Fashion',
                'subtitle' => 'Starts At $99.0',
                'ctaUrl' => 'https://example.com',
                'ctaText' => 'Shop Now',
            ],
            [
                'imgSrc' => 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-2.webp',
                'imgAlt' => 'Vibrant abstract painting with swirling red, yellow, and pink hues on a canvas.',
                'title' => 'New Arrivals',
                'description' => 'Women\'s Fashion',
                'subtitle' => 'Starts At $99.0',
                'ctaUrl' => 'https://example.com',
                'ctaText' => 'Shop Now',
            ],
            [
                'imgSrc' => 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-3.webp',
                'imgAlt' => 'Vibrant abstract painting with swirling blue and purple hues on a canvas.',
                'title' => 'New Arrivals',
                'description' => 'Kid\'s Fashion',
                'subtitle' => 'Starts At $99.0',
                'ctaUrl' => 'https://example.com',
                'ctaText' => 'Shop Now',
            ],
        ];

        return view('public.home.home', compact('slides'));
    }
}
