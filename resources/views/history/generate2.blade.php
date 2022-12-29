<x-guest-layout>

    <div class="text-center text-7xl">FMMKParibas</div>

    <img src="{{URL::asset('logo/slogan.png')}}" class="mx-auto" alt="profile Pic" height="200" width="200">

    <div class="text-center text-5xl">Potwierdzenie</div>

    <hr>

    @if($blik == 'n')
        <div class="text-center mt-6 mb-6 text-7xl">
            {{ $title }}
        </div>
    @else
        <div class="text-center mt-6 mb-6 text-7xl">
            BLIK
        </div>
    @endif

    <div class="text-center text-4xl">Od: {{$number_account}}</div>
    <div class="text-center mb-6 text-4xl">Dla: {{$number_account_to}}</div>
    <div class="text-center text-green-500 text-4xl">Kwota przelewu: +{{$amount}} {{$a_c}}</div>
    <div class="text-center text-4xl">Saldo przed transakcją: {{$sal_b}} {{$sal_a_c}}</div>
    <div class="text-center mb-6 text-4xl">Saldo po transakcji: {{$sal_a}} {{$sal_a_c}}</div>
    <div class="text-center mb-6 text-4xl">Przewalutowano po kursie: {{ $curex }}</div>
    <div class="text-center text-4xl">Data transakcji: {{$time}}</div>
    <div class="text-center text-4xl">Typ transakcji: PRZYCHODZĄCA</div>


    <br><br><br><br><br><br><br>

        <div class="text-center">
            <a href="{{ route('show2.transactions') }}">POWRÓT</a> ||| <button onclick="window.print();" class="btn btn-primary" id="print-btn">WYDRUKUJ</button>
        </div>

    </form>

</x-guest-layout>




















