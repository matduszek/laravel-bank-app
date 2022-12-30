<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="text-center text-justify mt-10 mx-auto w-3/4 text-xl text-black ">
        <div class="text-4xl mt-5 mb-5 text-black w-3/4 mx-auto text-center">PRZELEWY</div>
        <img src="{{URL::asset('logo/cash.png')}}" class="mx-auto mb-5" alt="profile Pic" height="200" width="200">
        Przelewy internetowe działają w następujący sposób:<br><br>

        1. Aby wykonać przelew internetowy, należy mieć dostęp do swojego konta bankowego online lub do aplikacji mobilnej swojego banku. Następnie należy wybrać opcję przelewu i wypełnić formularz z danymi dotyczącymi odbiorcy (tytuł, numer konta) oraz kwotą przelewu. <br><br>

        2. Po zatwierdzeniu przelewu przez użytkownika, system bankowości internetowej lub aplikacji mobilnej przesyła odpowiednie informacje do systemu bankowego.<br><br>

        3. System bankowy sprawdza poprawność danych i, jeśli wszystko jest w porządku, przeprowadza przelew z konta użytkownika na konto odbiorcy.<br><br>

        4. Przelew jest zwykle widoczny na koncie odbiorcy w ciągu kilku chwil. Można zobaczyć transakcje w zakładce 'Transakcje wych.' lub 'Transakcje przych.'<br><br>

        5. Przelewy internetowe umożliwiają szybkie i łatwe przesyłanie pieniędzy bez konieczności wychodzenia z domu czy korzystania z bankomatu. Są one również bezpieczne, ponieważ dane użytkowników są chronione przez mechanizmy zabezpieczeń bankowości internetowej.<br><br>

        6. Maksymalna kwota przelewu to 20000 PLN (POZOSTAŁE WALUTY SĄ PRZEWALUTOWANE I JEST TO RÓWNOWARTOŚĆ KWOTY W PLN). Aby przelać większe kwoty, należy się udać do punktu stacjonarnego i wyepłnić formularz a następnie umówić przelew z naszym specjalistą.'<br><br>
        <br><br>
    </div>
</x-app-layout>
