<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

            </a>
        </x-slot>

        <div class="items-center mx-auto justify-center">
            <img src="{{URL::asset('logo/road.png')}}" class="mx-auto" alt="profile Pic" height="200" width="200">
        </div>


        <h2 class="text-4xl font-bold text-center mb-3">Opłata za autostradę</h2>
        <br>
        <form method="POST" action="{{ route('road.calculations') }}">
            @csrf

            <div>
                <x-input-label for="rejestracja" :value="__('Rejestracja')" />
                <x-text-input id="rejestracja" class="block mt-1 w-full" type="text" name="rejestracja" placeholder="np. WA00000" :value="old('rejestracja')" required autofocus />
                <x-input-error :messages="$errors->get('rejestracja')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="road" :value="__('Autostrada')" />
                <!--<x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required autofocus /> -->
                <select name="road" id="road">
                    <option value="">--Wybierz odcinek--</option>
                    <option value="A1o1">Toruń - Gdańsk 152km 29,90 PLN</option>
                    <option value="A2o1">Konin - Świecko 252km 93,00 PLN</option>
                    <option value="A2o2">Konin - Stryków 99km 9,90 PLN</option>
                    <option value="A3o1">Wrocław - Sośnice 160km 16,20 PLN</option>
                    <option value="A3o2">Katowice - Kraków 61km 24,00 PLN</option>
                </select>
                <x-input-error :messages="$errors->get('road')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Zakup') }}
                </x-primary-button>
            </div>

        </form>
        <div class="block mt-8">
            <a href="{{route('show.tickets')}}">POWRÓT</a>
        </div>
    </x-auth-card>
</x-guest-layout>
