<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    @if($x != true)


    @elseif($x == true)

        <div class="py-6">
            <div class="max-w-7xl sm:w-auto md:w-auto lg:w-auto mx-auto sm:px-6 lg:px-8">
                <div class="bg-emerald-900 mx-auto w-4/12 rounded text-center overflow-hidden shadow-amber-700 sm:rounded-lg">
                    <div class="p-6 text-xl text-white">
                        <a href="{{ route('show.app') }}">Aplikuj o kredyt!</a>
                    </div>
                </div>
            </div>
        </div>

        <hr class="w-auto h-1 mt-2 bg-gray-300 opacity-50" />

        <div class="py-6">
            <div class="max-w-3xl sm:w-auto md:w-auto lg:w-auto mx-auto sm:px-6 lg:px-8">
                <div class="bg-emerald-900 mx-auto w-4/12 rounded text-center overflow-hidden shadow-amber-700 sm:rounded-lg">
                    <div class="p-6 text-xl text-white">
                        <a href="{{ route('show.credits') }}">Historia kredytowa</a>
                    </div>
                </div>
            </div>
        </div>

    @else

        <div class="py-12">
            <div class="max-w-7xl sm:w-auto md:w-auto lg:w-auto mx-auto sm:px-6 lg:px-8">
                <div class="bg-emerald-900 mx-auto w-4/12 rounded text-center overflow-hidden shadow-amber-700 sm:rounded-lg">
                    <div class="p-6 text-xl text-white">
                        Aby aplikować o kredyt musisz posiadać konto główne.
                    </div>
                </div>
            </div>
        </div>

    @endif

    <hr class="w-auto h-1 mt-2 bg-gray-300 opacity-50" />

    @foreach($k as $dupa)
        @foreach($det as $d)

            @if($d->status == 'during')
        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-pink-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                            <div class="text-white text-5xl font-bold text-center">KREDYT</div>
                            <hr>
                            <div class="text-center mt-8 mb-6 text-white text-xl"><label>Numer konta: {{ $dupa->account_number }}</label></div>
                            <div class="text-center text-white mb-6 text-xl">Informacje:</div>
                            <div class="text-white mb-3 text-center">Kwota kredytu: {{ $d->credit_amount }} PLN</div>
                            <div class="text-white mb-3 text-center">Typ umowy: @if($d->type == "UOP") UMOWA O PRACE @else UMOWA ZLECENIE @endif</div>
                            <div class="text-white mb-3 text-center">Liczba rat: {{ $d->total_rates }}</div>
                            <div class="text-white mb-3 text-2xl text-center">Rata wynosi: {{ $d->one_rate }} PLN</div>
                            <div class="text-white mb-3 text-center">Płatne do {{ $d->day_to_pay }} dnia każdego miesiąca.</div>
                            <div class="text-white mb-3 text-center">Koniec kredytu: {{ $d->end_credit }} </div>

                        <div class="text-4xl mt-8 mb-8 text-white text-center">Pozostało do spłaty: {{ $d->credit_left }} PLN <!-- This button is used to open the dialog -->
                            <button id="open" class="py-2 hover:bg-gray-300 text-black cursor-pointer rounded-md">
                                <img src="{{URL::asset('logo/info.png')}}" class="mx-auto" alt="profile Pic" height="30" width="30">
                            </button>

                            <!-- Overlay element -->
                            <div id="overlay" class="fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60"></div>

                            <!-- The dialog -->
                            <div id="dialog"
                                 class="hidden fixed z-50 text-black top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
                                <h1 class="text-2xl text-black font-semibold">Karty wirtualne</h1>
                                <div class="py-5 text-sm text-black border-t border-b border-gray-300">
                                    <p>Liczba rat: {{ $d->total_rates }}</p>
                                    <br>
                                    <p class="text-red-600">Pozostało rat: {{ $d->rates_left }}</p>
                                    <br>
                                    <p class="text-green-600">Zapłacono rat: {{ abs($d->total_rates-$d->rates_left) }} </p>
                                    <br>
                                    <p>Karty mają ważność 4 lat.</p>
                                </div>
                                <div class="flex justify-end">
                                    <!-- This button is used to close the dialog -->
                                    <button id="close" class="px-5 py-2 text-xl bg-indigo-500 hover:bg-indigo-700 text-white cursor-pointer rounded-md">
                                        Zamknij</button>
                                </div>
                            </div></div>

                        <form method="POST" action="{{ route('credit.payment') }}">
                            @csrf

                            <input type="hidden" name="credit_left" value="{{ $d->credit_left }}">
                            <input type="hidden" name="amount" value="{{ $d->one_rate }}">
                            <input type="hidden" name="credit_amount" value="{{ $d->credit_amount }}">
                            <input type="hidden" name="total_rates" value="{{ $d->total_rates }}">
                            <input type="hidden" name="end_credit" value="{{ $d->end_credit }}">
                            <input type="hidden" name="one_rate" value="{{ $d->one_rate }}">
                            <input type="hidden" name="id" value="{{ $d->id_credit }}">
                            <input type="hidden" name="CRE" value="CREDIT">

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="mx-auto">
                                    {{ __('Zapłać ratę kredytu') }}
                                </x-primary-button>
                            </div>

                        </form>
                        @else
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
            @break(1)
        @endforeach


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

</x-app-layout>
