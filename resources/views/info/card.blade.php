<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="text-center text-justify mt-10 mx-auto w-3/4 text-xl text-black ">
        <div class="text-4xl mt-5 mb-5 text-black w-3/4 mx-auto text-center">KARTY WIRTUALNE</div>
        <img src="{{URL::asset('logo/cc.png')}}" class="mx-auto mb-5" alt="profile Pic" height="200" width="200">
        Karty wirtualne działają w następujący sposób:<br><br>

        1. Klient może posiadać maksymalnie 1 karte wirtualną do konta bankowego oraz może posiadać kartę do każdego udzielonego kredytu.<br><br>

        2. Jedna karta wirtualna zostanie automatycznie wygenerowana dla konta głównego z blikiem.<br><br>

        3. Następne zostaną automatycznie wygenerowana dla kredytu.<br><br>

    </div>
</x-app-layout>
