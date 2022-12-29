<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-emerald-900 text-white text-center rounded mx-auto mt-4 w-1/3 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    {{ __("TWOJE TRANSAKCJE PRZYCHODZĄCE") }}
                </div>
            </div>
        </div>
    </div>

    @if($x == true)

        @foreach($list as $his)
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @if($his->blik == 'n')
                        <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                            @else
                                <div class="bg-gray-400 overflow-hidden shadow-sm sm:rounded-lg">
                                    @endif
                        <div class="p-6 text-gray-900">
                            <div class="text-center text-xl">Przelew przychodzący</div>
                            <hr>
                            @if($his->blik == 'n')
                                <div class="text-center text-2xl">Tytuł przelewu: {{$his->title}}</div>
                            @else
                                <div class="text-center text-2xl">BLIK</div>
                            @endif
                            <br>
                            <div class="text-right text-xl"><label>Od: {{ $his->account_number_to }}</label></div>
                            <div class="text-right mb-3 text-xl"><label>Na numer konta: {{ $his->account_number }} </label></div>
                            <div class="text-left text-green-800 text-3xl">Kwota przelewu: +{{ $his->total_amount }} {{ $his->currency }}</div>
                            @if($his->currency != $his->currency_to)
                                <div class="text-left text-xl">Przewalutowano po kursie: {{$his->currency_exchange}} </div>
                            @else

                            @endif
                            <div class="text-left text-xl">Saldo przed przelewem: {{$his->old_amount}} {{ $his->currency_to }}</div>
                            <div class="text-left text-xl">Saldo po przelewie: {{$his->new_amount}} {{ $his->currency_to }}</div>
                            <div class="text-center text-sm">{{$his->created_at}}</div>
                            <div class="text-center text-white text-4xl bg-emerald-600 shadow">
                            </div>
                            <form method="POST" action="{{ route('history.generate2') }}">
                                @csrf
                                <input type="hidden" name="title" value="{{ $his->title }}">
                                <input type="hidden" name="number_account" value="{{ $his->account_number }}">
                                <input type="hidden" name="number_account_to" value="{{ $his->account_number_to }}">
                                <input type="hidden" name="amount" value="{{ $his->total_amount }}">
                                <input type="hidden" name="a_c" value="{{ $his->currency }}">
                                <input type="hidden" name="sal_b" value="{{ $his->old_amount }}">
                                <input type="hidden" name="sal_b_c" value="{{ $his->currency }}">
                                <input type="hidden" name="curex" value="{{ $his->currency_exchange }}">
                                <input type="hidden" name="sal_a" value="{{ $his->new_amount }}">
                                <input type="hidden" name="sal_a_c" value="{{ $his->currency_to }}">
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



