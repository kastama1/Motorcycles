@extends('layouts.app')

@section('content')
    <div>
        <form action="{{ route('motorcycles.store') }}" method="POST">
            @csrf
            <div>
                <label for="">Název:</label>            
                <x-input type="text" name="name" value="{{ old('name') }}"></x-input>
                <x-error for="name" />
            </div>
            <div>
                <label for="">Text:</label>
                <textarea name="text">{{ old('text') }}</textarea>
                <x-error for="text" />
            </div>
            <div>
                <label for="">Cena:</label>
                <x-input type="number" name="prize" value="{{ old('prize') }}"></x-input>
                <x-error for="prize" />
            </div>
            <x-button>Přidat</x-button>
        </form>
    </div>
@endsection