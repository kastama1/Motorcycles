@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-gray-700 text-md font-bold mb-2']) }}>
    {{ $value ?? $slot }}
</label>
