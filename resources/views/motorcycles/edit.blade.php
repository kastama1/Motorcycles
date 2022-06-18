@extends('layouts.app')

@section('content')
    <div>
        <form action="{{ route('motorcycles.update', $motorcycle->id) }}" method="POST">
            @csrf
            @method('put')
            <div>
                <label for="">Název:</label>            
                <x-input type="text" name="name" value="{{ (old('name')) ? old('name') : $motorcycle->name }}"></x-input>
                <x-error for="name" />
            </div>
            <div>
                <label for="">Text:</label>
                <textarea name="text">{{ (old('text')) ? old('text') : $motorcycle->text }}</textarea>
                <x-error for="text" />
            </div>
            <div>
                <label for="">Cena:</label>
                <x-input type="number" name="prize" value="{{ (old('prize')) ? old('prize') : $motorcycle->prize }}"></x-input>
                <x-error for="prize" />
            </div>
            <x-button>Upravit</x-button>
        </form>
    </div>
@endsection