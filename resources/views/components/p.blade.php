@props(['value'])

<p {{ $attributes->merge(['class' => 'text-base font-light leading-relaxed mt-0 mb-4']) }}>
    {{ $value ?? $slot }}
</p>