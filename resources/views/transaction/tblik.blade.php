<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

            </a>
        </x-slot>
        <h2 class="text-4xl font-bold text-center">BLIK</h2>
        <br>
        <h6 class="text-xl font-bold text-left">Numer telefonu: {{ Auth::user()->phone_number}}</h6>
        <h6 class="text-xl font-bold text-left">Saldo: {{$blik->balance}} {{ $blik->currency }}</h6>
        <br>
        <form method="POST" action=" {{ route('transaction.blik') }}">
            @csrf

            <!-- Kwota -->
            <div>
                <x-input-label for="amount" :value="__('Kwota')" />
                <x-text-input id="amount" class="block mt-1 w-full" type="text" name="amount" :value="old('amount')" required autofocus />
                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            </div>

            <!-- BLIK - Numer telefonu na jaki przelewamy -->
            <div>
                <x-input-label for="tophonenumber" :value="__('Numer telefonu na jaki chcemy przelać pieniądze')" />
                <x-text-input id="tophonenumber" class="block mt-1 w-full" type="text" name="tophonenumber" :value="old('tophonenumber')" required autofocus />
                <x-input-error :messages="$errors->get('tophonenumber')" class="mt-2" />
            </div>

            <input type="hidden" name="t_id" value="{{ $blik->id_account }}">
            <br>

            @if (isset($failed_account))
                <div class="bg-red-600 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{{ $failed_account }}</li>
                    </ul>
                </div>
            @endif

            @if (\Session::has('failed_amount'))
                <div class="bg-red-600 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{!! \Session::get('failed_amount') !!}</li>
                    </ul>
                </div>
            @endif

            @if (isset($not_found))
                <div class="bg-red-600 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li> {{ $not_found }}</li>
                    </ul>
                </div>
            @endif

            @if (\Session::has('not_blik'))
                <div class="bg-red-600 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{!! \Session::get('not_blik') !!}</li>
                    </ul>
                </div>
            @endif

            <div class="text-center text-white text-4xl bg-emerald-600 shadow">
                <a href="{{ route('transaction.blik', ['account_id' => $blik->id_account]) }}"><button>Przelej</button></a>
            </div>
        </form>
        <div class="block mt-8">
            <h7 class="text-xl text-center"><a href="{{route('show.accounts')}}">POWRÓT</a></h7>
        </div>
    </x-auth-card>
</x-guest-layout>

