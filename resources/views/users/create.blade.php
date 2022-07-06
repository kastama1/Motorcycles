@extends('layouts.app')

@section('content')
<x-h1>Přidat uživatele</x-h1>
<div class="w-2/3 m-auto">
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <x-label value="Jméno:" />
            <x-input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" />
            <x-error for="firstname" />
        </div>
        <div class="mb-4">
            <x-label value="Příjmení:" />
            <x-input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" />
            <x-error for="lastname" />
        </div>
        <div class="mb-4">
            <x-label value="Přihlašovací jméno:" />
            <x-input type="text" name="username" id="username" value="{{ old('username') }}" />
            <x-error for="username" />
        </div>
        <div class="mb-4">
            <x-label value="E-mail:" />
            <x-input type="text" name="email" id="email" value="{{ old('email') }}" />
            <x-error for="email" />
        </div>
        <div class="mb-4">
            <x-label value="Heslo:" />
            <x-input type="password" name="password" id="password" />
            <x-error for="password" />
        </div>

        <x-button>Přidat</x-button>
    </form>
</div>
@endsection