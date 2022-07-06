@extends('layouts.app')

@section('content')
<div class="border-b-2 border-black">
    <h1>
        {{ $motorcycle->name }}
    </h1>
    <p>{{ $motorcycle->text }}</p>
    <p>{{ $motorcycle->prize }}</p>
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