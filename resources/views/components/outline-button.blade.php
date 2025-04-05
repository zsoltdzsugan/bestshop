@if($behaveAsLink())
    <a
        href="{{ $href }}"
        {{ $attributes->merge(['class' => $classes()]) }}
    >
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes->merge([
            'type' => 'button',
            'class' => $classes(),
            'disabled' => $disabled
        ]) }}
    >
        {{ $slot }}
    </button>
@endif
