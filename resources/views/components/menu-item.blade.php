@props(['active' => false, 'href' => null])

@php
$classes = ($active)
            ? 'text-sm font-bold text-primary underline-offset-2 hover:text-primary/75 focus:outline-hidden focus:underline dark:text-primary-dark dark:hover:text-primary-dark/75 focus:underline focus:text-primary dark:focus:text-primary-dark active:text-primary dark:active:text-primary-dark'
            : 'text-sm font-medium text-secondary underline-offset-2 hover:text-primary focus:outline-hidden focus:underline dark:text-on-secondary-dark dark:hover:text-primary-dark';
@endphp

<li>
    <a href="{{ $href }}"
        {{ $attributes->merge(['class' => $classes]) }}
        @if($active) aria-current="page" @endif>
            {{ $slot }}
    </a>
</li>
