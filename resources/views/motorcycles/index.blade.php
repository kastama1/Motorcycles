@extends('layouts.app')

@section('content')
@foreach ($motorcycles as $motorcycle)
    <div class="border-b-2 border-black">
        <div class="relative">
            <h1>
                <x-link class="text-4xl" href="{{ route('motorcycles.show', $motorcycle->id) }}">
                    {{ $motorcycle->name }}
                </x-link>
            </h1>
            <div class="absolute right-0 top-0">
                <x-link href="{{ route('motorcycles.edit', $motorcycle->id) }}">Upravit motocykl</x-link>
                <form action="{{ route('motorcycles.destroy', $motorcycle->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="px-1 pt-1 text-md font-medium leading-5 text-black hover:text-gray-500 hover:underline focus:outline-none transition duration-150 ease-in-out">Smazat motocykl</button>
                </form>
            </div>
        </div>
        <p class="py-4 text-lg">{{ $motorcycle->text }}</p>
        <p>{{ $motorcycle->prize }} Kč</p>
        
@endforeach
<div class="relative">
    <x-link class="absolute right-0" href="{{ route('motorcycles.create') }}">Přidat motocykl</x-link>
</div>

@endsection