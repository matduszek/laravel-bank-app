<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="text-center mt-10 mx-auto w-3/4 text-xl text-black ">
        <div class="text-4xl mt-5 mb-5 text-black w-3/4 mx-auto text-center">BILETY KOMUNIKACYJNE</div>
        <img src="{{URL::asset('logo/bus.png')}}" class="mx-auto mb-5" alt="profile Pic" height="200" width="200">
        W naszej ofercie na ten moment oferujemy jedynie bilety w Jeleniej Górze, w przyszłości planujemy dodać więcej miast.<br><br>

        Cennik:<br>
        <div class="text-green-600">15 minutowy<br></div>
        Normalny: 5 PLN / Ulgowy: 3 PLN<br><br>

        <div class="text-green-600">30 minutowy<br></div>
        Normalny: 6 PLN / Ulgowy: 4.50 PLN<br><br>

        <div class="text-green-600">1 godz.<br></div>
        Normalny: 8 PLN / Ulgowy: 6 PLN<br><br>

        <div class="text-green-600">24 godz.<br></div>
        Normalny: 14 PLN / Ulgowy: 10 PLN<br><br><br>

        <hr class="w-auto h-1 mb-10 bg-gray-300 opacity-50" />

        <div class="text-4xl mt-5 mb-5 text-black w-3/4 mx-auto text-center">OPŁATY AUTOSTRADOWE</div>

        <img src="{{URL::asset('logo/road.png')}}" class="mx-auto mb-5" alt="profile Pic" height="200" width="200">
        W naszej ofercie na ten moment oferujemy również opłaty za odcinki autostrad, w przyszłości planujemy dodać więcej odcinków.<br><br>

        Cennik:<br>
        <div class="text-green-600">Toruń - Gdańsk<br></div>
        29.90 PLN<br><br>

        <div class="text-green-600">Konin - Świecko<br></div>
        93.00 PLN<br><br>

        <div class="text-green-600">Konin - Stryków<br></div>
        9.90 PLN<br><br>

        <div class="text-green-600">Wrocław - Sośnice<br></div>
        16.20 PLN<br><br>

        <div class="text-green-600">Katowice - Kraków<br></div>
        24.00 PLN<br><br>

    </div>
    <div class="text-center bg-gray-400 text-gray-600 mt-10 mx-auto w-full text-sm">Bank FMMKParibas zastrzega sobie prawo do zmiany warunków kredytu.</div>
</x-app-layout>
