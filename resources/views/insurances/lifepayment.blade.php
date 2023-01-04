<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

            </a>
        </x-slot>
        <h2 class="text-4xl font-bold text-center">UBEZPIECZENIE</h2>

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
                    <div class="w-10 h-10 bg-green-500 mx-auto rounded-full text-lg text-white flex items-center">
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

        <br>
        <h6 class="text-xl font-bold text-left">Saldo: {{$account->balance}} {{ $account->currency }}</h6>
        <h6 class="text-xl font-bold text-left">Numer rachunku: {{ $account->account_number}}</h6>
        <br>
        <form method="POST" action=" {{ route('transaction.post', ['account_id' => $account->id_account]) }}">
            @csrf

            <div>
                <x-input-label for="title" :value="__('Tytuł przelewu')" />
                <x-text-input id="title" class="block mt-1 w-full"  type="text" name="title" value="Ubezpieczenie {{ \Illuminate\Support\Facades\Auth::user()->name }} {{ \Illuminate\Support\Facades\Auth::user()->surname }}" readonly required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Kwota -->
            <div>
                <x-input-label for="amount" :value="__('Kwota')" />
                <x-text-input id="amount" class="block mt-1 w-full" type="text" name="amount" value="{{$amount}}" readonly required autofocus />
                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            </div>

            <!-- Numer kontana jaki przelewamy -->
            <div>
                <x-input-label for="tonumberaccount" :value="__('Numer konta na jaki chcemy przelać pieniądze')" />
                <x-text-input id="tonumberaccount" class="block mt-1 w-full" type="text" name="tonumberaccount" value="{{$special_number}}" readonly required autofocus />
                <x-input-error :messages="$errors->get('tonumberaccount')" class="mt-2" />
            </div>
            <br>

            <input type="hidden" name="age" value="{{ $age }}">
            <input type="hidden" name="earnings" value="{{ $earnings }}">
            <input type="hidden" name="gender" value="{{ $gender }}">
            <input type="hidden" name="profesion" value="{{ $profesion }}">
            <input type="hidden" name="t_id" value="{{$account->id_account}}">
            <input type="hidden" name="status" value="{{ $status }}">
            <input type="hidden" name="sum_ins" value="{{ $sum_ins }}">
            <input type="hidden" name="amount" value="{{ $amount }}">
            <input type="hidden" name="t" value="L">

            @if (\Session::has('failed_account'))
                <div class="bg-red-600 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{!! \Session::get('failed_account') !!}</li>
                    </ul>
                </div>
            @endif

            @if (\Session::has('failed_amount'))
                <div class="bg-red-600 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{!! \Session::get('failed_amount') !!}</li>
                    </ul>
                </div>
            @endif

            @if (\Session::has('not_found'))
                <div class="bg-red-600 mb-6 text-center text-white w-auto alert-description">
                    <ul>
                        <li>{!! \Session::get('not_found') !!}</li>
                    </ul>
                </div>
            @endif



            <div class="text-center text-white text-4xl bg-emerald-600 shadow">
                <a href="{{ route('transaction.post', ['account_id' => $account->id_account]) }}"><button>Przelej</button></a>
            </div>
        </form>
        <div class="block mt-8">
            <h7 class="text-xl text-center"><a href="{{ route('insurance.panel') }}">POWRÓT</a></h7>
        </div>
    </x-auth-card>
</x-guest-layout>
