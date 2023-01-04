<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

            </a>
        </x-slot>

        <div class="items-center mx-auto justify-center">
            <img src="{{URL::asset('logo/town.png')}}" class="mx-auto" alt="profile Pic" height="200" width="200">
        </div>


        <h2 class="text-4xl font-bold text-center mb-3">Ubezpieczenie na nieruchomość</h2>
        <h6 class="text-2xl font-bold text-center mb-3">Na okres: 1 rok</h6>

        <!-- component -->
        <div class="max-w-xl mx-auto my-4 border-b-2 pb-4">
            <div class="flex pb-3">
                <div class="flex-1">
                </div>

                <div class="flex-1">
                    <div class="w-10 h-10 bg-green-500 mx-auto rounded-full text-lg text-white flex items-center">
                        <span class="text-white text-center w-full"><i class="fa fa-check w-full fill-current white">1</i></span>
                    </div>
                </div>


                <div class="w-1/6 align-center items-center align-middle content-center flex">
                    <div class="w-full bg-green-500 rounded items-center align-middle align-center flex-1">
                        <div class="bg-green-light text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 100%"></div>
                    </div>
                </div>


                <div class="flex-1">
                    <div class="w-10 h-10 bg-gray-400 mx-auto rounded-full text-lg text-white flex items-center">
                        <span class="text-white text-center w-full"><i class="fa fa-check w-full fill-current white">2</i></span>
                    </div>
                </div>

                <div class="w-1/6 align-center items-center align-middle content-center flex">
                    <div class="w-full bg-gray-400 rounded items-center align-middle align-center flex-1">
                        <div class="bg-green-light text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 20%"></div>
                    </div>
                </div>

                <div class="flex-1">
                    <div class="w-10 h-10 bg-gray-400 mx-auto rounded-full text-lg text-white flex items-center">
                        <span class="text-white text-center w-full"><i class="fa fa-check w-full fill-current white">3</i></span>
                    </div>
                </div>

                <div class="flex-1">
                </div>
            </div>

            <div class="flex text-xs content-center text-center">
                <div class="w-1/3">
                    Formularz
                </div>

                <div class="w-1/3">
                    Potwierdzenie
                </div>

                <div class="w-1/3">
                    Płatność
                </div>
            </div>
        </div>

        <br>
        <form method="POST" action="{{ route('property.calculations') }}">
            @csrf

            <!-- Data urodzenia -->
            <div>
                <x-input-label for="type" :value="__('Typ nieruchomości')" />
                <!--<x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required autofocus /> -->
                <select name="type" id="type">
                    <option value="">--Wybierz typ nieruchomości--</option>
                    <option value="Mieszkanie">Mieszkanie</option>
                    <option value="Dom">Dom</option>
                    <option value="Dzialka">Działka</option>
                </select>
                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>

            <!-- Plec -->
            <div>
                <x-input-label for="value" :value="__('Wartość nieruchomości PLN')" />
                <x-text-input id="value" name="value" type="text" class="mt-1 block w-full" placeholder="np. 320000" :value="old('value')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('value')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="city" :value="__('Miasto')" />
                <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" placeholder="np. Jelenia Góra" :value="old('city')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="domicile" :value="__('Adres')" />
                <x-text-input id="domicile" name="domicile" type="text" class="mt-1 block w-full" placeholder="np. Przemysłowa 11" :value="old('domicile')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('domicile')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="m2" :value="__('Metraż m2')" />
                <x-text-input id="m2" class="block mt-1 w-full" type="text" name="m2" placeholder="np. 65" :value="old('m2')" required autofocus />
                <x-input-error :messages="$errors->get('m2')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="location" :value="__('Lokalizacja')" />
                <!--<x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required autofocus /> -->
                <select name="location" id="location">
                    <option value="">--Wybierz lokalizację--</option>
                    <option value="Wies">Wieś</option>
                    <option value="Miasto">Miasto</option>
                </select>
                <x-input-error :messages="$errors->get('location')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="year" :value="__('Rok budowy')" />
                <x-text-input id="year" name="year" type="text" class="mt-1 block w-full" placeholder="np. 2010" :value="old('year')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('year')" class="mt-2" />
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
