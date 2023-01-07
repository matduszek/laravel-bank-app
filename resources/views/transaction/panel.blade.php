<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

            </a>
        </x-slot>
        <h2 class="text-4xl font-bold text-center">Przelew normalny</h2>
        <br>
        <h6 class="text-xl font-bold text-left">Saldo: {{$account->balance}} {{ $account->currency }}</h6>
        <h6 class="text-xl font-bold text-left">Numer rachunku: {{ $account->account_number}}</h6>
        <br>
        <form method="POST" action=" {{ route('transaction.post') }}">
            @csrf
            <!-- Tytul -->
            <div>
                <x-input-label for="title" :value="__('Tytuł przelewu')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Kwota -->
            <div>
                <x-input-label for="amount" :value="__('Kwota')" />
                <x-text-input id="amount" class="block mt-1 w-full" type="text" placeholder="format: 00.00" pattern="^[0-9]+(\.[0-9]{1,2})?$" name="amount" :value="old('amount')" required autofocus />
                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            </div>

            <!-- Numer kontana jaki przelewamy -->
            <div>
                <x-input-label for="tonumberaccount" :value="__('Numer konta na jaki chcemy przelać pieniądze')" />
                <x-text-input id="tonumberaccount" class="block mt-1 w-full" type="text" name="tonumberaccount" :value="old('tonumberaccount')" required autofocus />
                <x-input-error :messages="$errors->get('tonumberaccount')" class="mt-2" />
            </div>

            <input type="hidden" name="t_id" value="{{$account->id_account}}">
            <br>

            @if (isset($failed_account))
                <div class="bg-red-600 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{{ $failed_account }}</li>
                    </ul>
                </div>
            @endif

            @if (isset($failed_amount))
                <div class="bg-red-600 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{{ $failed_amount }}</li>
                    </ul>
                </div>
            @endif

            @if (isset($not_found))
                <div class="bg-red-600 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{{ $not_found }}</li>
                    </ul>
                </div>
            @endif

            <div class="text-center text-white text-4xl bg-emerald-600 shadow">
                <a href="{{ route('transaction.post', ['account_id' => $account->id_account]) }}"><button>Przelej</button></a>
            </div>

        </form>

        <div class="block mt-8">
            <h7 class="text-xl text-center"><a href="{{route('show.accounts')}}">POWRÓT</a></h7>
        </div>

    </x-auth-card>
</x-guest-layout>
