@extends('layouts.app')

@section('content')
<x-h1>Upravit motocykl</x-h1>
<div class="w-2/3 m-auto">
    <form action="{{ route('motorcycles.update', $motorcycle->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-4">
            <x-label value="Název:" />
            <x-input type="text" name="name" id="name" value="{{ (old('name')) ? old('name') : $motorcycle->name }}" />
            <x-error for="name" />
        </div>
        <div class="mb-4">
            <x-label value="Text:" />
            <x-textarea name="text" id="text" value="{{ (old('text')) ? old('text') : $motorcycle->text }}" />
            <x-error for="text" />
        </div>
        <div class="mb-4">
            <x-label value="Cena:" />
            <x-input type="number" name="prize" id="prize"
                value="{{ (old('prize')) ? old('prize') : $motorcycle->prize }}" />
            <x-error for="prize" />
        </div>
        <x-button>Upravit</x-button>
    </form>
</div>
@endsection