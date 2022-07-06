@extends('layouts.app')

@section('content')
<x-h1>Upravit uživatele</x-h1>
<div class="w-2/3 m-auto">
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-4">
            <x-label value="Jméno:" />
            <x-input type="text" name="firstname" id="firstname"
                value="{{ (old('firstname')) ? old('firstname') : $user->firstname }}" />
            <x-error for="firstname" />
        </div>
        <div class="mb-4">
            <x-label value="Příjmení:" />
            <x-input type="text" name="lastname" id="lastname"
                value="{{ (old('lastname')) ? old('lastname') : $user->lastname }}" />
            <x-error for="lastname" />
        </div>
        <div class="mb-4">
            <x-label value="Přihlašovací jméno:" />
            <x-input type="text" name="username" id="username"
                value="{{ (old('username')) ? old('username') : $user->username }}" />
            <x-error for="username" />
        </div>
        <div class="mb-4">
            <x-label value="E-mail:" />
            <x-input type="text" name="email" id="email" value="{{ (old('email')) ? old('email') : $user->email }}" />
            <x-error for="email" />
        </div>
        <x-button>Upravit</x-button>
    </form>
</div>
@endsection