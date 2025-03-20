<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\SubCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PublicLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $categories = Category::with([
            'subCategories' => function ($query) {
                $query->where('status', 1);
            },
            'subCategories.childCategories' => function ($query) {
                $query->where('status', 1);
            }
        ])->get();

        return view('layouts.public', compact('categories'));
    }
}
