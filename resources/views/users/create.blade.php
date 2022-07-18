@extends('layouts.app')

@section('content')
<x-h1>{{ trans('user.add-user') }}</x-h1>
<div class="w-2/3 m-auto">
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <x-label value="{{ trans('user.firstname') }}:" />
            <x-input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" />
            <x-error for="firstname" />
        </div>
        <div class="mb-4">
            <x-label value="{{ trans('user.lastname') }}:" />
            <x-input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" />
            <x-error for="lastname" />
        </div>
        <div class="mb-4">
            <x-label value="{{ trans('user.login') }}:" />
            <x-input type="text" name="username" id="username" value="{{ old('username') }}" />
            <x-error for="username" />
        </div>
        <div class="mb-4">
            <x-label value="{{ trans('user.mail') }}:" />
            <x-input type="text" name="email" id="email" value="{{ old('email') }}" />
            <x-error for="email" />
        </div>
        <div class="mb-4">
            <x-label value="{{ trans('user.password') }}:" />
            <x-input type="password" name="password" id="password" />
            <x-error for="password" />
        </div>

        <x-button>{{ trans('user.add-user') }}</x-button>
    </form>
</div>
@endsection