<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="text-center mt-10 mx-auto w-3/4 text-xl text-black ">
        <div class="text-4xl mt-5 mb-5 text-black w-3/4 mx-auto text-center">UBEZPIECZENIA NIERUCHOMOŚCI</div>
        <img src="{{URL::asset('logo/pi.png')}}" class="mx-auto mb-5" alt="profile Pic" height="200" width="200">
        W naszej ofercie na ten moment oferujemy ubezpieczenia firmy 'ZabezpieczNieruchomosc sp. z o.o'<br>
        Administratorem danych jest w/w firma.'<br>
        Oferta wyliczana jest na podstawie podanych danych i obliczana jest składka roczna.<br>
        Ubezpieczenie jest ważne przez 1 ROK<br><br>

        <hr class="w-auto h-1 mb-10 bg-gray-300 opacity-50" />

        <div class="text-4xl mt-5 mb-5 text-black w-3/4 mx-auto text-center">UBEZPIECZENIA ZDROWOTNE</div>

        <img src="{{URL::asset('logo/hi.png')}}" class="mx-auto mb-5" alt="profile Pic" height="200" width="200">
        W naszej ofercie na ten moment oferujemy ubezpieczenia firmy 'RatujemyZdrowie sp. z o.o'<br>
        Administratorem danych jest w/w firma.'<br>
        Oferta wyliczana jest na podstawie podanych danych i obliczana jest składka roczna.<br>
        Ubezpieczenie jest ważne przez 1 ROK<br><br>

        <hr class="w-auto h-1 mb-10 bg-gray-300 opacity-50" />

        <div class="text-4xl mt-5 mb-5 text-black w-3/4 mx-auto text-center">UBEZPIECZENIA NA SAMOCHÓD</div>

        <img src="{{URL::asset('logo/ci.png')}}" class="mx-auto mb-5" alt="profile Pic" height="200" width="200">
        W naszej ofercie na ten moment oferujemy ubezpieczenia firmy 'HELPCAR sp. z o.o'<br>
        Administratorem danych jest w/w firma.'<br>
        Oferta wyliczana jest na podstawie podanych danych i obliczana jest składka roczna.<br>
        Ubezpieczenie jest ważne przez 1 ROK<br><br>

    </div>
    <div class="text-center bg-gray-400 text-gray-600 mt-10 mx-auto w-full text-sm">Bank FMMKParibas zastrzega sobie prawo do zmiany warunków kredytu.</div>
</x-app-layout>
