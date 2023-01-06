<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    @if($x == true)

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="bg-gray-400 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <div class="text-center mb-4 text-5xl">LOKATA</div>
                                    <hr>
                                        <div class="text-center text-2xl">Oprocentowanie  4%</div>
                                    <br>
                                    <div class="text-center mb-3 text-3xl"><label>Kwota: {{ $inv->amount }} PLN</label></div>
                                    <div class="text-center text-xl"><label>Data utworzenia: {{ $inv->maturity_date }} </label></div>
                                    <div class="text-center text-white text-4xl bg-emerald-600 shadow">
                                    </div>

                                        <div class="flex items-center justify-end mt-4">

                                                <x-primary-button class="mx-auto">
                                                    <a href="{{ route('investment.payment') }}"> {{ __('Wpłać') }}
                                                </x-primary-button>

                                                <x-primary-button class="mx-auto">
                                                    <a href="{{ route('investment.withdraw') }}">{{ __('Wypłać') }}</a>
                                                </x-primary-button>

                                        </div>
                                </div>
                            </div>
                    </div>
            </div>




    @else


        @if($y == true)
    <div class="py-6">
        <div class="max-w-7xl sm:w-auto md:w-auto lg:w-auto mx-auto sm:px-6 lg:px-8">
            <div class="bg-emerald-900 mx-auto w-4/12 rounded text-center overflow-hidden shadow-amber-700 sm:rounded-lg">
                <div class="p-6 text-xl text-white">
                    <a href="{{ route('create.inv') }}">Załóż lokatę</a>
                </div>
            </div>
        </div>
    </div>

    @else

    @endif

    @endif

</x-app-layout>
