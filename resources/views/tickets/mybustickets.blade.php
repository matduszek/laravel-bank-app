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
                    {{ __("Twoje bilety komunikacyjne") }}
                </div>
            </div>
        </div>
    </div>

@foreach($tick as $t)
            <div class="py-4">
                <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="bg-green-600 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <div class="text-center text-4xl">Miasto: Jelenia Góra</div>
                                <div class="text-center text-2xl">Typ biletu: {{ $t->type }}</div>
                                <div class="text-center text-2xl">Na okres: {{ $t->time }} @if($t->time == '15' || $t->time == '30') minut @else godz.@endif</div>
                                <div class="text-center text-2xl"><label>Cena: {{ $t->amount }} PLN</label></div>
                                <center><div class="mt-3 mb-3">{!! DNS2D::getBarcodeHTML("$t->qrcode", 'QRCODE',6,6) !!}</div></center>
                                <div class="text-center mt-3 text-xl"><label>Koniec ważności: {{ $t->end_time }}</label></div>
                                <div class="text-center text-sm"><label>Pamietaj żeby rozjaśnić ekran przy skanowaniu.</label></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach

    <div class="mx-auto text-center justify-center justify-items-center items-center">
        {{ $tick->links() }}
    </div>
    </div>
</x-app-layout>



