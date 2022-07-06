@extends('layouts.app')

@section('content')
<x-h1>{{ $motorcycle->name }}</x-h1>
<div class="border-b-2 border-black">
    <x-p>{{ $motorcycle->text }}</x-p>
    <x-p>{{ $motorcycle->prize }}</x-p>
    @if (Auth::check())
    <a href="{{ route('motorcycles.edit', $motorcycle->id) }}">Upravit motocykl</a>
    <form action="{{ route('motorcycles.destroy', $motorcycle->id) }}" method="POST">
        @csrf
        @method('delete')
        <button>Smazat motocykl</button>
    </form>
    @endif
</div>
@endsection