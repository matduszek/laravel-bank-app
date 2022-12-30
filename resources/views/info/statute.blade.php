<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="text-center text-justify mt-10 mx-auto w-3/4 text-sm text-black ">
        <div class="text-4xl mt-5 mb-5 text-black w-3/4 mx-auto text-center">REGULAMIN</div>
        <img src="{{URL::asset('logo/law2.png')}}" class="mx-auto mb-5" alt="profile Pic" height="200" width="200">
        §1 Bank zobowiązuje się do zachowania tajemnicy bankowej i ochrony danych osobowych swoich klientów zgodnie z obowiązującymi przepisami prawnymi.
        <br>
        <br>
        §2 Bank zapewnia swoim klientom bezpieczeństwo transakcji i przechowywania ich pieniędzy.
        <br>
        <br>
        §3 Klienci banku mogą korzystać z różnych usług finansowych, takich jak: rachunki osobiste i firmowe, kredyty, ubezpieczenia i inne.
        <br>
        <br>
        §4 Bank może wymagać od swoich klientów okazania dokumentów potwierdzających tożsamość przy zakładaniu rachunku lub składaniu wniosków o usługi finansowe.
        <br>
        <br>
        §5 Bank może nałożyć opłaty za korzystanie z niektórych usług lub za brak aktywności na rachunku.
        <br>
        <br>
        §6 Bank może dokonywać zmian w regulaminie, o ile poinformuje o tym swoich klientów z odpowiednim wyprzedzeniem.
        <br>
        <br>
        §7 Wszelkie spory między klientami a bankiem będą rozstrzygane w sposób polubowny. W przypadku braku porozumienia spory będą rozstrzygane przez sąd powszechny.
        <br>
        <br>
    </div>
    <div class="text-center bg-gray-400 text-gray-600 mt-10 mx-auto w-full text-sm">Bank FMMKParibas zastrzega sobie prawo do zmiany regulaminu.</div>

</x-app-layout>
