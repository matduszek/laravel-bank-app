<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

            </a>
        </x-slot>

        <div class="text-4xl mx-auto mb-6 font-bold">Bilet Jelenia Góra-MZK</div>
        <div class="text-xl text-left">Typ biletu: {{ $type }}</div>
        <div class="text-xl text-left">Czas: {{ $time }} @if($time == "15" || $time == "30") minut @else godz. @endif</div>
        <div class="text-xl text-left">Czas: {{ $amount }} PLN</div>
        <div class="text-xl text-left">Koniec: {{ $end_time }}</div>

        <form method="POST" action="{{ route('busdec.payment') }}">
            @csrf

            <input type="hidden" name="city" value="{{ $city }}">
            <input type="hidden" name="type" value="{{ $type }}">
            <input type="hidden" name="time" value="{{ $time }}">
            <input type="hidden" name="end_time" value="{{ $end_time }}">
            <input type="hidden" name="amount" value="{{ $amount }}">
            <input type="hidden" name="t" value="BUS">

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="mx-auto">
                    {{ __('Zapłać') }}
                </x-primary-button>
            </div>

        </form>

        <br><br>

        <div class="mt-6 mx-auto">
            <h7 class="text-xl text-red-800 mt-6 text-center items-center justify-center"><a href="{{route('show.tickets')}}">Zrezygnuj z ubezpieczenia</a></h7>
        </div>

    </x-auth-card>
</x-guest-layout>
