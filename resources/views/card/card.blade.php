<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel użytkownika:') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <style>
        #card:hover { transform: rotateY(180deg); }

        #card > div:nth-child(1) { transition-delay: 100ms;}

        #card:hover > div:nth-child(1) {
            opacity: 0;
            z-index: -1;
        }
    </style>

    <div class="text-4xl mt-8 mb-8 text-center">WIRTUALNE KARTY <!-- This button is used to open the dialog -->
        <button id="open" class="py-2 hover:bg-gray-300 text-black cursor-pointer rounded-md">
            <img src="{{URL::asset('logo/info.png')}}" class="mx-auto" alt="profile Pic" height="30" width="30">
        </button>

        <!-- Overlay element -->
        <div id="overlay" class="fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60"></div>

        <!-- The dialog -->
        <div id="dialog"
             class="hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
            <h1 class="text-2xl font-semibold">Karty wirtualne</h1>
            <div class="py-5 text-sm border-t border-b border-gray-300">
                <p>Karty są jedynie wirtualne, nie ma możliwości zamówienia fizycznej wersji.</p>
                <br>
                <p>Generowane są automatycznie przy utworzeniu rachunku walutowego oraz kredytu.</p>
                <br>
                <p>Utworzone mogą być maksymalnie 2 karty wirtualne.</p>
                <br>
                <p>Karty mają ważność 4 lat.</p>
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

    <hr class="w-auto h-1 mb-10 bg-gray-300 opacity-50" />

    @if($check == false)


    @elseif($check == true)

    @foreach($acc as $a)
        @foreach($card as $c)

        @if($a->blik == 'T' && $a->type == 'N')
                    @if($c->type == 'N')
            <div class='w-full h-auto mb-10 mt-10 flex flex-col justify-center items-center'>
                <div class="text-2xl mb-5 text-center">KARTA DEBETOWA</div>
                <!-- Card Credit -->
                <div id="card" class="relative w-96 h-60 rounded-2xl font-mono text-white overflow-hidden cursor-pointer transition-all duration-500" style="transition: 0.6s;transform-style: preserve-3d;">

                    <!-- Front content -->
                    <div class="absolute top-0 left-0 w-full h-full flex flex-col justify-center gap-6 p-6 bg-gradient-to-tr bg-green-900 bg-green-800 transition-all duration-100 delay-200 z-20" style="transform: rotateY(0deg);">

                        <div class="flex justify-between items-center">
                            <img src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/chip.png" alt='Smart card' class="w-12">

                            <img src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/visa.png" alt="Visa image" class="w-12">
                        </div>

                        <!-- CardNumber -->
                        <div class="">
                            <label for="">Numer karty</label>
                            <input type="text" id="" value="{{ $c->card_number }}" readonly
                                   class="outline-none w-full bg-transparent text-center text-2xl">
                        </div>

                        <div class="w-full flex flex-row justify-between">

                            <div class="w-full flex flex-col">
                                <label for="">Właściciel</label>
                                <input type="text" id="" value="{{ \Illuminate\Support\Facades\Auth::user()->name }}  {{ \Illuminate\Support\Facades\Auth::user()->surname }}" readonly
                                       class="outline-none bg-transparent">
                            </div>

                            <div class="w-1/3 flex flex-col">
                                <label for="">Wygasa</label>
                                <input type="text" id="" value="06/{{ $c->expires }}" readonly class="outline-none bg-transparent">
                            </div>

                        </div>

                    </div>

                    <!-- Back content -->
                    <div class="absolute top-0 left-0 w-full h-full flex flex-col gap-3 justify-center bg-gradient-to-tr bg-green-900 bg-green-800 transition-all z-10"
                         style="transform: rotateY(180deg);">

                        <!-- Band -->
                        <div class="w-full h-12 bg-black"></div>

                        <div class="px-6 flex flex-col gap-6 justify-center">
                            <div class="flex flex-col items-end">
                                <label for="">CVV</label>
                                <input type="text" id="" value="{{ $c->cvv }}" readonly
                                       class="outline-none rounded text-black w-full h-8 text-right"
                                       style="background: repeating-linear-gradient(45deg, #ededed, #ededed 5px, #f9f9f9 5px, #f9f9f9 10px);">
                            </div>


                            <div class="flex justify-start items-center">
                                <img src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/visa.png"
                                     alt="" class="w-12">
                            </div>

                        </div>

                    </div>
                </div>
            </div>


            <hr class="w-auto h-1 mb-10 bg-gray-300 opacity-50" />


        @elseif($a->blik == 'N' && $a->type == 'K')
                    @elseif($c->type == 'K')

            <div class='w-full h-auto mt-10 mb-10 flex flex-col justify-center items-center'>
                <div class="text-2xl mb-5 text-center">KARTA KREDYTOWA</div>
                <!-- Card Credit -->
                <div id="card" class="relative w-96 h-60 rounded-2xl font-mono text-white overflow-hidden cursor-pointer transition-all duration-500" style="transition: 0.6s;transform-style: preserve-3d;">

                    <!-- Front content -->
                    <div class="absolute top-0 left-0 w-full h-full flex flex-col justify-center gap-6 p-6 bg-gradient-to-tr from-gray-900 to-gray-700 transition-all duration-100 delay-200 z-20" style="transform: rotateY(0deg);">

                        <div class="flex justify-between items-center">
                            <img src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/chip.png" alt='Smart card' class="w-12">

                            <img src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/visa.png" alt="Visa image" class="w-12">
                        </div>

                        <!-- CardNumber -->
                        <div class="">
                            <label for="" >Numer karty kredytowej</label>
                            <input type="text" id="" value="{{ $c->card_number }}" readonly
                                   class="outline-none w-full bg-transparent text-center text-2xl">
                        </div>

                        <div class="w-full flex flex-row justify-between">

                            <div class="w-full flex flex-col">
                                <label for="">Właściciel</label>
                                <input type="text" id="" value="{{ \Illuminate\Support\Facades\Auth::user()->name }}  {{ \Illuminate\Support\Facades\Auth::user()->surname }}" readonly
                                       class="outline-none bg-transparent">
                            </div>

                            <div class="w-1/3 flex flex-col">
                                <label for="">Wygasa</label>
                                <input type="text" id="" value="06/{{ $c->expires }}" readonly class="outline-none bg-transparent">
                            </div>

                        </div>

                    </div>

                    <!-- Back content -->
                    <div class="absolute top-0 left-0 w-full h-full flex flex-col gap-3 justify-center bg-gradient-to-tr from-gray-900 to-gray-700 transition-all z-10"
                         style="transform: rotateY(180deg);">

                        <!-- Band -->
                        <div class="w-full h-12 bg-black"></div>

                        <div class="px-6 flex flex-col gap-6 justify-center">
                            <div class="flex flex-col items-end">
                                <label for="">CVV</label>
                                <input type="text" id="" value="{{ $c->cvv }}" readonly
                                       class="outline-none rounded text-black w-full h-8 text-right"
                                       style="background: repeating-linear-gradient(45deg, #ededed, #ededed 5px, #f9f9f9 5px, #f9f9f9 10px);">
                            </div>


                            <div class="flex justify-start items-center">
                                <img src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/visa.png"
                                     alt="" class="w-12">
                            </div>

                        </div>

                    </div>
                </div>
            </div>

                    @else
                    @endif

        @else

        @endif



            @endforeach

    @endforeach


    @else

    @endif
</x-app-layout>

