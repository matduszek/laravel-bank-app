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

            <!-- This button is used to open the dialog -->
            <button id="open" class="py-2 hover:bg-gray-300 text-black cursor-pointer rounded-md">
                <img src="{{URL::asset('logo/info.png')}}" class="mx-auto" alt="profile Pic" height="30" width="30">
            </button>

            <!-- Overlay element -->
            <div id="overlay" class="fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60"></div>

            <!-- The dialog -->
            <div id="dialog"
                 class="hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
                <h1 class="text-2xl font-semibold">Hasło</h1>
                <div class="py-5 border-t border-b border-gray-300">
                    <p>Hasło musi posiadać złożoność 8 znaków.</p>
                    <br>
                    <p>Powtórzone hasło musi być takie samo jak sekcja 'Hasło'.</p>
                </div>
                <div class="flex justify-end">
                    <!-- This button is used to close the dialog -->
                    <button id="close" class="px-5 py-2 bg-indigo-500 hover:bg-indigo-700 text-white cursor-pointer rounded-md">
                        Zamknij</button>
                </div>
            </div>


            <!-- Haslo -->
            <div>
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

            <!-- This button is used to open the dialog -->
            <button id="open2" class="py-2 hover:bg-gray-300 text-black cursor-pointer rounded-md">
                <img src="{{URL::asset('logo/info.png')}}" class="mx-auto" alt="profile Pic" height="30" width="30">
            </button>

            <!-- Overlay element -->
            <div id="overlay2" class="fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60"></div>

            <!-- The dialog -->
            <div id="dialog2"
                 class="hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
                <h1 class="text-2xl font-semibold">Pesel</h1>
                <div class="py-5 border-t border-b border-gray-300">
                    <p>Pesel musi posiadać złożoność 11 cyfr.</p>
                </div>
                <div class="flex justify-end">
                    <!-- This button is used to close the dialog -->
                    <button id="close2" class="px-5 py-2 bg-indigo-500 hover:bg-indigo-700 text-white cursor-pointer rounded-md">
                        Zamknij</button>
                </div>
            </div>

            <!-- Pesel -->
            <div>
                <x-input-label for="pesel" :value="__('Pesel')" />
                <x-text-input id="pesel" class="block mt-1 w-full" type="text" name="pesel" :value="old('pesel')" required autofocus />
                <x-input-error :messages="$errors->get('pesel')" class="mt-2" />
            </div>

            <!-- This button is used to open the dialog -->
            <button id="open3" class="py-2 hover:bg-gray-300 text-black cursor-pointer rounded-md">
                <img src="{{URL::asset('logo/info.png')}}" class="mx-auto" alt="profile Pic" height="30" width="30">
            </button>

            <!-- Overlay element -->
            <div id="overlay3" class="fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60"></div>

            <!-- The dialog -->
            <div id="dialog3"
                 class="hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
                <h1 class="text-2xl font-semibold">Numer i seria dowodu osobistego.</h1>
                <div class="py-5 border-t border-b border-gray-300">
                    <p>Numer i seria dowodu osobistego musi posiadać złożoność 3 liter i 6 cyfr np. AAC112233.</p>
                </div>
                <div class="flex justify-end">
                    <!-- This button is used to close the dialog -->
                    <button id="close3" class="px-5 py-2 bg-indigo-500 hover:bg-indigo-700 text-white cursor-pointer rounded-md">
                        Zamknij</button>
                </div>
            </div>

            <!-- Numer indentyfikacyjny dowodu -->
            <div>
                <x-input-label for="icn" :value="__('Numer i seria dowodu')" />
                <x-text-input id="icn" class="block mt-1 w-full" type="text" name="icn" :value="old('icn')" required autofocus />
                <x-input-error :messages="$errors->get('icn')" class="mt-2" />
            </div>

            <!-- Plec -->
            <div class="mt-4">
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
            <div class="mt-4">
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

            <!-- This button is used to open the dialog -->
            <button id="open4" class="py-2 hover:bg-gray-300 text-black cursor-pointer rounded-md">
                <img src="{{URL::asset('logo/info.png')}}" class="mx-auto" alt="profile Pic" height="30" width="30">
            </button>

            <!-- Overlay element -->
            <div id="overlay4" class="fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60"></div>

            <!-- The dialog -->
            <div id="dialog4"
                 class="hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
                <h1 class="text-2xl font-semibold">Numer telefonu</h1>
                <div class="py-5 border-t border-b border-gray-300">
                    <p>W naszym banku dopuszczamy jedynie polskie numery 9 cyfrowe.</p>
                    <br>
                    <p>Podany numer nie musi zawierać telefonicznego kodu kraju (+48).</p>
                    <br>
                    <p>Przykład 500190300.</p>
                </div>
                <div class="flex justify-end">
                    <!-- This button is used to close the dialog -->
                    <button id="close4" class="px-5 py-2 bg-indigo-500 hover:bg-indigo-700 text-white cursor-pointer rounded-md">
                        Zamknij</button>
                </div>
            </div>

            <!-- Numer telefonu -->
            <div>
                <x-input-label for="phone_number" :value="__('Telefon kontaktowy')" />
                <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required autofocus />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>

            <!-- Miasto -->
            <div class="mt-4">
                <x-input-label for="city" :value="__('Miasto')" />
                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus />
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>

            <!-- Kod pocztowy -->
            <div class="mt-4">
                <x-input-label for="postal_code" :value="__('Kod pocztowy')" />
                <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" :value="old('postal_code')" required autofocus />
                <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
            </div>

            <!-- Adres zamieszkania -->
            <div class="mt-4">
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

        <script>
            var openButton = document.getElementById('open');
            var dialog = document.getElementById('dialog');
            var closeButton = document.getElementById('close');
            var overlay = document.getElementById('overlay');

            // show the overlay and the dialog
            openButton.addEventListener('click', function () {
                dialog.classList.remove('hidden');
                overlay.classList.remove('hidden');
            });

            // hide the overlay and the dialog
            closeButton.addEventListener('click', function () {
                dialog.classList.add('hidden');
                overlay.classList.add('hidden');
            });
        </script>

        <script>
            var openButton2 = document.getElementById('open2');
            var dialog2 = document.getElementById('dialog2');
            var closeButton2 = document.getElementById('close2');
            var overlay2 = document.getElementById('overlay2');

            // show the overlay and the dialog
            openButton2.addEventListener('click', function () {
                dialog2.classList.remove('hidden');
                overlay2.classList.remove('hidden');
            });

            // hide the overlay and the dialog
            closeButton2.addEventListener('click', function () {
                dialog2.classList.add('hidden');
                overlay2.classList.add('hidden');
            });
        </script>

        <script>
            var openButton3 = document.getElementById('open3');
            var dialog3 = document.getElementById('dialog3');
            var closeButton3 = document.getElementById('close3');
            var overlay3 = document.getElementById('overlay3');

            // show the overlay and the dialog
            openButton3.addEventListener('click', function () {
                dialog3.classList.remove('hidden');
                overlay3.classList.remove('hidden');
            });

            // hide the overlay and the dialog
            closeButton3.addEventListener('click', function () {
                dialog3.classList.add('hidden');
                overlay3.classList.add('hidden');
            });
        </script>

        <script>
            var openButton4 = document.getElementById('open4');
            var dialog4 = document.getElementById('dialog4');
            var closeButton4 = document.getElementById('close4');
            var overlay4 = document.getElementById('overlay4');

            // show the overlay and the dialog
            openButton4.addEventListener('click', function () {
                dialog4.classList.remove('hidden');
                overlay4.classList.remove('hidden');
            });

            // hide the overlay and the dialog
            closeButton4.addEventListener('click', function () {
                dialog4.classList.add('hidden');
                overlay4.classList.add('hidden');
            });
        </script>

    </x-auth-card>
</x-guest-layout>
