<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

            </a>
        </x-slot>

        <div class="items-center mx-auto justify-center">
            <img src="{{URL::asset('logo/credit-card.png')}}" class="mx-auto" alt="profile Pic" height="200" width="200">
        </div>

        <h2 class="text-4xl font-bold text-center mb-3">Aplikuj o kredyt</h2>
        <h6 class="text-xl font-bold text-center mb-3">Postaraj się nawet o 200 tys.!</h6>
        <h6 class="text-xl font-bold text-center mb-1">RRSO 0%</h6>

        <!-- component -->
        <div class="max-w-xl mx-auto my-4 border-b-2 pb-4">
            <div class="flex pb-3">
                <div class="flex-1">
                </div>

                <div class="flex-1">
                    <div class="w-10 h-10 bg-green-500 mx-auto rounded-full text-lg text-white flex items-center">
                        <span class="text-white text-sm text-center w-full"><i class="fa fa-check w-full fill-current white">1/2</i></span>
                    </div>
                </div>

                <div class="w-2/6 align-center items-center align-middle content-center flex">
                    <div class="w-full bg-green-500 rounded items-center align-middle align-center flex-1">
                        <div class="bg-gray-400 text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 100%"></div>
                    </div>
                </div>

                <div class="flex-1">
                    <div class="w-10 h-10 bg-gray-400 mx-auto rounded-full text-lg text-white flex items-center">
                        <span class="text-white text-sm text-center w-full"><i class="fa fa-check w-full fill-current white">2/2</i></span>
                    </div>
                </div>

                <div class="flex-1">
                </div>
            </div>

            <div class="flex text-xs content-center text-center">
                <div class="w-1/2">
                    Formularz
                </div>

                <div class="w-1/2">
                    Potwierdzenie
                </div>
            </div>
        </div>


        <br>
        <form method="POST" action="{{ route('decision.panel') }}">
            @csrf

            <!-- Kwota -->
            <div>
                <x-input-label for="amount" :value="__('Kwota kredytu o jaką sie ubiegasz w PLN')" />
                <x-text-input id="amount" class="block mt-1 w-full" type="text" name="amount" placeholder="np. 150000" :value="old('amount')" required autofocus />
                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            </div>

            <!-- Zarobki -->
            <div>
                <x-input-label for="earnings" :value="__('Średnie zarobki netto przez okres ostatnich 6 miesiecy')" />
                <x-text-input id="earnings" class="block mt-1 w-full" type="text" name="earnings" placeholder="np. 4300" :value="old('earnings')" required autofocus />
                <x-input-error :messages="$errors->get('earnings')" class="mt-2" />
            </div>

            <!-- Typ umowy -->
            <div>
                <x-input-label for="type" :value="__('Typ umowy')" />
                <!--<x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required autofocus /> -->
                <select name="type" id="type">
                    <option value="">--UOP/UZ--</option>
                    <option value="UOP">Umowa o pracę</option>
                    <option value="UZ">Umowa zlecenie</option>
                </select>
                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>

            <div class="slidecontainer mt-2">
                <x-input-label for="length" :value="__('Ile juz pracujemy na podanej umowie (msc)')" />
                <input type="range" min="1" max="600" value="300" class="slider w-full" name="length" id="myRange">
            </div>

            <p class="text-center" id="demo"></p>

            <div class="slidecontainer mt-2">
                <x-input-label for="length" :value="__('Ilość rat (msc)')" />
                <input type="range" min="24" max="240" value="132" class="slider w-full" name="credit_length" id="myRange2">
            </div>

            <p class="text-center" id="demo2"></p>
            <br>

            <button type="button" class="text-xl" onclick="calculateAverageRate()">Oblicz ratę</button> <br>
            <p class="inline text-sm text-red-800" id="demo3"></p>

            <script>
            var slider = document.getElementById("myRange");
            var output = document.getElementById("demo");
            output.innerHTML = slider.value; // Display the default slider value

            // Update the current slider value (each time you drag the slider handle)
            slider.oninput = function() {
            output.innerHTML = this.value;
            }
            </script>

            <script>
                var slider2 = document.getElementById("myRange2");
                var output2 = document.getElementById("demo2");
                output2.innerHTML = slider2.value; // Display the default slider value

                // Update the current slider value (each time you drag the slider handle)
                slider2.oninput = function() {
                    output2.innerHTML = this.value;
                }
            </script>

            <script>

                function calculateAverageRate() {
                    // Get the values from the form
                    var num1 = document.getElementById("myRange2").value;
                    var num2 = document.getElementById("amount").value;

                    // Convert the strings to numbers
                    num1 = parseFloat(num1);
                    num2 = parseFloat(num2);

                    // Calculate the average rate
                    var average = num2/num1;

                    average = Math.round(average);

                    // Display the result
                    document.getElementById("demo3").innerHTML = 'Rata będzie wynosić w przybliżeniu: ' + average + ' PLN';
                }

            </script>

            @if (\Session::has('low_earnings'))
                <div class="bg-red-600 mt-8 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{!! \Session::get('low_earnings') !!}</li>
                    </ul>
                </div>
            @endif

            @if (\Session::has('high_amount'))
                <div class="bg-red-600 mt-8 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{!! \Session::get('high_amount') !!}</li>
                    </ul>
                </div>
            @endif

            @if (\Session::has('success'))
                <div class="bg-green-600 mt-8 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif

            @if (\Session::has('failed'))
                <div class="bg-red-600 mt-8 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{!! \Session::get('failed') !!}</li>
                    </ul>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Aplikuj') }}
                </x-primary-button>
            </div>
        </form>
        <div class="block mt-8">
            <a href="{{ route('credit.panel') }}">POWRÓT</a>
        </div>
    </x-auth-card>
</x-guest-layout>
