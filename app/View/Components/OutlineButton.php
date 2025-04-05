<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OutlineButton extends Component
{
    public string $variant;
    public bool $disabled;
    public ?string $href;
    public string $size;

    /**
     * Create a new component instance.
     */
    public function __construct(string $variant = 'primary', bool $disabled = false, ?string $href = null, ?string $size = 'md')
    {
        $this->variant = $variant;
        $this->disabled = $disabled;
        $this->href = $href;
        $this->size = $size;
    }

    public function variantClasses(): string
    {
        $variants = [
            'primary' => 'border-primary text-primary focus-visible:outline-primary dark:border-primary-dark dark:text-primary-dark dark:focus-visible:outline-primary-dark',
            'secondary' => 'border-secondary text-secondary focus-visible:outline-secondary dark:border-secondary-dark dark:text-secondary-dark dark:focus-visible:outline-secondary-dark',
            'alternate' => 'border-outline text-outline focus-visible:outline-outline dark:border-outline-dark dark:text-outline-dark dark:focus-visible:outline-outline-dark',
            'inverse' => 'border-surface-dark text-surface-dark focus-visible:outline-surface-dark dark:border-surface dark:text-surface dark:focus-visible:outline-surface',
            'info' => 'border-info text-info focus-visible:outline-info dark:border-info dark:text-info dark:focus-visible:outline-info',
            'danger' => 'border-danger text-danger focus-visible:outline-danger dark:border-danger dark:text-danger dark:focus-visible:outline-danger',
            'warning' => 'border-warning text-warning focus-visible:outline-warning dark:border-warning dark:text-warning dark:focus-visible:outline-warning',
            'success' => 'border-success text-success focus-visible:outline-success dark:border-success dark:text-success dark:focus-visible:outline-success',
        ];

        return $variants[$this->variant] ?? $variants['primary'];
    }

    public function sizeClasses(): string
    {
        $sizes = [
            'sm' => 'text-xs',
            'md' => 'text-sm',
            'lg' => 'text-base',
            'xl' => 'text-lg',
        ];

        return $sizes[$this->size] ?? $sizes['md'];
    }

    public function classes(): string
    {
        return $this->variantClasses(). ' ' . $this->sizeClasses() . ' inline-flex items-center justify-center gap-2 whitespace-nowrap px-4 py-2 text-center rounded-radius font-semibold uppercase tracking-widest shadow-sm  border transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed';
    }

    public function behaveAsLink(): bool
    {
        return $this->href !== null && !$this->disabled;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.outline-button');
    }
}
