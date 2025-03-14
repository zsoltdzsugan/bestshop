@props(['href' => null])

@php
    $classes = 'inline-flex items-center justify-center gap-2 whitespace-nowrap px-4 py-2 text-center rounded-radius font-semibold text-xs uppercase tracking-widest shadow-sm bg-secondary text-on-secondary transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-secondary active:opacity-100 active:outline-offset-0 dark:bg-secondary-dark dark:text-on-secondary-dark dark:focus-visible:outline-secondary-dark transition ease-in-out duration-150 cursor-pointer';
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
