@props(['for'])
@error($for)
<p {{ $attributes->merge(['class' => 'text-red-600 text-xs italic mt-2']) }}>{{ $message }}</p>
@enderror