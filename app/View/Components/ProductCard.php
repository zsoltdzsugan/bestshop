<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public string $variant;

    public ?string $href;

    /**
     * Create a new component instance.
     */
    public function __construct(string $variant = 'default', ?string $href = null)
    {
        $this->variant = $variant;
        $this->href = $href;
    }

    public function imageContainerClasses(): string
    {
        $variants = [
            'compact' => 'h-auto',
            'default' => 'h-44 md:h-auto',
        ];

        return $variants[$this->variant] ?? $variants['default'];
    }

    public function contentContainerClasses(): string
    {
        $variants = [
            'compact' => 'px-2',
            'default' => 'p-6 max-h-56 h-full',
        ];

        return $variants[$this->variant] ?? $variants['default'];
    }

    public function headerClasses(): string
    {
        $variants = [
            'compact' => 'my-4 flex-col',
            'default' => 'max-h-52 h-full gap-4 md:gap-12 md:flex-row',
        ];

        return $variants[$this->variant] ?? $variants['default'];
    }

    public function titleClasses(): string
    {
        $variants = [
            'compact' => 'text-sm lg:text-md',
            'default' => 'text-lg lg:text-xl font-bold ',
        ];

        return $variants[$this->variant] ?? $variants['default'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-card');
    }
}
