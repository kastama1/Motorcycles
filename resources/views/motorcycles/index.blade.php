@extends('layouts.app')

@section('content')
@foreach ($motorcycles as $motorcycle)
    <div class="border-b-2 border-black">
        <h1>
            <x-link class="text-xl" href="{{ route('motorcycles.show', $motorcycle->id) }}">
                {{ $motorcycle->name }}
            </x-link>
        </h1>
        <p>{{ $motorcycle->text }}</p>
        <p>{{ $motorcycle->prize }}</p>
        <x-link href="{{ route('motorcycles.edit', $motorcycle->id) }}">Upravit motocykl</x-link>
        <form action="{{ route('motorcycles.destroy', $motorcycle->id) }}" method="POST">
        @csrf
        @method('delete')
        <button class="px-1 pt-1 text-md font-medium leading-5 text-black hover:text-gray-500 hover:underline focus:outline-none transition duration-150 ease-in-out">Smazat motocykl</button>
        </form>
    </div>    
@endforeach
    <x-link href="{{ route('motorcycles.create') }}">Přidat motocykl</x-link>
@endsection