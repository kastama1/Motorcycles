@extends('layouts.app')

@section('content')
    <div class="w-2/3 m-auto">
        <form action="{{ route('motorcycles.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-label value="Název:" />
                <x-input type="text" name="name" id="name" value="{{ old('name') }}" />
                <x-error for="name" />
            </div>
            <div class="mb-4">
                <x-label value="Text:" />
                <x-textarea name="text" id="text">{{ old('text') }}</x-textarea>
                <x-error for="text" />
            </div>
            <div class="mb-4">
                <x-label value="Cena:" />
                <x-input type="number" name="prize" id="prize" value="{{ old('prize') }}" />
                <x-error for="prize" />
            </div>
            <x-button>Přidat</x-button>
        </form>
    </div>
@endsection