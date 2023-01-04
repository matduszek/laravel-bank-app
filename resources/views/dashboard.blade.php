<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 mt-5 overflow-hidden shadow-amber-700 sm:rounded-lg">
                <div class="p-6 text-3xl text-white">
                    {{ __("Witamy Cię w naszym banku!") }}
                </div>
                <div class="p-6 text-sm text-white">
                    {{ __("Otwórz pierwsze konto i zyskaj 50 PLN na start!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mx-auto rounded w-1/3 bg-gray-200 hover:bg-gray-300 text-4xl shadow">
        <a href="{{ route('account.add') }}">Otwórz rachunek</a>
    </div>

    <hr class="w-auto h-1 mt-12 bg-gray-300 opacity-50" />

    <div class="mt-4 text-2xl text-center">Komunikaty</div>

    <div role="alert">
        <div class="mt-4 w-1/2 mx-auto bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Uwaga
        </div>
        <div class="w-1/2 mx-auto border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            <p>Nie wchodź w linki wysyłane przez nieznane numery! My nie wysyłamy takich!</p>
        </div>
    </div>

    <div class="mt-10 mx-auto bg-blue-100 w-1/2 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
        <p class="font-bold">Aktualizacja 0.84v </p>
        <p class="text-sm">Dodano możliwość spłaty kredytu</p>
    </div>


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('sucess') }}
        </div>
    @endif

</x-app-layout>
