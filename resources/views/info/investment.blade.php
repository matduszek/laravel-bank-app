<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="text-center text-justify mt-10 mx-auto w-3/4 text-xl text-black ">
        <div class="text-4xl mt-5 mb-5 text-black w-3/4 mx-auto text-center">LOKATY</div>
        <img src="{{URL::asset('logo/earning.png')}}" class="mx-auto mb-5" alt="profile Pic" height="200" width="200">
        1. Moze zostać utworzona tylko jedna lokata.
        <br>
        <br>
        2. W ofercie jest tylko jedna stała stopa oprocentowania 4% w skali roku.
        <br>
        <br>
        3. Lokaty nie można usunąć.
        <br>
        <br>
        4. Na lokatę można wpłacać i wypłacać pieniądze.
        <br>
        <br>
        5. Lokata może zostać utworzona jedynie gdy posiadamy konto główne.
    </div>
    <div class="text-center bg-gray-400 text-gray-600 mt-10 mx-auto w-full text-sm">Bank FMMKParibas zastrzega sobie prawo do zmiany regulaminu lokaty.</div>

</x-app-layout>
