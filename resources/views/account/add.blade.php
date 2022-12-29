<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <h2 class="text-4xl mb-6 font-bold text-center">Dodaj konto</h2>
        <form method="POST" action="{{ route('account.save') }}">
            @csrf

            <!-- Typ konta -->
            <div>
                <x-input-label for="type" :value="__('Typ konta')" />
                <select name="type" id="type">
                    <option value=""></option>
                    <option value="N">Normalne</option>
                    <option value="S">Oszczednosciowe</option>
                    <option value="CA">Walutowe</option>
                </select>
                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>

            <!-- Waluta -->
            <div>
                <x-input-label for="currency" :value="__('Waluta')" />
                <select name="currency" id="currency">
                    <option value=""></option>
                    <option value="PLN">POLSKI ZŁOTY</option>
                    <option value="EUR">EURO</option>
                    <option value="GBP">FUNT BRYTYJSKI</option>
                    <option value="CHF">FRANK SZWAJCARSKI</option>
                    <option value="USD">DOLAR AMERYKAŃSKI</option>
                </select>
                <x-input-error :messages="$errors->get('currency')" class="mt-2" />
            </div>

            @if (\Session::has('can_not'))
                <div class="bg-red-600 mt-5 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{!! \Session::get('can_not') !!}</li>
                    </ul>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Utwórz') }}
                </x-primary-button>
            </div>
        </form>
        <div class="block mt-8">
            <h7 class="text-xl text-center"><a href="{{ route('dashboard') }}">POWRÓT</a></h7>
        </div>
    </x-auth-card>
</x-guest-layout>
