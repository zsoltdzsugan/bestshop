@props(['href' => null])

@php
    $classes = 'inline-flex items-center px-4 py-2 bg-info border border-outline dark:border-outline-dark rounded-radius font-semibold text-xs text-on-info uppercase tracking-widest shadow-sm hover:bg-secondary dark:hover:bg-secondary-alt hover:border-info dark:hover:border-info focus:outline-none focus:ring-1 focus:ring-info focus:ring-offset-1 focus:ring-offset-info dark:focus:ring-offset-info disabled:opacity-25 transition ease-in-out duration-150';
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'button', 'class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
