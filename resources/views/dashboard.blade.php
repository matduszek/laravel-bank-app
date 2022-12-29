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

    <div class="text-center text-4xl shadow">
        <a href="{{ route('account.add') }}">Otwórz rachunek</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('sucess') }}
        </div>
    @endif

</x-app-layout>
