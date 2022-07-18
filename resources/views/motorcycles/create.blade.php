@extends('layouts.app')

@section('content')
<x-h1>{{ trans('motorcycle.add-motorcycle') }}</x-h1>
<div class="w-full sm:w-2/3 sm:m-auto">
    <form action="{{ route('motorcycles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <x-label value="{{ trans('motorcycle.name') }}:" />
            <x-input type="text" name="name" id="name" value="{{ old('name') }}" />
            <x-error for="name" />
        </div>
        <div class="mb-4">
            <x-label value="{{ trans('motorcycle.description') }}:" />
            <x-textarea name="text" id="text">{{ old('text') }}</x-textarea>
            <x-error for="text" />
        </div>
        <div class="mb-4">
            <x-label value="{{ trans('motorcycle.prize') }}:" />
            <x-input type="number" name="prize" id="prize" value="{{ old('prize') }}" />
            <x-error for="prize" />
        </div>
        <div class="mb-4">
            <x-label value="{{ trans('motorcycle.images') }}:" />
            <div
                class="mt-2 relative border-dotted h-48 rounded border-2 border-gray-400 bg-white flex justify-center items-center">
                <div class="absolute">
                    <div class="flex flex-col items-center"><i class="fa fa-folder-open fa-4x text-black"></i>
                        <span id="label" class="block text-gray-400 font-normal">{{ trans('motorcycle.images-text')
                            }}</span>
                    </div>
                </div>
                <input id="image-input" onchange="imageSelect()" type="file" class="h-full w-full opacity-0"
                    name="images[]" multiple accept="image/png, image/jpeg , image/jpg">
            </div>
            <x-error for="images" />
            <x-error for="images.*" />
        </div>
        <div class="mb-4 hidden" id="image-div">
            <x-label class="mb-0" value="{{ trans('motorcycle.new-images') }}:" />
            <div class="grid grid-cols grid-cols-10" id="image-preview">
            </div>
        </div>
        <x-button>{{ trans('motorcycle.add-motorcycle') }}</x-button>
    </form>
</div>
@endsection

@section('script')
<script src="{{ asset('js/image.js') }}" defer></script>
@endsection