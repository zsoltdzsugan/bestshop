@props(['href' => null])

@php
    $classes = 'inline-flex items-center px-4 py-2 bg-secondary dark:bg-secondary-dark border border-outline dark:border-outline-dark rounded-radius font-semibold text-xs text-on-secondary dark:text-on-secondary-dark uppercase tracking-widest shadow-sm hover:bg-surface-alt dark:hover:bg-surface-dark-alt hover:border-secondary dark:hover:border-secondary-dark focus:outline-none focus:ring-1 focus:ring-primary focus:ring-offset-1 focus:ring-offset-primary dark:focus:ring-offset-primary-dark disabled:opacity-25 transition ease-in-out duration-150';
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
