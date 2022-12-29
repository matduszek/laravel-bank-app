<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

            </a>
        </x-slot>

        <div class="items-center mx-auto justify-center">
            <img src="{{URL::asset('logo/credit-card.png')}}" class="mx-auto" alt="profile Pic" height="200" width="200">
        </div>


        <h2 class="text-4xl font-bold text-center mb-3">Aplikuj o kredyt</h2>
        <h6 class="text-xl font-bold text-center mb-3">Postaraj się nawet o 200 tys.!</h6>
        <h6 class="text-xl font-bold text-center mb-1">RRSO 0%</h6>
        <br>
        <form method="POST" action="{{ route('decision.panel') }}">
            @csrf

            <!-- Kwota -->
            <div>
                <x-input-label for="amount" :value="__('Kwota kredytu o jaką sie ubiegasz w PLN')" />
                <x-text-input id="amount" class="block mt-1 w-full" type="text" name="amount" placeholder="np. 400000" :value="old('amount')" required autofocus />
                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            </div>

            <!-- Zarobki -->
            <div>
                <x-input-label for="earnings" :value="__('Średnie zarobki przez okres ostatnich 6 miesiecy')" />
                <x-text-input id="earnings" class="block mt-1 w-full" type="text" name="earnings" placeholder="np. 4300" :value="old('earnings')" required autofocus />
                <x-input-error :messages="$errors->get('earnings')" class="mt-2" />
            </div>

            <!-- Typ umowy -->
            <div>
                <x-input-label for="type" :value="__('Typ umowy')" />
                <!--<x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required autofocus /> -->
                <select name="type" id="type">
                    <option value="">--UOP/UZ--</option>
                    <option value="UOP">Umowa o pracę</option>
                    <option value="UZ">Umowa zlecenie</option>
                </select>
                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>

            <!-- Ile juz pracujemy na tej umowie -->
            <div>
                <x-input-label for="length" :value="__('Ile juz pracujemy na podanej umowie (msc)')" />
                <x-text-input id="length" class="block mt-1 w-full" type="text" name="length" placeholder="np. 60" :value="old('length')" required autofocus />
                <x-input-error :messages="$errors->get('length')" class="mt-2" />
            </div>

            <!-- Dlugosc kredytu -->
            <div>
                <x-input-label for="credit_length" :value="__('Okres na jaki chcemy wziąć kredyt (msc)')" />
                <x-text-input id="credit_length" class="block mt-1 w-full" type="text" name="credit_length" placeholder="np. 60" :value="old('credit_length')" required autofocus />
                <x-input-error :messages="$errors->get('credit_length')" class="mt-2" />
            </div>

            @if (\Session::has('low_earnings'))
                <div class="bg-red-600 mt-8 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{!! \Session::get('low_earnings') !!}</li>
                    </ul>
                </div>
            @endif

            @if (\Session::has('high_amount'))
                <div class="bg-red-600 mt-8 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{!! \Session::get('high_amount') !!}</li>
                    </ul>
                </div>
            @endif

            @if (\Session::has('success'))
                <div class="bg-green-600 mt-8 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif

            @if (\Session::has('failed'))
                <div class="bg-red-600 mt-8 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{!! \Session::get('failed') !!}</li>
                    </ul>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Aplikuj') }}
                </x-primary-button>
            </div>
        </form>
        <div class="block mt-8">
            <a href="{{ route('credit.panel') }}">POWRÓT</a>
        </div>
    </x-auth-card>
</x-guest-layout>
