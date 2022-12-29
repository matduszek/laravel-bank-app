<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

            </a>
        </x-slot>
        <div class="text-4xl text-center mx-auto mb-6 font-bold">PODANIE O KREDYT</div>

        <div class="text-xl text-left">Kwota kredytu: {{ $kwota }}</div>
        <div class="text-xl text-left">Zarobki: {{ $zar }}</div>
        <div class="text-xl text-left">Typ umowy: {{ $typ }}</div>
        <div class="text-xl text-left">Długośc umowy (msc): {{ $ile_p }}</div>
        <div class="text-xl text-left">Ilość rat (msc): {{ $ile_rat }}</div>
        <div class="text-xl text-left">Rata wynosi: {{ $ile_wyn }} PLN</div>




        <br>
        <br>

        <form method="POST" action="{{ route('credit.application') }}">
            @csrf
                <input type="hidden" name="amount" value="{{ $kwota }}">
                <input type="hidden" name="earnings" value="{{ $zar }}">
                <input type="hidden" name="type" value="{{ $typ }}">
                <input type="hidden" name="length" value="{{ $ile_p }}">
                <input type="hidden" name="credit_length" value="{{ $ile_rat }}">
                <input type="hidden" name="rata" value="{{ $ile_wyn }}">

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="mx-auto">
                    {{ __('WEŹ KREDYT') }}
                </x-primary-button>
            </div>

        </form>

            <div class="mt-6 mx-auto">
                <h7 class="text-xl text-red-800 mt-6 text-center items-center justify-center"><a href="{{ route('credit.panel') }}">Zrezygnuj z kredytu</a></h7>
            </div>

    </x-auth-card>
</x-guest-layout>
