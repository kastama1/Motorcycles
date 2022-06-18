@props(['disabled' => false, 'value' => ""])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full py-2 px-3 shadow appearance-none rounded-md shadow-sm border-gray-300 focus:border-black focus:outline-none focus:shadow-outline']) !!}>{{ $value }}</textarea>