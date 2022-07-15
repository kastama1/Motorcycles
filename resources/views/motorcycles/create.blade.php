@extends('layouts.app')

@section('content')
<x-h1>Přidat motocykl</x-h1>
<div class="w-2/3 m-auto">
    <form action="{{ route('motorcycles.store') }}" method="POST" enctype="multipart/form-data" id="image-form">
        @csrf
        <div class="mb-4">
            <x-label value="Název:" />
            <x-input type="text" name="name" id="name" value="{{ old('name') }}" />
            <x-error for="name" />
        </div>
        <div class="mb-4">
            <x-label value="Text:" />
            <x-textarea name="text" id="text">{{ old('text') }}</x-textarea>
            <x-error for="text" />
        </div>
        <div class="mb-4">
            <x-label value="Cena:" />
            <x-input type="number" name="prize" id="prize" value="{{ old('prize') }}" />
            <x-error for="prize" />
        </div>
        <div class="mb-4">
            <x-label value="Obrázky:" />
            <div
                class="mt-2 relative border-dotted h-48 rounded border-2 border-gray-400 bg-white flex justify-center items-center">
                <div class="absolute">
                    <div class="flex flex-col items-center"><i class="fa fa-folder-open fa-4x text-black"></i>
                        <span id="label" class="block text-gray-400 font-normal">Přesuňte soubor nebo vyberte
                            soubor.</span>
                    </div>
                </div>
                <input id="image-input" onchange="imageSelect()" type="file" class="h-full w-full opacity-0"
                    name="images[]" multiple>
            </div>
            <x-error for="images" />
        </div>
        <div class="mb-4 grid grid-cols grid-cols-10" id="image-preview">

        </div>
        <x-button>Přidat</x-button>
    </form>
</div>
@endsection

@section('script')
<script>
    let images = [];
    function imageSelect(){
        images = [];
        let image = document.querySelector('#image-input').files;
        for (let i = 0; i < image.length; i++) {
            images.push({
                'name' : image[i].name,
                'url' : URL.createObjectURL(image[i]),
                'file' : image[i],
            })
        }

        document.querySelector('#image-preview').innerHTML = imageShow();
    }

    function imageShow(){
        let image = "";
        images.forEach(i => {
            image += '<div class="col-span-5 p-2"><figure class="relative"><span class="color-red-600 cursor-pointer absolute bottom-0 right-0" onclick="imageDelete(' + images.indexOf(i) + ')"><i class="fas fa-times"></i></span><img src="' + i.url + '" alt=""><figcaption>' + i.name + '</figcaption></figure></div>';
        });

        return image;
    }

    function imageDelete(e){
        images.splice(e, 1);
        document.querySelector('#image-preview').innerHTML = imageShow();
    }
</script>
@endsection