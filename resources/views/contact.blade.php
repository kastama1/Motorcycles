@extends('layouts.app')

@section('content')
<x-h1>{{ trans('contacts.heading') }}</x-h1>

<div>
    <x-label>{{ trans('contacts.company') }}</x-label>
    <ul class="mx-4 mb-4">
        <li>
            <x-p class="mb-0">Jméno Příjmení</x-p>
        </li>
        <li>
            <x-p class="mb-0">Ulice, číslo domu</x-p>
        </li>
        <li>
            <x-p class="mb-0">PSČ, město</x-p>
        </li>
    </ul>
</div>
<div class="grid grid-cols grid-cols-5 sm:grid-cols-10">
    <div class="col-span-5">
        <x-label>{{ trans('contacts.czech-contatc') }}</x-label>
        <ul class="mx-4 mb-4">
            <li>
                <x-p class="mb-0">Jméno Příjmení</x-p>
            </li>
            <li>
                <x-p class="mb-0"><i class="fas fa-phone mr-1"></i>+420 999 999 999</x-p>
            </li>
            <li>
                <x-p class="mb-0"><i class="fa fa-at mr-1"></i>mail@mail.cz</x-p>
            </li>
        </ul>
    </div>
    <div class="col-span-5">
        <x-label>{{ trans('contacts.english-contatc') }}</x-label>
        <ul class="mx-4 mb-4">
            <li>
                <x-p class="mb-0">Jméno Příjmení</x-p>
            </li>
            <li>
                <x-p class="mb-0"><i class="fas fa-phone mr-1"></i>+420 999 999 999</x-p>
            </li>
            <li>
                <x-p class="mb-0"><i class="fa fa-at mr-1"></i>mail@mail.cz</x-p>
            </li>
        </ul>
    </div>
</div>
<div id="map" style="height: 500px" class="">
</div>
@endsection

@section('script')
<script type="text/javascript">
    function initMap() {
      const myLatLng = { lat: 50.075966817190185, lng: 14.436076218137982 };
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: myLatLng,
        scrollwheel: true
      });

      new google.maps.Marker({
        position: myLatLng,
        map,
        label: {
            text: "Titulek",
            color: "#C70E20",
            fontWeight: "bold",
        }
      });
    }

    window.initMap = initMap;
</script>

<script type="text/javascript"
    src="https://maps.google.com/maps/api/js?key=AIzaSyArKiFZwyEdQdajgpi5vQzEAASPDHI3IVs&callback=initMap&language={{ Config::get('app.locale') }}">
</script>
@endsection