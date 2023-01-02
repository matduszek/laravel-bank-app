<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    @if($x != true)

    <div class="py-12">
        <div class="max-w-7xl sm:w-auto md:w-auto lg:w-auto mx-auto sm:px-6 lg:px-8">
            <div class="bg-emerald-600 mx-auto w-4/12 rounded text-center overflow-hidden shadow-amber-700 sm:rounded-lg">
                <div class="p-6 text-xl text-white">
                    <a href="{{ route('show.app') }}">Aplikuj o kredyt!</a>
                </div>
            </div>
        </div>
    </div>

    @elseif($x == true)

        <!-- UTWORZONY KREDYT -->

    @else

        <div class="py-12">
            <div class="max-w-7xl sm:w-auto md:w-auto lg:w-auto mx-auto sm:px-6 lg:px-8">
                <div class="bg-emerald-600 mx-auto w-4/12 rounded text-center overflow-hidden shadow-amber-700 sm:rounded-lg">
                    <div class="p-6 text-xl text-white">
                        Aby aplikować o kredyt musisz posiadać konto główne.
                    </div>
                </div>
            </div>
        </div>

    @endif

    @foreach($k as $dupa)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-pink-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                            <div class="text-white text-5xl font-bold text-center">KREDYT</div>
                            <hr>
                            <div class="text-left mt-8 text-white text-xl"><label>Numer konta: {{ $dupa->account_number }}</label></div>
                            <div class="text-center font-bold text-white text-2xl"><label>Saldo: {{ $dupa->balance }} {{ $dupa->currency }}</label></div>
                            <div class="text-right text-white text-xl">Informacje:</div>
                            @foreach($det as $d)
                                <div class="text-white text-right">Kwota kredytu: {{ $d->credit_amount }}</div>
                            <div class="text-white text-right">Zadeklarowane zarobki: {{ $d->earnings }}</div>
                            <div class="text-white text-right">Typ umowy: @if($d->type == "UOP") UMOWA O PRACE @else UMOWA ZLECENIE @endif</div>
                            <div class="text-white text-right">Liczba rat: {{ $d->total_rates }}</div>
                            <div class="text-white text-2xl text-center">Rata wynosi: {{ $d->one_rate }} PLN</div>

                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</x-app-layout>
