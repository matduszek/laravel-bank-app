<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

            </a>
        </x-slot>

        <div class="items-center mx-auto justify-center">
            <img src="{{URL::asset('logo/car.png')}}" class="mx-auto" alt="profile Pic" height="200" width="200">
        </div>


        <h2 class="text-4xl font-bold text-center mb-3">Ubezpieczenie OC</h2>
        <h6 class="text-2xl font-bold text-center mb-3">Na okres: 1 rok</h6>
        <br>
        <form method="POST" action="{{ route('car.calculations') }}">
            @csrf

            <div>
                <x-input-label for="brand" :value="__('Marka auta')" />
                <!--<x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required autofocus /> -->
                <select name="brand" id="brand">
                    <option value="">--Marka--</option>
                    <option value="Seat">Seat</option>
                    <option value="Audi">Audi</option>
                    <option value="BMW">BMW</option>
                    <option value="Mercedes">Mercedes Benz</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="cap" :value="__('Pojemność silnika')" />
                <x-text-input id="cap" class="block mt-1 w-full" type="text" name="cap" placeholder="np. 1.4" :value="old('cap')" required autofocus />
                <x-input-error :messages="$errors->get('cap')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="value" :value="__('Wartość auta w PLN')" />
                <x-text-input id="value" class="block mt-1 w-full" type="text" name="value" placeholder="np. 45000" :value="old('value')" required autofocus />
                <x-input-error :messages="$errors->get('value')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="kilometers" :value="__('Przebieg w KM')" />
                <x-text-input id="kilometers" class="block mt-1 w-full" type="text" name="kilometers" placeholder="np. 180000" :value="old('kilometers')" required autofocus />
                <x-input-error :messages="$errors->get('kilometers')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="rejestracja" :value="__('Rejestracja')" />
                <x-text-input id="rejestracja" class="block mt-1 w-full" type="text" name="rejestracja" placeholder="np. WA00000" :value="old('rejestracja')" required autofocus />
                <x-input-error :messages="$errors->get('rejestracja')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="production" :value="__('Rok produkcji')" />
                <x-text-input id="production" class="block mt-1 w-full" type="text" name="production" placeholder="np. 2015" :value="old('production')" required autofocus />
                <x-input-error :messages="$errors->get('production')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="id_car" :value="__('Prawo jazdy od lat: ')" />
                <x-text-input id="id_car" class="block mt-1 w-full" type="text" name="id_car" placeholder="Wartości od wyrażone w latach np. 3" :value="old('id_car')" required autofocus />
                <x-input-error :messages="$errors->get('id_car')" class="mt-2" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Sprawdź ofertę') }}
                </x-primary-button>
            </div>
        </form>
        <div class="block mt-8">
            <a href="{{route('insurance.panel')}}">POWRÓT</a>
        </div>
    </x-auth-card>
</x-guest-layout>
