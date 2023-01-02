<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <h2 class="text-4xl mb-6 font-bold text-center">Dodaj konto</h2>

        <!-- This button is used to open the dialog -->
        <button id="open" class="py-2 hover:bg-gray-300 text-black cursor-pointer rounded-md">
            <img src="{{URL::asset('logo/info.png')}}" class="mx-auto" alt="profile Pic" height="30" width="30">
        </button>

        <!-- Overlay element -->
        <div id="overlay" class="fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60"></div>

        <!-- The dialog -->
        <div id="dialog"
             class="hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
            <h1 class="text-2xl font-semibold">Rachunki bankowe</h1>
            <div class="py-5 border-t border-b border-gray-300">
                <p>Pierwsze konto musi być normalne z walutą PLN.</p>
                <br>
                <p>Przy otworzonym pierwszym koncie, kolejne rachunki bankowe będą mogłby być walutowe oraz oszczędnościowe.</p>
            </div>
            <div class="flex justify-end">
                <!-- This button is used to close the dialog -->
                <button id="close" class="px-5 py-2 bg-indigo-500 hover:bg-indigo-700 text-white cursor-pointer rounded-md">
                    Zamknij</button>
            </div>
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

        @if($x == true)
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
            @else
                <form method="POST" action="{{ route('account.save') }}">
                    @csrf
                    <!-- Typ konta -->
                    <div>
                        <x-input-label for="type" :value="__('Typ konta')" />
                        <select name="type" id="type">
                            <option value=""></option>
                            <option value="N">Normalne</option>
                        </select>
                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>

                    <!-- Waluta -->
                    <div>
                        <x-input-label for="currency" :value="__('Waluta')" />
                        <select name="currency" id="currency">
                            <option value=""></option>
                            <option value="PLN">POLSKI ZŁOTY</option>
                        </select>
                        <x-input-error :messages="$errors->get('currency')" class="mt-2" />
                    </div>
                    @endif

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
