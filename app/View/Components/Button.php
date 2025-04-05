<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public string $variant;
    public bool $disabled;
    public ?string $href;
    public string $size;

    /**
     * Create a new component instance.
     */
    public function __construct(string $variant = 'primary', bool $disabled = false, ?string $href = null, ?string $size = 'sm')
    {
        $this->variant = $variant;
        $this->disabled = $disabled;
        $this->href = $href;
        $this->size = $size;
    }

    public function variantClasses(): string
    {
        $variants = [
            'primary' => 'bg-primary border-primary text-on-primary focus-visible:outline-primary dark:bg-primary-dark dark:border-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark',
            'secondary' => 'bg-secondary border-secondary text-on-secondary focus-visible:outline-secondary dark:bg-secondary-dark dark:border-secondary-dark dark:text-on-secondary-dark dark:focus-visible:outline-secondary-dark',
            'alternate' => 'bg-surface-alt border-surface-alt text-on-surface-strong focus-visible:outline-surface-alt dark:bg-surface-dark-alt dark:border-surface-dark-alt dark:text-on-surface-dark-strong dark:focus-visible:outline-surface-dark-alt',
            'inverse' => 'bg-surface-dark border-surface-dark text-on-surface-dark focus-visible:outline-surface-dark dark:bg-surface dark:border-surface dark:text-on-surface dark:focus-visible:outline-surface',
            'info' => 'bg-info border-info text-on-info focus-visible:outline-info dark:bg-info dark:border-info dark:text-on-info dark:focus-visible:outline-info',
            'danger' => 'bg-danger border-danger text-on-danger focus-visible:outline-danger dark:bg-danger dark:border-danger dark:text-on-danger dark:focus-visible:outline-danger',
            'warning' => 'bg-warning border-warning text-on-warning focus-visible:outline-warning dark:bg-warning dark:border-warning dark:text-on-warning dark:focus-visible:outline-warning',
            'success' => 'bg-success border-success text-on-success focus-visible:outline-success dark:bg-success dark:border-success dark:text-on-success dark:focus-visible:outline-success',
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

        return $sizes[$this->size] ?? $sizes['sm'];
    }

    public function classes(): string
    {
        return $this->variantClasses() . ' ' . $this->sizeClasses() . ' inline-flex items-center justify-center gap-2 whitespace-nowrap px-4 py-2 text-center rounded-radius font-semibold uppercase tracking-widest shadow-sm  border transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed';
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
        return view('components.button');
    }
}
