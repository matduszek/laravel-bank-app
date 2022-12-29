<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

            </a>
        </x-slot>
        <div class="text-4xl text-center mx-auto mb-6 font-bold">Ubezpieczenie OC (1 ROK)</div>

        <div class="text-xl text-left">Marka: {{ $brand }}</div>
        <div class="text-xl text-left">Pojemność silnika: {{ $cap }}</div>
        <div class="text-xl text-left">Wartośc pojazdu: {{ $value }}</div>
        <div class="text-xl text-left">Przebieg: {{ $kilometers }}</div>
        <div class="text-xl text-left">Rejestracja: {{ $rejestracja }}</div>
        <div class="text-xl text-left">Rok produkcji: {{ $production }}</div>
        <div class="text-xl text-left">Kwota do zapłaty: {{ $amount }}</div>

        <form method="POST" action="{{ route('cardec.payment') }}">
            @csrf
            <input type="hidden" name="brand" value="{{ $brand }}">
            <input type="hidden" name="cap" value="{{ $cap }}">
            <input type="hidden" name="value" value="{{ $value }}">
            <input type="hidden" name="kilometers" value="{{ $kilometers }}">
            <input type="hidden" name="rejestracja" value="{{ $rejestracja }}">
            <input type="hidden" name="production" value="{{ $production }}">
            <input type="hidden" name="id_car" value="{{ $id_car }}">
            <input type="hidden" name="amount" value="{{ $amount }}">

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="mx-auto">
                    {{ __('Zapłać') }}
                </x-primary-button>
            </div>
        </form>

        <br><br>

        <div class="mt-6 mx-auto">
            <h7 class="text-xl text-red-800 mt-6 text-center items-center justify-center"><a href="{{route('insurance.panel')}}">Zrezygnuj z ubezpieczenia</a></h7>
        </div>

    </x-auth-card>
</x-guest-layout>
