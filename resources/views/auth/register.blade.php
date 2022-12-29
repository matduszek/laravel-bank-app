<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <h2 class="text-4xl font-bold mb-3 text-center">Panel rejestracji</h2>
        <h2 class="text-sm font-bold mb-5 text-center">Aby założyć konto musisz mieć 18 lat.</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Imie -->
            <div>
                <x-input-label for="name" :value="__('Imie')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Nazwisko -->
            <div>
                <x-input-label for="surname" :value="__('Nazwisko')" />
                <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus />
                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Data urodzenia -->
            <div class="mt-4">
                <x-input-label for="birth_date" :value="__('Data urodzenia [dzien/miesiac/rok]')" />
                <x-text-input id="email" class="block mt-1 w-full" type="date" name="birth_date" :value="old('birth_date')" required />
                <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
            </div>

            <!-- Haslo -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Hasło')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Potwierdzenie hasla -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Powtórz hasło')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Pesel -->
            <div>
                <x-input-label for="pesel" :value="__('Pesel')" />
                <x-text-input id="pesel" class="block mt-1 w-full" type="text" name="pesel" :value="old('pesel')" required autofocus />
                <x-input-error :messages="$errors->get('pesel')" class="mt-2" />
            </div>

            <!-- Numer indentyfikacyjny dowodu -->
            <div>
                <x-input-label for="icn" :value="__('Numer i seria dowodu')" />
                <x-text-input id="icn" class="block mt-1 w-full" type="text" name="icn" :value="old('icn')" required autofocus />
                <x-input-error :messages="$errors->get('icn')" class="mt-2" />
            </div>

            <!-- Plec -->
            <div>
                <x-input-label for="gender" :value="__('Płec K/M')" />
                <!--<x-text-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="old('gender')" required autofocus />-->
                <select class="form-control" name="gender" id="gender">
                    <option value="">--Wybierz płeć--</option>
                    <option value="K">K</option>
                    <option value="M">M</option>
                    </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <!-- Obywatelstwo -->
            <div>
                <x-input-label for="citizenship" :value="__('Obywatelstwo (PL)')" />
                <!--<x-text-input id="citizenship" class="block mt-1 w-full" type="text" name="citizenship" :value="old('citizenship')" required autofocus /> -->
                <select class="form-control" name="citizenship" id="citizenship">
                    <option value="">--Wybierz obywatelstwo--</option>
                    <option value="PL">Polskie</option>
                    <option value="DE">Niemieckie</option>
                    <option value="FR">Francuskie</option>
                    <option value="ChRL">Chińskie</option>
                </select>
                <x-input-error :messages="$errors->get('citizenship')" class="mt-2" />
            </div>

            <!-- Numer telefonu -->
            <div>
                <x-input-label for="phone_number" :value="__('Telefon kontaktowy')" />
                <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required autofocus />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>

            <!-- Miasto -->
            <div>
                <x-input-label for="city" :value="__('Miasto')" />
                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus />
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>

            <!-- Kod pocztowy -->
            <div>
                <x-input-label for="postal_code" :value="__('Kod pocztowy')" />
                <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" :value="old('postal_code')" required autofocus />
                <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
            </div>

            <!-- Adres zamieszkania -->
            <div>
                <x-input-label for="domicile" :value="__('Adres zamieszkania')" />
                <x-text-input id="domicile" class="block mt-1 w-full" type="text" name="domicile" :value="old('domicile')" required autofocus />
                <x-input-error :messages="$errors->get('domicile')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Posiadasz konto?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Zarejestruj się') }}
                </x-primary-button>
            </div>
        </form>
        <div class="block mt-8">
            <h7 class="text-xl text-center"><a href="{{ route('main') }}">POWRÓT</a></h7>
        </div>
    </x-auth-card>
</x-guest-layout>
