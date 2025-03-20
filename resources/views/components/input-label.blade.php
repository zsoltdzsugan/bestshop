@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-on-surface dark:text-on-surface-dark']) }}>
    {{ $value ?? $slot }}
</label>
