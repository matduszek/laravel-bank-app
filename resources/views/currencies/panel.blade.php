<x-app-layout>
    <x-auth-card>
    <x-slot name="logo">
    </x-slot>

        <img src="{{URL::asset('logo/currency.png')}}" class="mx-auto" alt="profile Pic" height="200" width="200">

<div>
    <div class="text-4xl text-center text-black mb-7 mx-auto">KURSY WALUT</div>
    <hr>
        <table class="border-collapse p-4 mt-4 table mx-auto table-auto whitespace-no-wrap bg-white rounded table-striped relative">
            <tr>
                <th>EURO</th>
                <th></th>
                <th>DOLAR</th>
                <th></th>
                <th>FRANK</th>
                <th></th>
                <th>FUNT</th>
            </tr>
            <tr>
                <th>{{ $eur }}</th>
                <th></th>
                <th>{{ $usd }}</th>
                <th></th>
                <th>{{ $chf }}</th>
                <th></th>
                <th>{{ $gbp }}</th>
            </tr>
        </table>
</div>

        <div class="mt-2 mb-10 text-center text-gray-600 font-bold">
            Kursy z dnia {{ date("d-m-Y") }}
        </div>

    <form class="mx-auto" method="POST" action="{{ route('currency.check') }}">

        @csrf

        <div>Waluta z jakiej</div>
        <select name="currencyFROM" id="currencyFROM">
            <option value="">--Wybierz walutę--</option>
            <option value="EUR">EURO</option>
            <option value="GBP">FUNT</option>
            <option value="CHF">FRANK</option>
            <option value="PLN">ZŁOTY</option>
            <option value="USD">DOLAR</option>
        </select>

        <div>Waluta na jaką</div>
        <select name="currencyTO" id="currencyTO">
            <option value="">--Wybierz walutę--</option>
            <option value="EUR">EURO</option>
            <option value="GBP">FUNT</option>
            <option value="CHF">FRANK</option>
            <option value="PLN">ZŁOTY</option>
            <option value="USD">DOLAR</option>
        </select>

        <div>Kwota</div>
        <input type="text" name="amount">

        @if (\Session::has('incorrect'))
            <div class="bg-red-600 mb-6 text-center text-white w-auto alert-description">
                <ul>
                    <li>{!! \Session::get('incorrect') !!}</li>
                </ul>
            </div>
        @endif

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="mx-auto">
                {{ __('ZOBACZ') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-2 text-center text-3xl">
    @if($x == 1)
        {{ $zmienna }} {{ $cur }}
    @else

    @endif
    </div>

    </x-auth-card>
</x-app-layout>
