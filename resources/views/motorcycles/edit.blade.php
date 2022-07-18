@extends('layouts.app')

@section('content')
<x-h1>{{ trans('motorcycle.update-motorcycle') }}</x-h1>
<div class="w-full sm:w-2/3 sm:m-auto">
    <form action="{{ route('motorcycles.update', $motorcycle->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-4">
            <x-label value="{{ trans('motorcycle.name') }}:" />
            <x-input type="text" name="name" id="name" value="{{ (old('name')) ? old('name') : $motorcycle->name }}" />
            <x-error for="name" />
        </div>
        <div class="mb-4">
            <x-label value="{{ trans('motorcycle.description') }}:" />
            <x-textarea name="text" id="text" value="{{ (old('text')) ? old('text') : $motorcycle->text }}" />
            <x-error for="text" />
        </div>
        <div class="mb-4">
            <x-label value="{{ trans('motorcycle.prize') }}:" />
            <x-input type="number" name="prize" id="prize"
                value="{{ (old('prize')) ? old('prize') : $motorcycle->prize }}" />
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
        @if ($motorcycle->images)
        <div class="mb-4">
            <x-label class="mb-0" value="{{ trans('motorcycle.old-images') }}:" />
            <div class="grid grid-cols grid-cols-10">
                @foreach ($motorcycle->images as $key => $image)
                <div class="col-span-5 p-2" id="{{ $key }}">
                    <figure class="relative">
                        <span class="color-red-600 cursor-pointer absolute top-0 right-0"
                            onclick="deleteImage('{{ $image }}', {{ $key }})"><i class="fas fa-times"></i></span>
                        <img class="pt-6" src="{{ asset('storage/' . $image) }}" alt="">
                    </figure>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        <div class="mb-4 hidden" id="image-div">
            <x-label class="mb-0" value="{{ trans('motorcycle.new-images') }}:" />
            <div class="grid grid-cols grid-cols-10" id="image-preview">
            </div>
        </div>
        <x-button>{{ trans('motorcycle.update-motorcycle') }}</x-button>
    </form>
</div>
@endsection

@section('script')
<script src="{{ asset('js/image.js') }}" defer></script>
<script>
    function deleteImage(file_name, target){
        $.ajax({
            url: '{{ url('/motorcycles/delete-image') }}',
            method: 'POST',
            data: {
                name: file_name,
                _token: '{{ csrf_token() }}',
            },
            success: function (response) {
                $('#' + target).remove();
        },
        error: function () {
            alert('Něco se pokazilo.')
        }
        });
    } 
</script>
@endsection