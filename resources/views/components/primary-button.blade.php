@props(['href' => null])

@php
    $classes = 'inline-flex items-center justify-center gap-2 whitespace-nowrap px-4 py-2 text-center rounded-radius font-semibold text-xs uppercase tracking-widest shadow-sm bg-primary text-on-primary transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 dark:bg-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark transition ease-in-out duration-150 cursor-pointer';
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
