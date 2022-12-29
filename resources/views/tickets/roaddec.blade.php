<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

            </a>
        </x-slot>
        <div class="text-4xl mx-auto mb-6 font-bold">Autostrada bilet</div>

        <div class="text-xl text-left">Rejestracja: {{ $rej }}</div>
        <div class="text-xl text-left">Trasa: {{ $full_road }}</div>
        <div class="text-xl text-left">Długość: {{ $long }} KM</div>
        <div class="text-xl text-left">Kwota: {{ $amount }} PLN</div>

        <form method="POST" action="{{ route('roaddec.payment') }}">
            @csrf

            <input type="hidden" name="rej" value="{{ $rej }}">
            <input type="hidden" name="full_road" value="{{ $full_road }}">
            <input type="hidden" name="long" value="{{ $long }}">
            <input type="hidden" name="amount" value="{{ $amount }}">
            <input type="hidden" name="road" value="{{ $road }}">
            <input type="hidden" name="t" value="BUS">

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="mx-auto">
                    {{ __('Zapłać') }}
                </x-primary-button>
            </div>
        </form>

        <br><br>

        <div class="mt-6 mx-auto">
            <h7 class="text-xl text-red-800 mt-6 text-center items-center justify-center"><a href="{{route('show.tickets')}}">POWRÓT</a></h7>
        </div>

    </x-auth-card>
</x-guest-layout>
