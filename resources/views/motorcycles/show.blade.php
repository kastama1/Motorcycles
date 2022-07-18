@extends('layouts.app')

@section('content')
<x-h1>{{ $motorcycle->name }}</x-h1>
<div class="border-b-2 border-black">
    @if ($motorcycle->images)
    <div class="relative m-auto w-4/5">
        @foreach ($motorcycle->images as $image)
        <div>
            <img class="slides hidden px-10" src="{{ asset('storage/' . $image) }}" alt="">
        </div>
        @endforeach

        <a class="absolute left-0 top-1/2 m-2 cursor-pointer" onclick="plusSlides(-1)"><i
                class="fas fa-angle-left text-4xl"></i></a>
        <a class="absolute right-0 top-1/2 m-2 cursor-pointer" onclick="plusSlides(1)"><i
                class="fas fa-angle-right text-4xl"></i></a>

        <div class="text-center">
            @for ($i = 0; $i < count($motorcycle->images); $i++) <span
                    class="dots rounded-full inline-block tra bg-gray-400" onclick="currentSlide({{ $i + 1 }})"></span>
                @endfor
        </div>
    </div>
    @endif
    <x-p>{{ $motorcycle->text }}</x-p>
    <x-p>{{ trans('motorcycle.prize') }}: {{ $motorcycle->prize }} Kč</x-p>
    @if (Auth::check())
    <x-link href="{{ route('motorcycles.edit', $motorcycle->id) }}">{{ trans('motorcycle.update-motorcycle') }}</x-link>
    <form action="{{ route('motorcycles.destroy', $motorcycle->id) }}" method="POST">
        @csrf
        @method('delete')
        <button
            class="px-1 pt-1 text-md font-medium leading-5 text-black hover:text-gray-500 hover:underline focus:outline-none transition duration-150 ease-in-out">{{
            trans('motorcycle.delete-motorcycle') }}</button>
    </form>
    @endif
</div>
@endsection

@section('script')
<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("slides");
        let dots = document.getElementsByClassName("dots");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" bg-black", " bg-gray-400");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].classList.remove("bg-gray-400")
        dots[slideIndex-1].className += " bg-black";
    }
</script>
@endsection