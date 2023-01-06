<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="text-center text-justify mt-10 mx-auto w-3/4 text-xl text-black ">
        <div class="text-4xl mt-5 mb-5 text-black w-3/4 mx-auto text-center">RACHUNKI BANKOWE</div>
        <img src="{{URL::asset('logo/account.png')}}" class="mx-auto mb-5" alt="profile Pic" height="200" width="200">
        Każdy klient może posiadać nieograniczoną ilość rachunków bankowych, warunkami są: <br><br><br>

        1. Klient może posiadać jedynie jedno normalne konto z blikiem, które jest przypisane jako konto główne (WALUTA PLN).<br><br>

        2. Normalny rachunek może być utworzony jedynie w walucie PLN.<br><br>

        3. Rachunek walutowy nie może być w walucie PLN.<br><br>

        4. Rachunki są rozliczane według naszych kursów, które są codziennie aktualizowane (Zakładka kantor).<br><br>

        5. Każde konto posiada możliwość przelewu. <br><br>

        6. Każdy numer konta jest unikalny i przypisany do rachunku bankowego. <br><br>

        7. Konto oszczędnościowe może być utworzone we wszystkich dostępnych walutach (CHF, GBP, PLN, EUR, USD). <br><br>

        8. Do pierwszego otwartego normalnego rachunku bankowego dodawane jest 50 PLN do salda konta .<br><br>
    </div>
    <div class="text-center bg-gray-400 text-gray-600 mt-10 mx-auto w-full text-sm">Bank FMMKParibas zastrzega sobie prawo do zmiany warunków kredytu.</div>
</x-app-layout>
