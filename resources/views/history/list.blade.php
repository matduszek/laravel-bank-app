<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-emerald-900 text-white text-center rounded mx-auto mt-4 w-2/3 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    {{ __("TWOJE TRANSAKCJE WYCHODZĄCE") }}
                </div>
            </div>
        </div>
    </div>

    <div class="text-4xl mt-8 mb-8 text-center">
        <button id="open" class="py-2 hover:bg-gray-300 text-black cursor-pointer rounded-md">
            <div class="inline text-xl">Jak wygenerować pdf przy potwierdzeniu? <img src="{{URL::asset('logo/pdf.png')}}" class="mx-auto" alt="profile Pic" height="30" width="30"></div>
        </button>

        <!-- Overlay element -->
        <div id="overlay" class="fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60"></div>

        <!-- The dialog -->
        <div id="dialog"
             class="hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
            <div class="py-5 text-sm border-t border-b border-gray-300">
                <p>Kliknij w pole 'generuj potwierdzenie', nastepnie na nowej stronie wybierz pole 'Wydrukuj'</p>
                <br>
                <p>Kliknij na pole 'Urządzenie docelowe'/'Drukarka', wybierz 'Zapisz jako PDF' i kliknij zapisz.</p>
                <br>
                <p>Wskaż miejsce na które ma zostać zapisany pdf i zapisz.</p>
                <br>
                <p>Wersja Windows 10/11.</p>
            </div>
            <div class="flex justify-end">
                <!-- This button is used to close the dialog -->
                <button id="close" class="px-5 py-2 text-xl bg-indigo-500 hover:bg-indigo-700 text-white cursor-pointer rounded-md">
                    Zamknij</button>
            </div>
        </div></div>

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

    @foreach($list as $his)
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if($his->blik == 'n')
                            <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                @else
                            <div class="bg-gray-400 overflow-hidden shadow-sm sm:rounded-lg">
                @endif

                    <div class="p-6 text-gray-900">
                        <div class="text-center text-xl">Przelew wychodzący</div>
                        <hr>
                        @if($his->blik == 'n')
                            <div class="text-center text-2xl">Tytuł przelewu: {{$his->title}}</div>
                        @else
                            <div class="text-center text-2xl">BLIK</div>
                        @endif
                        <br>
                        <div class="text-right text-xl"><label>Numer konta: {{ $his->account_number }}</label></div>
                        <div class="text-right mb-3 text-xl"><label>Na numer konta: {{ $his->account_number_to }} </label></div>
                        <div class="text-left text-red-800 text-3xl">Kwota przelewu: -{{ $his->total_amount }} {{ $his->currency }}</div>
                        <div class="text-left text-xl">Saldo przed przelewem: {{$his->old_amount}} {{ $his->currency }}</div>
                        <div class="text-left text-xl">Saldo po przelewie: {{$his->new_amount}} {{ $his->currency }}</div>
                        <div class="text-center text-sm">{{$his->created_at}}</div>
                        <div class="text-center text-white text-4xl bg-emerald-600 shadow">
                        </div>

                        <form method="POST" action="{{ route('history.generate') }}">
                            @csrf
                            <input type="hidden" name="title" value="{{ $his->title }}">
                            <input type="hidden" name="number_account" value="{{ $his->account_number }}">
                            <input type="hidden" name="number_account_to" value="{{ $his->account_number_to }}">
                            <input type="hidden" name="amount" value="{{ $his->total_amount }}">
                            <input type="hidden" name="a_c" value="{{ $his->currency }}">
                            <input type="hidden" name="sal_b" value="{{ $his->old_amount }}">
                            <input type="hidden" name="sal_b_c" value="{{ $his->currency }}">
                            <input type="hidden" name="sal_a" value="{{ $his->new_amount }}">
                            <input type="hidden" name="sal_a_c" value="{{ $his->currency }}">
                            <input type="hidden" name="time" value="{{ $his->created_at }}">
                            <input type="hidden" name="blik" value="{{ $his->blik }}">
                            <input type="hidden" name="type" value="Wychodzący">

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="mx-auto">
                                    {{ __('Generuj potwierdzenie') }}
                                </x-primary-button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @else

    @endif


    <div class="mx-auto text-center justify-center justify-items-center items-center">
        {{ $list->links() }}
    </div>

</x-app-layout>



