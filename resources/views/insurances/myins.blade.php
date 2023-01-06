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
                    {{ __("Twoje ubezpieczenia") }}
                </div>
            </div>
        </div>
    </div>

    @foreach($ins as $i)

        @if($i->type == "C")

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">

                                    <div class="p-6 text-gray-900">
                                        <div class="text-center text-2xl">Marka: {{ $i->brand }}</div>
                                        <div class="text-center text-2xl">Pojemność silnika: {{ $i->cap }}</div>
                                        <div class="text-center mb-3 text-2xl">Wartość pojazdu: {{ $i->value }}</div>
                                        <div class="text-right text-xl"><label>Przebieg: {{ $i->kilometers }}</label></div>
                                        <div class="text-right text-xl"><label>Rok produkcji: {{ $i->production }}</label></div>
                                        <div class="text-left mb-3 text-red-800 text-3xl">Rejestracja: {{ $i->rejestracja }}</div>
                                        <div class="text-left text-xl">Składka: {{ $i->price }}</div>
                                        <div class="text-left text-xl">Zakończenie ubezpieczenia:  {{ $i->end_time }}</div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>

        @elseif($i->type == "L")

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="bg-orange-200 overflow-hidden shadow-sm sm:rounded-lg">

                            <div class="p-6 text-gray-900">
                                <div class="text-center text-red-800 text-3xl">Imię: {{ \Illuminate\Support\Facades\Auth::user()->name }}</div>
                                <div class="text-center mb-3 text-red-800 text-3xl">Nazwisko: {{ \Illuminate\Support\Facades\Auth::user()->surname }}</div>
                                <div class="text-center text-2xl">Wiek: {{ $i->age }}</div>
                                <div class="text-right text-xl"><label>Płeć: {{ $i->gender }}</label></div>
                                <div class="text-right text-xl"><label>Zawód: {{ $i->profesion }}</label></div>
                                <div class="text-right mb-3 text-xl">Status społeczny: {{ $i->community_status }}</div>
                                <div class="text-left text-xl">Składka: {{ $i->price }}</div>
                                <div class="text-left text-xl">Zakończenie ubezpieczenia:  {{ $i->end_time }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @else

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="bg-green-200 overflow-hidden shadow-sm sm:rounded-lg">

                            <div class="p-6 text-gray-900">
                                <div class="text-center text-2xl">Imię: {{ \Illuminate\Support\Facades\Auth::user()->name }}</div>
                                <div class="text-center text-2xl">Nazwisko: {{ \Illuminate\Support\Facades\Auth::user()->surname }}</div>
                                <div class="text-center text-2xl">Typ nieruchomości: {{ $i->building_type }}</div>
                                <div class="text-right text-xl"><label>Metraż: {{ $i->m2 }}</label></div>
                                <div class="text-right text-xl"><label>Location: {{ $i->location }}</label></div>
                                <div class="text-right text-xl"><label>Rok budowy: {{ $i->year }}</label></div>
                                <div class="text-left text-red-800 text-3xl"><label>Miasto: {{ $i->city }}</label></div>
                                <div class="text-left mb-3 text-red-800 text-3xl">Adres: {{ $i->domicile }}</div>
                                <div class="text-left text-xl">Składka: {{ $i->price }}</div>
                                <div class="text-left text-xl">Zakończenie ubezpieczenia:  {{ $i->end_time }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        @endif

                @endforeach

    <div class="right-0">
        {{ $list->links('vendor.pagination.tailwind') }}
    </div>
            </div>
</x-app-layout>



