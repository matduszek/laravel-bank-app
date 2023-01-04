<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

            </a>
        </x-slot>
        <div class="text-4xl text-center mx-auto mb-6 font-bold">Ubezpieczenie nieruchomości (1 rok)</div>

        <!-- component -->
        <div class="max-w-xl mx-auto my-4 border-b-2 pb-4">
            <div class="flex pb-3">
                <div class="flex-1">
                </div>

                <div class="flex-1">
                    <div class="w-10 h-10 bg-green-500 mx-auto rounded-full text-lg text-white flex items-center">
                        <span class="text-white text-center w-full"><i class="fa fa-check w-full fill-current white">1</i></span>
                    </div>
                </div>


                <div class="w-1/6 align-center items-center align-middle content-center flex">
                    <div class="w-full bg-green-500 rounded items-center align-middle align-center flex-1">
                        <div class="bg-green-light text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 100%"></div>
                    </div>
                </div>


                <div class="flex-1">
                    <div class="w-10 h-10 bg-green-500 mx-auto rounded-full text-lg text-white flex items-center">
                        <span class="text-white text-center w-full"><i class="fa fa-check w-full fill-current white">2</i></span>
                    </div>
                </div>

                <div class="w-1/6 align-center items-center align-middle content-center flex">
                    <div class="w-full bg-green-500 rounded items-center align-middle align-center flex-1">
                        <div class="bg-green-light text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 20%"></div>
                    </div>
                </div>

                <div class="flex-1">
                    <div class="w-10 h-10 bg-gray-400 mx-auto rounded-full text-lg text-white flex items-center">
                        <span class="text-white text-center w-full"><i class="fa fa-check w-full fill-current white">3</i></span>
                    </div>
                </div>

                <div class="flex-1">
                </div>
            </div>

            <div class="flex text-xs content-center text-center">
                <div class="w-1/3">
                    Formularz
                </div>

                <div class="w-1/3">
                    Potwierdzenie
                </div>

                <div class="w-1/3">
                    Płatność
                </div>
            </div>
        </div>

        <div class="text-xl text-left">Typ nieruchomości: {{ $type}}</div>
        <div class="text-xl text-left">Wartość nieruch.: {{ $value }} PLN</div>
        <div class="text-xl text-left">Metraż: {{ $m2 }} m<sup>2</sup></div>
        <div class="text-xl text-left">Lokalizacja: {{ $location }}</div>
        <div class="text-xl text-left">Miasto: {{ $city }}</div>
        <div class="text-xl text-left">Adres: {{ $domicile }}</div>
        <div class="text-xl text-left">Rok budowy: {{ $year }}</div>
        <div class="text-xl text-left">Kwota do zapłaty: {{$amount}} PLN</div>

        <form method="POST" action="{{ route('propertydec.payment') }}">
            @csrf
            <input type="hidden" name="type" value="{{ $type }}">
            <input type="hidden" name="value" value="{{ $value }}">
            <input type="hidden" name="m2" value="{{ $m2 }}">
            <input type="hidden" name="city" value="{{ $city }}">
            <input type="hidden" name="domicile" value="{{ $domicile }}">
            <input type="hidden" name="location" value="{{ $location }}">
            <input type="hidden" name="year" value="{{ $year }}">
            <input type="hidden" name="amount" value="{{ $amount }}">

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="mx-auto">
                    {{ __('Zapłać') }}
                </x-primary-button>
            </div>

        </form>

        <br><br>

        <div class="mt-6 mx-auto">
            <h7 class="text-xl text-red-800 mt-6 text-center items-center justify-center"><a href="{{route('insurance.panel')}}">Zrezygnuj z ubezpieczenia</a></h7>
        </div>

    </x-auth-card>
</x-guest-layout>
