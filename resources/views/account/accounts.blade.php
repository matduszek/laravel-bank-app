<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-900 text-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white text-3xl">
                    {{ __("Oto twoje konta w naszym banku!") }}
                </div>
            </div>
        </div>
    </div>

    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif

    @foreach($mya as $dupa)
        @if($dupa->type == 'I')

        @else

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if($dupa->blik == 'T')
                <div class="bg-amber-200 overflow-hidden shadow-sm sm:rounded-lg">
                    @elseif($dupa->type == 'K')
                        <div class="bg-pink-900 overflow-hidden shadow-sm sm:rounded-lg">
                            @else
                        <div class="bg-blue-200 text-white overflow-hidden shadow-sm sm:rounded-lg">
                    @endif
                    <div class="p-6 text-gray-900">
                        <div class="text-left text-xl">
                            @if($dupa->blik == 'T')
                                <div class="text-stone-800 text-3xl mb-3 font-bold text-center">KONTO GŁÓWNE</div>
                                <div class="text-left mb-3 text-xl">KONTO Z BLIKIEM</div>
                            @elseif($dupa->type == 'K')
                                <div class="text-white text-5xl mb-3 font-bold text-center">KREDYT</div>
                            @elseif($dupa->type == 'CA')
                                <div class="text-black text-3xl mb-3 font-bold text-center">WALUTOWE</div>
                            @elseif($dupa->type == 'S')
                                <div class="text-black text-3xl mb-3 font-bold text-center">OSZCZĘDNOŚCIOWE</div>
                            @endif
                        </div>
                        @if($dupa->type == 'K')
                            <div class="text-left text-white mb-3 text-xl"><label>Numer konta: {{ $dupa->account_number }}</label></div>
                            <div class="text-center text-white text-xl"><label>Saldo: {{ $dupa->balance }} {{ $dupa->currency }}</label></div>
                            <div class="text-right text-white text-xl">
                                @if($dupa->type == 'S')
                                    Oszczędnościowe
                                @elseif($dupa->type == 'N')
                                    Normalne
                                @elseif($dupa->type == 'CA')
                                    Walutowe
                                @else
                                    KREDYT
                                @endif
                            </div>
                        @else
                            <div class="text-left mb-3 text-xl"><label>Numer konta: {{ $dupa->account_number }}</label></div>
                            <div class="text-center text-xl"><label>Saldo: {{ $dupa->balance }} {{ $dupa->currency }}</label></div>
                            <div class="text-right text-xl">
                                @if($dupa->type == 'S')
                                    Oszczędnościowe
                                @elseif($dupa->type == 'N')
                                    Normalne
                                @elseif($dupa->type == 'CA')
                                    Walutowe
                                @else
                                    Kredyt
                                @endif
                            </div>
                        @endif


                        @if($dupa->type == 'K')
                            <div class="text-center sm:w-3 md:w-auto lg:w-auto text-white text-4xl  bg-lime-500 hover:bg-lime-600 shadow">
                                <form method="POST" action="{{ route('transaction.edit') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$dupa->id_account}}">
                                    <input type="submit" value="PRZELEW">
                                </form>
                            </div>
                        @else
                            <div class="text-center sm:w-3 md:w-auto lg:w-auto text-white text-4xl bg-emerald-600 hover:bg-emerald-700 shadow">
                                <form method="POST" action="{{ route('transaction.edit') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$dupa->id_account}}">
                                    <button><input type="submit" value="PRZELEW"></button>
                                </form>
                            </div>
                        @endif



                        @if($x == true && $dupa->blik == 'T')
                            <div class="text-center sm:w-3 md:w-auto lg:w-auto text-white text-4xl bg-gray-700 hover:bg-gray-800 shadow w-3/12 rounded mx-auto mt-4">
                                <form method="POST" action="{{ route('transaction.show') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$dupa->id_user}}">
                                    <button><input type="submit" value="BLIK"></button>
                                </form>
                            </div>
                        @else

                        @endif
                    </div>
                </div>
            </div>
        </div>

        @endif
    @endforeach


</x-app-layout>
