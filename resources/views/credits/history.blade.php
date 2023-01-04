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
                    {{ __("Twoja historia kredytowa w naszym banku") }}
                </div>
            </div>
        </div>
    </div>

    @if($x == false)

    @else

    @foreach($his as $i)
        <div class="py-4">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-green-600 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-white">
                            <div class="text-center mb-4 text-4xl">KREDYT - historia</div>
                            <div class="text-center text-2xl">Informacje</div>
                            <div class="text-center text-2xl">Użytkownik: {{ \Illuminate\Support\Facades\Auth::user()->name }} {{ \Illuminate\Support\Facades\Auth::user()->surname }}</div>
                            <div class="text-center text-2xl">Kwota kredytu: {{ $i->credit_amount }}</div>
                            <div class="text-center text-2xl">Liczba rat: {{ $i->total_rates }}</div>
                            <div class="text-center text-2xl">Koniec kredytu: {{ $i->end_credit }}</div>
                            <div class="text-center text-2xl">Jedna rata: {{ $i->one_rate }}</div>
                            <div class="text-center text-sm">Status: spłacono</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        @endif

    </div>
</x-app-layout>



