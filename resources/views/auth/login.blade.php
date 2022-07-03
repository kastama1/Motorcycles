@extends('layouts.app')

@section('content')
    <div class="w-2/3 m-auto">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="username" :value="__('Přihlašovací jméno')" />

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="password" :value="__('Heslo')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Zapamatuj si mě') }}</span>
                </label>
            </div>

            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Přihlásit se') }}
                </x-button>
            </div>
        </form>
    </div>
@endsection
