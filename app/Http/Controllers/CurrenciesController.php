<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use Illuminate\Http\Request;
use AmrShawky\LaravelCurrency\Facade\Currency;

class CurrenciesController extends Controller
{

    public function show() {
        $EUR = Currency::convert()
            ->from('EUR')
            ->to('PLN')
            ->round(4)
            ->get();

        $CHF = Currency::convert()
            ->from('CHF')
            ->to('PLN')
            ->round(4)
            ->get();

        $GBP = Currency::convert()
            ->from('GBP')
            ->to('PLN')
            ->round(4)
            ->get();

        $USD = Currency::convert()
            ->from('USD')
            ->to('PLN')
            ->round(4)
            ->get();

        return view('currencies.panel', [
            'x'=> 0,'eur' => $EUR, 'chf' => $CHF, 'gbp' => $GBP, 'usd' => $USD
        ]);
    }

    public function check(Request $request) {

        $request->validate([
            'amount' => ['required', 'numeric'],
            'currencyFROM' => ['required:not_in:0'],
            'currencyTO' => ['required:not_in:0']
        ]);

        if(!$request) {
            return route('currency.panel');
        }

        $EUR = Currency::convert()
            ->from('EUR')
            ->to('PLN')
            ->get();

        $CHF = Currency::convert()
            ->from('CHF')
            ->to('PLN')
            ->get();

        $GBP = Currency::convert()
            ->from('GBP')
            ->to('PLN')
            ->get();

        $USD = Currency::convert()
            ->from('USD')
            ->to('PLN')
            ->get();

        $cf = $request->input('currencyFROM');
        $ct = $request->input('currencyTO');
        $am = $request->input('amount');

        $zmienna = Currency::convert()
            ->from($cf)
            ->to($ct)
            ->amount($am)
            ->round(2)
            ->get();


        if(!$zmienna){
            return view('currencies.panel', ['zmienna' => 'Nie znaleziono. Proszę wpisać poprawne dane!','x' => 0, 'eur' => $EUR, 'chf' => $CHF, 'gbp' => $GBP, 'usd' => $USD]);
        }
        else{
            $x = 1;
            return view('currencies.panel', ['zmienna' => $zmienna,'cur' => $ct, 'x' => $x, 'eur' => $EUR, 'chf' => $CHF, 'gbp' => $GBP, 'usd' => $USD]);
        }

    }


}
