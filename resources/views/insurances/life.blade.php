<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

            </a>
        </x-slot>

        <div class="items-center mx-auto justify-center">
            <img src="{{URL::asset('logo/life.png')}}" class="mx-auto" alt="profile Pic" height="200" width="200">
        </div>


        <h2 class="text-4xl font-bold text-center mb-3">Ubezpieczenie na życie</h2>
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
        <form method="POST" action="{{ route('life.calculations') }}">
            @csrf

            <!-- Data urodzenia -->
            <div>
                <x-input-label for="age" :value="__('Data urodzenia (y-m-d)')" />
                <x-text-input id="age" name="age" type="date" class="mt-1 block w-full" :value="old('birth_date', Auth::user()->birth_date)" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('age')" class="mt-2" />
            </div>

            <!-- Plec -->
            <div>
                <x-input-label for="gender" :value="__('Płeć')" />
                <!--<x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required autofocus /> -->
                <select name="gender" id="gender">
                    <option value="">--Wybierz płeć--</option>
                    <option value="Kobieta">Kobieta</option>
                    <option value="Mezczyzna">Mężczyzna</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="earnings" :value="__('Zarobki w PLN')" />
                <x-text-input id="earnings" class="block mt-1 w-full" type="text" name="earnings" placeholder="np. 4500" :value="old('earnings')" required autofocus />
                <x-input-error :messages="$errors->get('earnings')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="profesion" :value="__('Zawód')" />
                <!--<x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required autofocus /> -->
                <select name="profesion" id="profesion">
                    <option value="">--Wybierz zawód--</option>
                    <option value="Spawacz">Spawacz</option>
                    <option value="Kierowca">Kierowca</option>
                    <option value="Informatyk">Informatyk</option>
                    <option value="Lekarz">Lekarz</option>
                    <option value="Sprzedawca">Sprzedawca</option>
                </select>
                <x-input-error :messages="$errors->get('profesion')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="status" :value="__('Status społeczny')" />
                <!--<x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required autofocus /> -->
                <select name="status" id="status">
                    <option value="">--Status--</option>
                    <option value="Student">Student</option>
                    <option value="Pracujacy">Pracujący</option>
                    <option value="Emeryt">Emeryt</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="sum_ins" :value="__('Suma ubezpieczenia')" />
                <!--<x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required autofocus /> -->
                <select name="sum_ins" id="sum_ins">
                    <option value="">--Suma na jaką chcemy sie ubezpieczyć--</option>
                    <option value="20000">20000</option>
                    <option value="50000">50000</option>
                    <option value="100000">100000</option>
                    <option value="150000">150000</option>
                    <option value="200000">200000</option>
                </select>
                <x-input-error :messages="$errors->get('profesion')" class="sum_ins-2" />
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
