@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-3 border-red-600 text-sm font-medium leading-5 text-gray-300 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-3 border-transparent text-sm font-medium leading-5 text-white hover:text-white hover:border-gray-300 focus:outline-none focus:text-white focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>