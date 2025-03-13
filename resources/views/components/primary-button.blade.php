@props(['href' => null])

@php
    $classes = 'inline-flex items-center px-4 py-2 bg-primary dark:bg-primary-dark border border-outline dark:border-outline-dark rounded-radius font-semibold text-xs text-on-primary dark:text-on-primary-dark uppercase tracking-widest hover:bg-surface dark:hover:bg-surface-dark hover:text-primary dark:hover:text-primary-dark hover:border-primary dark:hover:border-primary-dark focus:bg-surface dark:focus:bg-surface-dark focus:text-primary dark:focus:text-primary-dark focus:border-primary dark:focus:border-primary-dark active:bg-surface dark:active:bg-surface-dark active:text-primary dark:active:text-primary-dark active:border-primary dark:active:border-primary-dark focus:outline-none focus:ring-1 focus:ring-primary focus:ring-offset-1 focus:ring-offset-primary dark:focus:ring-offset-primary-dark transition ease-in-out duration-150';
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
