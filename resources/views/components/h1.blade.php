@props(['value'])

<h1 {{ $attributes->merge(['class' => 'text-3xl sm:text-6xl font-normal leading-normal mt-0 mb-2']) }}>
    {{ $value ?? $slot }}
</h1>