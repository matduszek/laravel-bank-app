<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

            </a>
        </x-slot>
        <div class="text-4xl mx-auto mb-6 font-bold">Ubezpieczenie na życie</div>

        <div class="text-xl text-left">Wiek: {{ $age }}</div>
        <div class="text-xl text-left">Płeć: {{ $gender }}</div>
        <div class="text-xl text-left">Zarobki: {{ $earnings }} PLN</div>
        <div class="text-xl text-left">Zawód: {{ $profesion }}</div>
        <div class="text-xl text-left">Status: {{ $status }}</div>
        <div class="text-xl text-left">Kwota ubezpieczenia: {{ $sum_ins }} PLN</div>
        <div class="text-xl text-left">Kwota do zapłaty: {{$amount}} PLN</div>

        <form method="POST" action="{{ route('lifedec.payment') }}">
            @csrf
            <input type="hidden" name="age" value="{{ $age }}">
            <input type="hidden" name="earnings" value="{{ $earnings }}">
            <input type="hidden" name="gender" value="{{ $gender }}">
            <input type="hidden" name="profesion" value="{{ $profesion }}">
            <input type="hidden" name="status" value="{{ $status }}">
            <input type="hidden" name="sum_ins" value="{{ $sum_ins }}">
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
