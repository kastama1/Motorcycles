@extends('layouts.app')

@section('content')
<x-h1>{{ trans('motorcycle.heading') }}</x-h1>
<div class="grid grid-cols-10">
    @foreach ($motorcycles as $key => $motorcycle)
    <div class="col-span-5 bg-white shadow-xl m-3">
        <h1 class="mb-1 mt-5 text-center">
            <x-link class="text-4xl" href="{{ route('motorcycles.show', $motorcycle->id) }}">
                {{ $motorcycle->name }}
            </x-link>
        </h1>
        @if ($motorcycle->images)
        <a class="my-2" href="{{ route('motorcycles.show', $motorcycle->id) }}">
            <div class="w-4/5 m-auto">
                <img src="{{ asset('storage/' . $motorcycle->images[0]) }}" alt="">
            </div>
        </a>
        @endif
        <x-p class="mx-5 text-center">Cena: {{ $motorcycle->prize }} Kč</x-p>
    </div>
    @endforeach
</div>
@if (Auth::check())
<div class="relative">
    <x-link class="absolute right-0" href="{{ route('motorcycles.create') }}">Přidat motocykl</x-link>
</div>
@endif
@endsection