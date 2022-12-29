<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

            </a>
        </x-slot>
        <h2 class="text-4xl font-bold text-center">UBEZPIECZENIE</h2>
        <br>
        <h6 class="text-xl font-bold text-left">Saldo: {{$account->balance}} {{ $account->currency }}</h6>
        <h6 class="text-xl font-bold text-left">Numer rachunku: {{ $account->account_number}}</h6>
        <br>
        <form method="POST" action=" {{ route('transaction.post', ['account_id' => $account->id_account]) }}">
            @csrf

            <div>
                <x-input-label for="title" :value="__('Tytuł przelewu')" />
                <x-text-input id="title" class="block mt-1 w-full"  type="text" name="title" value="Ubezpieczenie OC {{ $rejestracja }}" readonly required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Kwota -->
            <div>
                <x-input-label for="amount" :value="__('Kwota')" />
                <x-text-input id="amount" class="block mt-1 w-full" type="text" name="amount" value="{{$amount}}" readonly required autofocus />
                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            </div>

            <!-- Numer kontana jaki przelewamy -->
            <div>
                <x-input-label for="tonumberaccount" :value="__('Numer konta na jaki chcemy przelać pieniądze')" />
                <x-text-input id="tonumberaccount" class="block mt-1 w-full" type="text" name="tonumberaccount" value="{{$special_number}}" readonly required autofocus />
                <x-input-error :messages="$errors->get('tonumberaccount')" class="mt-2" />
            </div>
            <br>

            <input type="hidden" name="brand" value="{{ $brand }}">
            <input type="hidden" name="cap" value="{{ $cap }}">
            <input type="hidden" name="value" value="{{ $value }}">
            <input type="hidden" name="kilometers" value="{{ $kilometers }}">
            <input type="hidden" name="rejestracja" value="{{ $rejestracja }}">
            <input type="hidden" name="t_id" value="{{$account->id_account}}">
            <input type="hidden" name="production" value="{{ $production }}">
            <input type="hidden" name="id_car" value="{{ $id_car }}">
            <input type="hidden" name="amount" value="{{ $amount }}">
            <input type="hidden" name="t" value="C">


            @if (\Session::has('failed_account'))
                <div class="bg-red-600 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{!! \Session::get('failed_account') !!}</li>
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

            @if (\Session::has('not_found'))
                <div class="bg-red-600 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{!! \Session::get('not_found') !!}</li>
                    </ul>
                </div>
            @endif



            <div class="text-center text-white text-4xl bg-emerald-600 shadow">
                <a href="{{ route('transaction.post', ['account_id' => $account->id_account]) }}"><button>Przelej</button></a>
            </div>
        </form>
        <div class="block mt-8">
            <h7 class="text-xl text-center"><a href="{{route('insurance.panel')}}">POWRÓT</a></h7>
        </div>
    </x-auth-card>
</x-guest-layout>
