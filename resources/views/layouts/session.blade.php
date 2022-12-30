<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="text-center text-justify mt-10 mx-auto w-3/4 text-sm text-black ">
        <div class="text-5xl mt-5 mb-5 text-black w-3/4 mx-auto text-center">ADMINISTRATOR DANYCH</div>
        <img src="{{URL::asset('logo/data.png')}}" class="mx-auto mb-5" alt="profile Pic" height="200" width="200">
        §1 Administrator danych jest odpowiedzialny za przestrzeganie przepisów dotyczących ochrony danych osobowych oraz zasad bezpieczeństwa danych.
        <br><br>
        §2 Administrator danych jest odpowiedzialny za przechowywanie i ochronę danych osobowych klientów banku, w tym ich poufności, integralności i dostępności.
        <br><br>
        §3 Administrator danych ma obowiązek zapewnić, aby wszyscy pracownicy banku, którzy mają dostęp do danych osobowych, przestrzegali odpowiednich zasad ochrony danych.
        <br><br>
        §4 Administrator danych ma obowiązek zapewnić, aby dane osobowe klientów banku były przetwarzane zgodnie z obowiązującymi przepisami prawa oraz polityką banku w zakresie ochrony danych osobowych.
        <br><br>
        §5 Administrator danych ma obowiązek niezwłocznie informować klientów banku o wszelkich incydentach związanych z ochroną danych osobowych oraz podjąć wszelkie niezbędne kroki w celu ich usunięcia lub ograniczenia.
        <br><br>
        §6 Administrator danych ma obowiązek zapewnić, aby dane osobowe klientów banku były przetwarzane zgodnie z ich wolą i zgoda klientów na przetwarzanie danych osobowych.
        <br><br>
        §7 Administrator danych ma obowiązek zapewnić, aby dane osobowe klientów banku były przetwarzane zgodnie z zasadami zawartymi w polityce banku w zakresie ochrony danych osobowych.
    </div>
    <div class="text-center bg-gray-400 text-gray-600 mt-10 mx-auto w-full text-sm">Bank FMMKParibas zastrzega sobie prawo do zmiany regulaminu jako administrator danych.</div>
</x-app-layout>
