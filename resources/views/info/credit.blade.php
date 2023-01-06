<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="text-center text-justify mt-10 mx-auto w-3/4 text-xl text-black ">
        <div class="text-4xl mt-5 mb-5 text-black w-3/4 mx-auto text-center">KREDYT</div>
        <img src="{{URL::asset('logo/credit-card.png')}}" class="mx-auto mb-5" alt="profile Pic" height="200" width="200">
        Aby uzyskać kredyt, bank wymaga spełnienia kilku podstawowych warunków: <br><br><br>

        1. Posiadanie stałego dochodu, który musi być wykazany średnią netto za ostatnie 6 miesięcy. Musi to być praca na etacie.<br><br>

        2. Posiadanie umowy o pracę lub umowy zlecenie.<br><br>

        3. Posiadanie wiarygodności kredytowej.<br><br>

        4. Posiadanie odpowiedniej zdolności kredytowej. Maksymalna kwota kredytu wynosi 200000 PLN.<br><br>

        5. Posiadanie odpowiedniego stażu pracy.<br><br>

        <div class="text-red-600">6. Kredyt może zostać udzielony wielokrotnie.<br><br></div>

        <div class="text-red-600">7. Aby uzyskiwać kolejne kredyty, należy spłacić bieżący. <br><br></div>

        8. Aby uzyskać możliwość pozyskania kredytu, klient musi posiadać konto główne. <br><br>

        9. Jeśli spełniasz te warunki, masz duże szanse na uzyskanie kredytu.<br><br>
    </div>
    <div class="text-center bg-gray-400 text-gray-600 mt-10 mx-auto w-full text-sm">Bank FMMKParibas zastrzega sobie prawo do zmiany warunków kredytu.</div>
</x-app-layout>
