<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    @if($x != true)


    @elseif($x == true)

        <div class="py-2">
            <div class="max-w-7xl sm:w-auto md:w-auto lg:w-auto mx-auto sm:px-6 lg:px-8">
                <div class="bg-emerald-600 mx-auto w-4/12 rounded text-center overflow-hidden shadow-amber-700 sm:rounded-lg">
                    <div class="p-6 text-xl text-white">
                        <a href="{{ route('show.app') }}">Aplikuj o kredyt!</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-2">
            <div class="max-w-3xl sm:w-auto md:w-auto lg:w-auto mx-auto sm:px-6 lg:px-8">
                <div class="bg-emerald-600 mx-auto w-4/12 rounded text-center overflow-hidden shadow-amber-700 sm:rounded-lg">
                    <div class="p-6 text-xl text-white">
                        <a href="{{ route('show.credits') }}">Historia kredytowa</a>
                    </div>
                </div>
            </div>
        </div>

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
                            <div class="text-white mb-3 text-center">Pozostało do spłaty: {{ $d->credit_left }} PLN</div>
                            <div class="text-white mb-3 text-center">Płatne do {{ $d->day_to_pay }} dnia każdego miesiąca.</div>
                            <div class="text-white mb-3 text-center">Koniec kredytu: {{ $d->end_credit }} </div>

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
                                    {{ __('Zapłać') }}
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


</x-app-layout>
