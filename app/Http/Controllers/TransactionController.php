<?php

namespace App\Http\Controllers;

use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Models\Account;
use App\Models\Busticket;
use App\Models\CreditHistorie;
use App\Models\Credits;
use App\Models\Historie;
use App\Models\Insurance;
use App\Models\Investment;
use App\Models\Roadticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /*
     *
     *  Logika BLIKA
     *
     */

    public function show(Request $request){

        $id_user = $request->input('id');

        $account = DB::table('accounts')
            ->where('id_user', $id_user)
            ->where(function ($query) {
                $query->where('blik', 'T');
            })
            ->first();

        return view('transaction.tblik', ['blik' => $account]);
    }

    public function logicblik (Request $request) {

        $account_id = $request->input('t_id');
        //1
        $account = Account::where('id_account', $account_id)->first();
        $user = User::where('id', $account->id_user)->first();

        $tophonenumber = $request->input('tophonenumber');
        $kwota = $request->input('amount');

        //2
        $user2 = User::where('phone_number', $tophonenumber)->first();

        if(!$user2){
            return view('transaction.tblik',['blik' => $account, 'not_found' => 'Taki numer nie istnieje!']);
            //return redirect()->back()->with('not_found', 'Taki numer nie istnieje!');
        }

        if(Auth::user()->phone_number == $user2->phone_number) {
            return view('transaction.tblik', ['failed_account' => 'Nie możesz przelać na swoje konto!', 'blik' => $account ]);
        }
        elseif($account->balance < $kwota) {
            return view('transaction.tblik', ['failed_amount' => 'Nie masz wystarczających środków na koncie!', 'blik' => $account ]);
        }

        $find_id_blik = $user2->id;
        $account2 = Account::where([['id_user', $find_id_blik],['blik','T']])->first();

        if(!$account2){
            return redirect()->back()->with('not_blik', 'Użytkownik nie posiada BLIK!');
        }

        $history = new Historie();
        $history->id_user = Auth::user()->id;
        $history->id_account = $account->id_account;
        $history->id_user_to = $user2->id;
        $history->id_account_to = $account2->id_account;
        $history->account_number = $user->phone_number;
        $history->account_number_to = $user2->phone_number;
        $history->title = "null";
        $history->total_amount = $kwota;
        $history->blik = "y";
        $history->type = 'W';

        $history2 = new Historie();
        $history2->id_user = $user2->id;
        $history2->id_account = $account2->id_account;
        $history2->id_user_to = Auth::user()->id;
        $history2->id_account_to = $account->id_account;
        $history2->account_number = $user2->phone_number;
        $history2->account_number_to = $user->phone_number;
        $history2->title = "null";
        $history2->total_amount = $kwota;
        $history2->blik = "y";
        $history2->type = "P";


        if($account->currency == 'PLN' && $account2->currency == 'EUR') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "PLN";
            $history->currency_to = "EUR";
            $history->currency_exchange = 4.70;
            $kwotaEUR = ($kwota / 4.70);
            $account2->balance = ($account2->balance + $kwotaEUR);
            $history2->currency = "PLN";
            $history2->currency_to = "EUR";
            $history2->currency_exchange = 4.70;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'PLN' && $account2->currency == 'CHF') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "PLN";
            $history->currency_to = "CHF";
            $history->currency_exchange = 4.76;
            $kwotaCHF = ($kwota / 4.76);
            $account2->balance = ($account2->balance + $kwotaCHF);
            $history2->currency = "PLN";
            $history2->currency_to = "CHF";
            $history2->currency_exchange = 4.76;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'PLN' && $account2->currency == 'USD') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "PLN";
            $history->currency_to = "USD";
            $history->currency_exchange = 4.42;
            $kwotaUSD = ($kwota / 4.42);
            $account2->balance = ($account2->balance + $kwotaUSD);
            $history2->currency = "PLN";
            $history2->currency_to = "USD";
            $history2->currency_exchange = 4.42;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'PLN' && $account2->currency == 'GBP') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "PLN";
            $history->currency_to = "GBP";
            $history->currency_exchange = 5.44;
            $kwotaGBP = ($kwota / 5.44);
            $account2->balance = ($account2->balance + $kwotaGBP);
            $history2->currency = "PLN";
            $history2->currency_to = "GBP";
            $history2->currency_exchange = 5.44;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'PLN' && $account2->currency == 'PLN') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $account2->balance = ($account2->balance + $kwota);
            $history2->new_amount = $account2->balance;
            $history->currency = "PLN";
            $history->currency_to = "PLN";
            $history->currency_exchange = 1;
            $history2->currency = "PLN";
            $history2->currency_to = "PLN";
            $history2->currency_exchange = 1;
            $history2->type = "P";
            $history->type = "W";
        }
        // EURO
        if($account->currency == 'EUR' && $account2->currency == 'EUR') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $account2->balance = ($account2->balance + $kwota);
            $history2->new_amount = $account2->balance;
            $history->currency = "EUR";
            $history->currency_to = "EUR";
            $history->currency_exchange = 1;
            $history2->currency = "EUR";
            $history2->currency_to = "EUR";
            $history2->currency_exchange = 1;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'EUR' && $account2->currency == 'CHF') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "EUR";
            $history->currency_to = "CHF";
            $history->currency_exchange = 0.99;
            $kwotaCHF = ($kwota * 0.99);
            $account2->balance = ($account2->balance + $kwotaCHF);
            $history2->currency = "EUR";
            $history2->currency_to = "CHF";
            $history2->currency_exchange = 0.99;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'EUR' && $account2->currency == 'USD') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "EUR";
            $history->currency_to = "USD";
            $history->currency_exchange = 1.06;
            $kwotaUSD = ($kwota * 1.06);
            $account2->balance = ($account2->balance + $kwotaUSD);
            $history2->currency = "EUR";
            $history2->currency_to = "USD";
            $history2->currency_exchange = 1.06;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'EUR' && $account2->currency == 'GBP') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "EUR";
            $history->currency_to = "GBP";
            $history->currency_exchange = 0.86;
            $kwotaGBP = ($kwota * 0.86);
            $account2->balance = ($account2->balance + $kwotaGBP);
            $history2->currency = "EUR";
            $history2->currency_to = "GBP";
            $history2->currency_exchange = 0.86;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'EUR' && $account2->currency == 'PLN') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "EUR";
            $history->currency_to = "PLN";
            $history->currency_exchange = 4.69;
            $kwotaPLN = ($kwota * 4.69);
            $account2->balance = ($account2->balance + $kwotaPLN);
            $history2->currency = "EUR";
            $history2->currency_to = "PLN";
            $history2->currency_exchange = 4.69;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        // CHF
        if($account->currency == 'CHF' && $account2->currency == 'CHF') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $account2->balance = ($account2->balance + $kwota);
            $history2->new_amount = $account2->balance;
            $history->currency = "CHF";
            $history->currency_to = "CHF";
            $history->currency_exchange = 1;
            $history2->currency = "CHF";
            $history2->currency_to = "CHF";
            $history2->currency_exchange = 1;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'CHF' && $account2->currency == 'EUR') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "CHF";
            $history->currency_to = "EUR";
            $history->currency_exchange = 1.01;
            $kwotaCHF = ($kwota * 1.01);
            $account2->balance = ($account2->balance + $kwotaCHF);
            $history2->currency = "CHF";
            $history2->currency_to = "EUR";
            $history2->currency_exchange = 1.01;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'CHF' && $account2->currency == 'USD') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "CHF";
            $history->currency_to = "USD";
            $history->currency_exchange = 1.08;
            $kwotaUSD = ($kwota * 1.08);
            $account2->balance = ($account2->balance + $kwotaUSD);
            $history2->currency = "CHF";
            $history2->currency_to = "USD";
            $history2->currency_exchange = 1.08;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'CHF' && $account2->currency == 'GBP') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "CHF";
            $history->currency_to = "GBP";
            $history->currency_exchange = 0.87;
            $kwotaGBP = ($kwota * 0.87);
            $account2->balance = ($account2->balance + $kwotaGBP);
            $history2->currency = "CHF";
            $history2->currency_to = "GBP";
            $history2->currency_exchange = 0.87;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'CHF' && $account2->currency == 'PLN') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "CHF";
            $history->currency_to = "PLN";
            $history->currency_exchange = 4.76;
            $kwotaPLN = ($kwota * 4.76);
            $account2->balance = ($account2->balance + $kwotaPLN);
            $history2->currency = "CHF";
            $history2->currency_to = "PLN";
            $history2->currency_exchange = 4.76;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        // GBP
        if($account->currency == 'GBP' && $account2->currency == 'GBP') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $account2->balance = ($account2->balance + $kwota);
            $history2->new_amount = $account2->balance;
            $history->currency = "GBP";
            $history->currency_to = "GBP";
            $history->currency_exchange = 1;
            $history2->currency = "GBP";
            $history2->currency_to = "GBP";
            $history2->currency_exchange = 1;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'GBP' && $account2->currency == 'EUR') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "GBP";
            $history->currency_to = "EUR";
            $history->currency_exchange = 1.16;
            $kwotaCHF = ($kwota * 1.16);
            $account2->balance = ($account2->balance + $kwotaCHF);
            $history2->currency = "GBP";
            $history2->currency_to = "EUR";
            $history2->currency_exchange = 1.16;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'GBP' && $account2->currency == 'USD') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "GBP";
            $history->currency_to = "USD";
            $history->currency_exchange = 1.23;
            $kwotaUSD = ($kwota * 1.23);
            $account2->balance = ($account2->balance + $kwotaUSD);
            $history2->currency = "GBP";
            $history2->currency_to = "USD";
            $history2->currency_exchange = 1.23;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'GBP' && $account2->currency == 'CHF') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "GBP";
            $history->currency_to = "CHF";
            $history->currency_exchange = 1.14;
            $kwotaGBP = ($kwota * 1.14);
            $account2->balance = ($account2->balance + $kwotaGBP);
            $history2->currency = "GBP";
            $history2->currency_to = "CHF";
            $history2->currency_exchange = 1.14;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'GBP' && $account2->currency == 'PLN') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "GBP";
            $history->currency_to = "PLN";
            $history->currency_exchange = 5.44;
            $kwotaPLN = ($kwota * 5.44);
            $account2->balance = ($account2->balance + $kwotaPLN);
            $history2->currency = "GBP";
            $history2->currency_to = "PLN";
            $history2->currency_exchange = 5.44;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        // USD
        if($account->currency == 'USD' && $account2->currency == 'USD') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $account2->balance = ($account2->balance + $kwota);
            $history2->new_amount = $account2->balance;
            $history->currency = "USD";
            $history->currency_to = "USD";
            $history->currency_exchange = 1;
            $history2->currency = "USD";
            $history2->currency_to = "USD";
            $history2->currency_exchange = 1;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'USD' && $account2->currency == 'EUR') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "USD";
            $history->currency_to = "EUR";
            $history->currency_exchange = 0.94;
            $kwotaCHF = ($kwota * 0.94);
            $account2->balance = ($account2->balance + $kwotaCHF);
            $history2->currency = "USD";
            $history2->currency_to = "EUR";
            $history2->currency_exchange = 0.94;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'USD' && $account2->currency == 'GBP') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "USD";
            $history->currency_to = "GBP";
            $history->currency_exchange = 0.81;
            $kwotaUSD = ($kwota * 0.81);
            $account2->balance = ($account2->balance + $kwotaUSD);
            $history2->currency = "USD";
            $history2->currency_to = "GBP";
            $history2->currency_exchange = 0.81;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'USD' && $account2->currency == 'CHF') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "USD";
            $history->currency_to = "CHF";
            $history->currency_exchange = 0.93;
            $kwotaGBP = ($kwota * 0.93);
            $account2->balance = ($account2->balance + $kwotaGBP);
            $history2->currency = "USD";
            $history2->currency_to = "CHF";
            $history2->currency_exchange = 0.93;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'USD' && $account2->currency == 'PLN') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $kwota);
            $history->new_amount = $account->balance;
            $history->currency = "USD";
            $history->currency_to = "PLN";
            $history->currency_exchange = 4.42;
            $kwotaPLN = ($kwota * 4.42);
            $account2->balance = ($account2->balance + $kwotaPLN);
            $history2->currency = "USD";
            $history2->currency_to = "PLN";
            $history2->currency_exchange = 4.42;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        $account->save();
        $account2->save();
        $history->save();
        $history2->save();


        sleep(3);

        return view('transaction.success');
    }

    /*
     *
     *  Logika PRZELEWU
     *
     */

    public function edit(Request $request) {

        $account_id = $request->input('id');

        $account = Account::where('id_account', $account_id)->first();
        if($account){
            return view('transaction.panel',['account' => $account]);
        }
        else{
            return back();
        }
    }

    public function submit(Request $request){

        $account_id = $request->input('t_id');
        $account = Account::where('id_account', $account_id)->first();


        $type = $request->input('t');
        $typebus = $request->input('z');
        $typeroad = $request->input('b');
        $credit = $request->input('CRE');

        $investment = $request->input('INVES');

        if($investment == 'INVES'){
            $amount = $request->input('amount');

            if($account->balance < $amount){
                return view('failed.failed');
            }

            $account_inv = Investment::where('id_user',Auth::user()->id)->first();

            $account_inv->amount = $account_inv->amount + $amount;

            $account_inv->update();
        }

        if($investment == 'WITH'){
            $amount = $request->input('amount');

            if($account->balance < $amount){
                return view('failed.failed');
            }

            $account_inv = Investment::where('id_user',Auth::user()->id)->first();

            $account_inv->amount = $account_inv->amount - $amount;

            if($account_inv->amount <= 0) {
                $account_inv->amount = 0;
            }

            $account_inv->update();
        }

        if($credit == 'CREDIT'){
            $amount = $request->input('amount');
            $amount_credit = $request->input('credit_left');
            $credit_amount = $request->input('credit_amount');
            $total_rates = $request->input('total_rates');
            $one_rate = $request->input('one_rate');
            $end_credit = $request->input('end_credit');
            $id = $request->input('id');

            if($account->balance < $amount){
                return view('failed.failed');
            }

            $creditdata = Credits::where('id_user', Auth::user()->id)->where('status','during')->first();

            $credit_left = $amount_credit - $amount;

            if($credit_left <= 0) {
                $creditdata->status = 'paid';

                $paid_credit = new CreditHistorie();
                $paid_credit->id_user = Auth::user()->id;
                $paid_credit->id_c = $id;
                $paid_credit->credit_amount = $credit_amount;
                $paid_credit->total_rates = $total_rates;
                $paid_credit->end_credit = $end_credit;
                $paid_credit->status = 'paid';
                $paid_credit->one_rate = $one_rate;
                $paid_credit->save();

                $creditdata->update();
            }
            else {
                $rates = $creditdata->rates_left;
                $rates--;

                $creditdata->credit_left = $credit_left;

                $creditdata->rates_left = $rates;

                $creditdata->update();
            }




        }

        if($typeroad == 'ROAD'){

            $amount = $request->input('amount');

            if($account->balance < $amount){
                return view('failed.failed');
            }

            $road = new Roadticket();
            $road->id_user = Auth::user()->id;
            $road->rej = $request->input('rej');
            $road->road = $request->input('road');
            $road->amount = $amount;
            $road->full_road = $request->input('full_road');
            $road->qrcode = $request->input('qrcode');
            $road->long = $request->input('long');
            $road->save();
        }
        if($typebus == 'BUS'){

            $amount = $request->input('amount');

            if($account->balance < $amount){
                return view('failed.failed');
            }

            $bus = new Busticket();
            $bus->id_user = Auth::user()->id;
            $bus->city = $request->input('city');
            $bus->type = $request->input('type');
            $bus->time = $request->input('time');
            $bus->amount = $amount;
            $bus->qrcode = $request->input('qrcode');
            $bus->end_time = $request->input('end_time');
            $bus->save();
        }

        if($type == 'C' || $type == 'L' || $type == 'P'){

            $amount = $request->input('amount');

            if($account->balance < $amount){
                return view('failed.failed');
            }

            $ins = new Insurance();
            $ins->id_user = Auth::user()->id;
            $ins->type = $type;
            $ins->brand = $request->input('brand');
            $ins->cap = $request->input('cap');
            $ins->value = $request->input('value');
            $ins->kilometers = $request->input('kilometers');
            $ins->rejestracja = $request->input('rejestracja');
            $ins->production = $request->input('production');
            $ins->age = $request->input('age');
            $ins->gender = $request->input('gender');
            $ins->earnings = $request->input('earnings');
            $ins->profesion = $request->input('profesion');
            $ins->community_status = $request->input('status');
            $ins->sum_ins = $request->input('sum_ins');
            $ins->building_type = $request->input('type');
            $ins->sum_ins = $request->input('value');
            $ins->m2 = $request->input('m2');
            $ins->location = $request->input('location');
            $ins->city = $request->input('city');
            $ins->domicile = $request->input('domicile');
            $ins->year = $request->input('year');
            $ins->price = $amount;
            $ins->end_time = (date('Y')+1).date('-m-d');
            $ins->status = "paid";
            $ins->save();
        }

        $account_number_to = $request->input('tonumberaccount');
        $amount = $request->input('amount');

        $account2 = Account::where('account_number', $account_number_to)->first();

        if(!$account2){
            return view('transaction.panel', ['not_found' => 'Taki numer nie istnieje!', 'account' => $account ]);
        }
        if($account->account_number == $account2->account_number) {
            return view('transaction.panel', ['failed_account' => 'Nie możesz przelać na swoje konto!', 'account' => $account ]);
        }
        elseif($account->balance < $amount) {
            return view('transaction.panel', ['failed_amount' => 'Nie masz wystarczających środków na koncie!', 'account' => $account ]);
        }

        $user2 = User::where('id', $account2->id_user)->get();

        $history = new Historie();
        $history->id_user = Auth::user()->id;
        $history->id_account = $account->id_account;
        $history->id_user_to = $account2->id_user;
        $history->id_account_to = $account2->id_account;
        $history->account_number = $account->account_number;
        $history->account_number_to = $account2->account_number;
        $history->title = $request->input('title');
        $history->total_amount = $amount;
        $history->blik = 'n';

        $history2 = new Historie();
        $history2->id_user = $account2->id_user;
        $history2->id_account = $account2->id_account;
        $history2->id_user_to = Auth::user()->id;
        $history2->id_account_to = $account->id_account;
        $history2->account_number = $account2->account_number;
        $history2->account_number_to = $account->account_number;
        $history2->title = $request->input('title');
        $history2->total_amount = $amount;
        $history2->blik = 'n';

        // PLN
        if($account->currency == 'PLN' && $account2->currency == 'EUR') {
            $history2->old_amount = $account2->balance;

            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaEUR = Currency::convert()
                ->from('PLN')
                ->to('EUR')
                ->amount($amount)
                ->round(2)
                ->get();
            $history->currency = "PLN";
            $history->currency_to = "EUR";
            $history->currency_exchange = Currency::convert()
                ->from('EUR')
                ->to('PLN')
                ->get();
            $account2->balance = ($account2->balance + $kwotaEUR);
            $history2->currency = "PLN";
            $history2->currency_to = "EUR";
            $history2->currency_exchange = Currency::convert()
                ->from('EUR')
                ->to('PLN')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'PLN' && $account2->currency == 'CHF') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaCHF = Currency::convert()
                ->from('PLN')
                ->to('CHF')
                ->amount($amount)
                ->round(2)
                ->get();
            $history->currency = "PLN";
            $history->currency_to = "CHF";
            $history->currency_exchange = Currency::convert()
                ->from('CHF')
                ->to('PLN')
                ->get();
            $account2->balance = ($account2->balance + $kwotaCHF);
            $history2->currency = "PLN";
            $history2->currency_to = "CHF";
            $history2->currency_exchange = Currency::convert()
                ->from('CHF')
                ->to('PLN')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'PLN' && $account2->currency == 'USD') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaUSD = Currency::convert()
                ->from('PLN')
                ->to('USD')
                ->amount($amount)
                ->round(2)
                ->get();
            $history->currency = "PLN";
            $history->currency_to = "USD";
            $history->currency_exchange = Currency::convert()
                ->from('USD')
                ->to('PLN')
                ->get();
            $account2->balance = ($account2->balance + $kwotaUSD);
            $history2->currency = "PLN";
            $history2->currency_to = "USD";
            $history2->currency_exchange = Currency::convert()
                ->from('USD')
                ->to('PLN')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'PLN' && $account2->currency == 'GBP') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaGBP = Currency::convert()
                ->from('PLN')
                ->to('GBP')
                ->amount($amount)
                ->round(2)
                ->get();
            $history->currency = "PLN";
            $history->currency_to = "GBP";
            $history->currency_exchange = Currency::convert()
                ->from('GBP')
                ->to('PLN')
                ->get();
            $account2->balance = ($account2->balance + $kwotaGBP);
            $history2->currency = "PLN";
            $history2->currency_to = "GBP";
            $history2->currency_exchange = Currency::convert()
                ->from('GBP')
                ->to('PLN')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'PLN' && $account2->currency == 'PLN') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $account2->balance = ($account2->balance + $amount);
            $history->currency = "PLN";
            $history->currency_to = "PLN";
            $history->currency_exchange = 1;
            $history2->currency = "PLN";
            $history2->currency_to = "PLN";
            $history2->currency_exchange = 1;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        // EURO
        if($account->currency == 'EUR' && $account2->currency == 'EUR') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $account2->balance = ($account2->balance + $amount);
            $history->currency = "EUR";
            $history->currency_to = "EUR";
            $history->currency_exchange = 1;
            $history2->currency = "EUR";
            $history2->currency_to = "EUR";
            $history2->currency_exchange = 1;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->type = "W";
        }
        if($account->currency == 'EUR' && $account2->currency == 'CHF') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaCHF = Currency::convert()
                ->from('EUR')
                ->to('CHF')
                ->amount($amount)
                ->round(2)
                ->get();
            $account2->balance = ($account2->balance + $kwotaCHF);
            $history2->currency = "EUR";
            $history2->currency_to = "CHF";
            $history2->currency_exchange = Currency::convert()
                ->from('CHF')
                ->to('EUR')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->currency = "EUR";
            $history->currency_to = "CHF";
            $history->currency_exchange = Currency::convert()
                ->from('CHF')
                ->to('EUR')
                ->get();
            $history->type = "W";
        }
        if($account->currency == 'EUR' && $account2->currency == 'USD') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaUSD = Currency::convert()
                ->from('EUR')
                ->to('USD')
                ->amount($amount)
                ->round(2)
                ->get();
            $account2->balance = ($account2->balance + $kwotaUSD);
            $history2->currency = "EUR";
            $history2->currency_to = "USD";
            $history2->currency_exchange = Currency::convert()
                ->from('USD')
                ->to('EUR')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->currency = "EUR";
            $history->currency_to = "USD";
            $history->currency_exchange = Currency::convert()
                ->from('USD')
                ->to('EUR')
                ->get();
            $history->type = "W";

        }
        if($account->currency == 'EUR' && $account2->currency == 'GBP') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaGBP = Currency::convert()
                ->from('EUR')
                ->to('GBP')
                ->amount($amount)
                ->round(2)
                ->get();
            $account2->balance = ($account2->balance + $kwotaGBP);
            $history2->currency = "EUR";
            $history2->currency_to = "GBP";
            $history2->currency_exchange = Currency::convert()
                ->from('GBP')
                ->to('EUR')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->currency = "EUR";
            $history->currency_to = "GBP";
            $history->currency_exchange = Currency::convert()
                ->from('GBP')
                ->to('EUR')
                ->get();
            $history->type = "W";
        }
        if($account->currency == 'EUR' && $account2->currency == 'PLN') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaPLN = Currency::convert()
                ->from('EUR')
                ->to('PLN')
                ->amount($amount)
                ->round(2)
                ->get();
            $account2->balance = ($account2->balance + $kwotaPLN);
            $history2->currency = "EUR";
            $history2->currency_to = "PLN";
            $history2->currency_exchange = Currency::convert()
                ->from('PLN')
                ->to('EUR')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->currency = "EUR";
            $history->currency_to = "PLN";
            $history->currency_exchange = Currency::convert()
                ->from('PLN')
                ->to('EUR')
                ->get();
            $history->type = "W";
        }
        // CHF
        if($account->currency == 'CHF' && $account2->currency == 'CHF') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $account2->balance = ($account2->balance + $amount);
            $history2->currency = "CHF";
            $history2->currency_to = "CHF";
            $history2->currency_exchange = 1;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->currency = "CHF";
            $history->currency_to = "CHF";
            $history->currency_exchange = 1;
            $history->type = "W";
        }
        if($account->currency == 'CHF' && $account2->currency == 'EUR') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaCHF = Currency::convert()
                ->from('CHF')
                ->to('EUR')
                ->amount($amount)
                ->round(2)
                ->get();
            $account2->balance = ($account2->balance + $kwotaCHF);
            $history2->currency = "CHF";
            $history2->currency_to = "EUR";
            $history2->currency_exchange = Currency::convert()
                ->from('EUR')
                ->to('CHF')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->currency = "CHF";
            $history->currency_to = "EUR";
            $history->currency_exchange = Currency::convert()
                ->from('EUR')
                ->to('CHF')
                ->get();
            $history->type = "W";
        }
        if($account->currency == 'CHF' && $account2->currency == 'USD') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaUSD = Currency::convert()
                ->from('CHF')
                ->to('USD')
                ->amount($amount)
                ->round(2)
                ->get();
            $account2->balance = ($account2->balance + $kwotaUSD);
            $history2->currency = "CHF";
            $history2->currency_to = "USD";
            $history2->currency_exchange = Currency::convert()
                ->from('USD')
                ->to('CHF')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->currency = "CHF";
            $history->currency_to = "USD";
            $history->currency_exchange = Currency::convert()
                ->from('USD')
                ->to('CHF')
                ->get();
            $history->type = "W";
        }
        if($account->currency == 'CHF' && $account2->currency == 'GBP') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaGBP = Currency::convert()
                ->from('CHF')
                ->to('GBP')
                ->amount($amount)
                ->round(2)
                ->get();
            $account2->balance = ($account2->balance + $kwotaGBP);
            $history2->currency = "CHF";
            $history2->currency_to = "GBP";
            $history2->currency_exchange = Currency::convert()
                ->from('GBP')
                ->to('CHF')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->currency = "CHF";
            $history->currency_to = "GBP";
            $history->currency_exchange = Currency::convert()
                ->from('GBP')
                ->to('CHF')
                ->get();
            $history->type = "W";
        }
        if($account->currency == 'CHF' && $account2->currency == 'PLN') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaPLN = Currency::convert()
                ->from('CHF')
                ->to('PLN')
                ->amount($amount)
                ->round(2)
                ->get();
            $account2->balance = ($account2->balance + $kwotaPLN);
            $history2->currency = "CHF";
            $history2->currency_to = "PLN";
            $history2->currency_exchange = Currency::convert()
                ->from('PLN')
                ->to('CHF')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->currency = "CHF";
            $history->currency_to = "PLN";
            $history->currency_exchange = Currency::convert()
                ->from('PLN')
                ->to('CHF')
                ->get();
            $history->type = "W";
        }
        // GBP
        if($account->currency == 'GBP' && $account2->currency == 'GBP') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $account2->balance = ($account2->balance + $amount);
            $history2->currency = "GBP";
            $history2->currency_to = "GBP";
            $history2->currency_exchange = 1;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->currency = "GBP";
            $history->currency_to = "GBP";
            $history->currency_exchange = 1;
            $history->type = "W";

        }
        if($account->currency == 'GBP' && $account2->currency == 'EUR') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaCHF = Currency::convert()
                ->from('GBP')
                ->to('EUR')
                ->amount($amount)
                ->round(2)
                ->get();
            $account2->balance = ($account2->balance + $kwotaCHF);
            $history2->currency = "GBP";
            $history2->currency_to = "EUR";
            $history2->currency_exchange = Currency::convert()
                ->from('EUR')
                ->to('GBP')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->currency = "GBP";
            $history->currency_to = "EUR";
            $history->currency_exchange = Currency::convert()
                ->from('EUR')
                ->to('GBP')
                ->get();
            $history->type = "W";
        }
        if($account->currency == 'GBP' && $account2->currency == 'USD') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaUSD = Currency::convert()
                ->from('GBP')
                ->to('USD')
                ->amount($amount)
                ->round(2)
                ->get();
            $account2->balance = ($account2->balance + $kwotaUSD);
            $history2->currency = "GBP";
            $history2->currency_to = "USD";
            $history2->currency_exchange = Currency::convert()
                ->from('USD')
                ->to('GBP')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->currency = "GBP";
            $history->currency_to = "USD";
            $history->currency_exchange = Currency::convert()
                ->from('USD')
                ->to('GBP')
                ->get();
            $history->type = "W";
        }
        if($account->currency == 'GBP' && $account2->currency == 'CHF') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaGBP = Currency::convert()
                ->from('GBP')
                ->to('CHF')
                ->amount($amount)
                ->round(2)
                ->get();
            $account2->balance = ($account2->balance + $kwotaGBP);
            $history2->currency = "GBP";
            $history2->currency_to = "CHF";
            $history2->currency_exchange = Currency::convert()
                ->from('CHF')
                ->to('GBP')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->currency = "GBP";
            $history->currency_to = "CHF";
            $history->currency_exchange = Currency::convert()
                ->from('CHF')
                ->to('GBP')
                ->get();
            $history->type = "W";
        }
        if($account->currency == 'GBP' && $account2->currency == 'PLN') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaPLN = Currency::convert()
                ->from('GBP')
                ->to('PLN')
                ->amount($amount)
                ->round(2)
                ->get();
            $account2->balance = ($account2->balance + $kwotaPLN);
            $history2->currency = "GBP";
            $history2->currency_to = "PLN";
            $history2->currency_exchange = Currency::convert()
                ->from('PLN')
                ->to('GBP')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->currency = "GBP";
            $history->currency_to = "PLN";
            $history->currency_exchange = Currency::convert()
                ->from('PLN')
                ->to('GBP')
                ->get();
            $history->type = "W";
        }
        // USD
        if($account->currency == 'USD' && $account2->currency == 'USD') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $account2->balance = ($account2->balance + $amount);
            $history2->currency = "USD";
            $history2->currency_to = "USD";
            $history2->currency_exchange = 1;
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->currency = "USD";
            $history->currency_to = "USD";
            $history->currency_exchange = 1;
            $history->type = "W";
        }
        if($account->currency == 'USD' && $account2->currency == 'EUR') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaCHF = Currency::convert()
                ->from('USD')
                ->to('EUR')
                ->amount($amount)
                ->round(2)
                ->get();
            $account2->balance = ($account2->balance + $kwotaCHF);
            $history2->currency = "USD";
            $history2->currency_to = "EUR";
            $history2->currency_exchange = Currency::convert()
                ->from('EUR')
                ->to('USD')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->currency = "USD";
            $history->currency_to = "EUR";
            $history->currency_exchange = Currency::convert()
                ->from('EUR')
                ->to('USD')
                ->get();
            $history->type = "W";
        }
        if($account->currency == 'USD' && $account2->currency == 'GBP') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaUSD = Currency::convert()
                ->from('USD')
                ->to('GBP')
                ->amount($amount)
                ->round(2)
                ->get();
            $account2->balance = ($account2->balance + $kwotaUSD);
            $history2->currency = "USD";
            $history2->currency_to = "GBP";
            $history2->currency_exchange = Currency::convert()
                ->from('GBP')
                ->to('USD')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->currency = "USD";
            $history->currency_to = "GBP";
            $history->currency_exchange = Currency::convert()
                ->from('GBP')
                ->to('USD')
                ->get();
            $history->type = "W";
        }
        if($account->currency == 'USD' && $account2->currency == 'CHF') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaGBP = Currency::convert()
                ->from('USD')
                ->to('CHF')
                ->amount($amount)
                ->round(2)
                ->get();
            $account2->balance = ($account2->balance + $kwotaGBP);
            $history2->currency = "USD";
            $history2->currency_to = "CHF";
            $history2->currency_exchange = Currency::convert()
                ->from('CHF')
                ->to('USD')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->currency = "USD";
            $history->currency_to = "CHF";
            $history->currency_exchange = Currency::convert()
                ->from('CHF')
                ->to('USD')
                ->get();
            $history->type = "W";
        }
        if($account->currency == 'USD' && $account2->currency == 'PLN') {
            $history2->old_amount = $account2->balance;
            $history->old_amount = $account->balance;
            $account->balance = ($account->balance - $amount);
            $history->new_amount = $account->balance;
            $kwotaPLN = Currency::convert()
                ->from('USD')
                ->to('PLN')
                ->amount($amount)
                ->round(2)
                ->get();
            $account2->balance = ($account2->balance + $kwotaPLN);
            $history2->currency = "USD";
            $history2->currency_to = "PLN";
            $history2->currency_exchange = Currency::convert()
                ->from('PLN')
                ->to('USD')
                ->get();
            $history2->new_amount = $account2->balance;
            $history2->type = "P";
            $history->currency = "USD";
            $history->currency_to = "PLN";
            $history->currency_exchange = Currency::convert()
                ->from('PLN')
                ->to('USD')
                ->get();
            $history->type = "W";
        }
        $history->save();
        $history2->save();
        $account->save();
        $account2->save();

        sleep(1);

        return view('transaction.success');

    }
}
