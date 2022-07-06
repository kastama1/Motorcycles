@extends('layouts.app')

@section('content')
<x-h1>Uživatelé</x-h1>
<div class="flex flex-col">
    <div class="overflow-x-auto">
        <table class="min-w-full text-center">
            <tr class="border-b border-black">
                <th>Jméno</th>
                <th>Přihlašovací jméno</th>
                <th>E-mail</th>
                <th>Možnosti</th>
            </tr>
            @foreach ($users as $user)
            <tr class="border-b border-gray-500">
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->username }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <x-link href="{{ route('users.edit', $user->id) }}">Upravit uživatele</x-link>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button
                            class="px-1 pt-1 text-md font-medium leading-5 text-black hover:text-gray-500 hover:underline focus:outline-none transition duration-150 ease-in-out">Smazat
                            uživatele</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

<div class="relative">
    <x-link class="absolute right-0" href="{{ route('users.create') }}">Přidat uživatele</x-link>
</div>
@endsection