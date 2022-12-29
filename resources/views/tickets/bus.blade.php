<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

            </a>
        </x-slot>

        <div class="items-center mx-auto justify-center">
            <img src="{{URL::asset('logo/bus.png')}}" class="mx-auto" alt="profile Pic" height="200" width="200">
        </div>


        <h2 class="text-4xl font-bold text-center mb-3">Bilet miejski</h2>
        <br>
        <form method="POST" action="{{ route('bus.calculations') }}">
            @csrf

            <div>
                <x-input-label for="city" :value="__('Miasto')" />
                <!--<x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required autofocus /> -->
                <select name="city" id="city">
                    <option value="">--Wybierz markę--</option>
                    <option value="Jelenia Góra">Jelenia Góra</option>
                </select>
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>

            <!-- Data urodzenia -->
            <div>
                <x-input-label for="type" :value="__('Typ biletu')" />
                <!--<x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required autofocus /> -->
                <select name="type" id="type">
                    <option value="">--Wybierz typ--</option>
                    <option value="Normalny">Normalny</option>
                    <option value="Ulgowy">Ulgowy</option>
                </select>
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="time" :value="__('Czas biletu')" />
                <!--<x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required autofocus /> -->
                <select name="time" id="time">
                    <option value="">--Wybierz okres--</option>
                    <option value="15">15-minutowy</option>
                    <option value="30">30-minutowy</option>
                    <option value="1">1-godzinny</option>
                    <option value="24">24-godzinny</option>
                </select>
                <x-input-error :messages="$errors->get('time')" class="mt-2" />
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
