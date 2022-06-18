@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-3 border-red-600 text-base font-medium text-gray-300 focus:outline-none focus:text-gray-300 focus:border-red-700 transition duration-150 ease-in-out'
            : 'block pl-3 pr-4 py-2 border-l-3 border-transparent text-base font-medium text-white hover:text-gray-300 hover:border-red-300 focus:bg-black focus:outline-none focus:text-gray-300 focus:border-red-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
