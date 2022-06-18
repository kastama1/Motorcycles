@extends('layouts.app')

@section('content')
@foreach ($users as $user)
    <div class="border-b-2 border-black my-5">
        <div class="relative">
            <h1>
                <x-link class="text-4xl px-0" href="{{ route('users.show', $user->id) }}">
                    {{ $user->name }}
                </x-link>
            </h1>
            <div class="absolute right-0 top-0">
                <x-link href="{{ route('users.edit', $user->id) }}">Upravit uživatele</x-link>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="px-1 pt-1 text-md font-medium leading-5 text-black hover:text-gray-500 hover:underline focus:outline-none transition duration-150 ease-in-out">Smazat uživatele</button>
                </form>
            </div>
        </div>
        <div class="px-2">
            <p class="py-1 text-lg">Přihlašovací jméno: {{ $user->username }}</p>
            <p class="py-1 text-lg">E-mail: {{ $user->email }}</p>
        </div>
    </div>    
@endforeach
<div class="relative">
    <x-link class="absolute right-0" href="{{ route('users.create') }}">Přidat uživatele</x-link>
</div>
@endsection