@extends('layouts.app')

@section('content')
<x-h1>Motocykly</x-h1>
@foreach ($motorcycles as $motorcycle)
<div class="border-b-2 border-black">
    <div class="relative">
        <h1 class="mb-1 mt-5">
            <x-link class="text-4xl" href="{{ route('motorcycles.show', $motorcycle->id) }}">
                {{ $motorcycle->name }}
            </x-link>
        </h1>
        @if (Auth::check())
        <div class="absolute right-0 top-0">
            <x-link href="{{ route('motorcycles.edit', $motorcycle->id) }}">Upravit motocykl</x-link>
            <form action="{{ route('motorcycles.destroy', $motorcycle->id) }}" method="POST">
                @csrf
                @method('delete')
                <button
                    class="px-1 pt-1 text-md font-medium leading-5 text-black hover:text-gray-500 hover:underline focus:outline-none transition duration-150 ease-in-out">Smazat
                    motocykl</button>
            </form>
        </div>
        @endif
    </div>
    <x-p class="text-lg">{{ $motorcycle->text }}</x-p>
    <x-p>{{ $motorcycle->prize }} Kč</x-p>
</div>

@endforeach

@if (Auth::check())
<div class="relative">
    <x-link class="absolute right-0" href="{{ route('motorcycles.create') }}">Přidat motocykl</x-link>
</div>
@endif

@endsection