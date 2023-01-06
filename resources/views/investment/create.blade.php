<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <h2 class="text-4xl mb-6 font-bold text-center">Utwórz lokatę</h2>
        <h2 class="text-4xl mb-6 font-bold text-center">Lokata 4% w skali rocznej</h2>

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


            <form method="POST" action="{{ route('investment.save') }}">
                @csrf
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Utwórz') }}
                        </x-primary-button>
                    </div>
            </form>

        <div class="block mt-8">
            <h7 class="text-xl text-center"><a href="{{ route('show.investments') }}">POWRÓT</a></h7>
        </div>

    </x-auth-card>
</x-guest-layout>
