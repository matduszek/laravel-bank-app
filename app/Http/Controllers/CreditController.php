<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Card;
use App\Models\CreditHistorie;
use App\Models\Credits;
use App\Models\Historie;
use App\Models\User;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreditController extends Controller
{
    public function show() {
        $if_exists = DB::table('accounts')->where('id_user',Auth::user()->id)->where('type','K')->first();

        $user = DB::table('accounts')->where('id_user',Auth::user()->id)->first();

        $credit_account = Account::where('id_user',Auth::user()->id)->where('type','K')->get();

        $details = Credits::where('id_user',Auth::user()->id)->get();

        if(!$if_exists && !$user){
            $x = false;
        }
        else{
            $x = true;
        }

        return view('credits.panel',['x' => $x, 'k' => $credit_account, 'det' => $details]);
    }

    public function dec(Request $request) {

        $request->validate([
            'amount' => ['required'],
            'earnings' => ['required'],
            'type' => ['required','string', 'in:UOP,UZ'],
            'length' => ['required','int'],
            'credit_length' => ['required', 'int']
        ]);

        $ammount = $request->input('amount');
        $earnings = $request->input('earnings');
        $type_contract = $request->input('type');
        $work_time = $request->input('length');
        $how_long_credit = $request->input('credit_length');
        $to_round = ($ammount/$how_long_credit);
        $one_rate = round($to_round,2);

        if($earnings < 2000) {
            return redirect()->back()->with('low_earnings','Za małe zarobki żeby wziąć kredyt!');
        }
        if($ammount > 200000) {
            return redirect()->back()->with('high_amount','Możesz aplikować na kwote nie wiekszą niż 200000 PLN!');
        }

        if($ammount > 0 && $ammount <= 50000){
            if($earnings >= 2000 && $work_time >= 12 && $how_long_credit >= 24){
                return view('credits.decision', [
                    'kwota' => $ammount,
                    'zar' => $earnings,
                    'typ' => $type_contract,
                    'ile_p'=> $work_time,
                    'ile_rat' => $how_long_credit,
                    'ile_wyn' => $one_rate
                ]);
            }
            return redirect()->back()->with('failed','Nie spełniasz warunków!');
        }
        if($ammount >= 50001 && $ammount <= 100000){
            if($earnings >= 3500 && $type_contract == "UOP" && $work_time >= 24 && $how_long_credit >= 65){
                return view('credits.decision', [
                    'kwota' => $ammount,
                    'zar' => $earnings,
                    'typ' => $type_contract,
                    'ile_p' => $work_time,
                    'ile_rat' => $how_long_credit,
                    'ile_wyn' => $one_rate
                ]);
            }
            return redirect()->back()->with('failed','Nie spełniasz warunków!');
        }
        if($ammount >= 100001 && $ammount <= 150000){
            if($earnings>=5500 && $type_contract == "UOP" && $work_time >= 36 && $how_long_credit >= 75){
                return view('credits.decision', ['kwota' => $ammount,
                    'zar' => $earnings,
                    'typ' => $type_contract,
                    'ile_p'=> $work_time,
                    'ile_rat' => $how_long_credit,
                    'ile_wyn' => $one_rate
                ]);
            }
            return redirect()->back()->with('failed','Nie spełniasz warunków!');
        }
        if($ammount >= 150001 && $ammount <= 200000){
            if($earnings>=8000 && $type_contract == "UOP" && $work_time >= 48 && $how_long_credit >= 85){
                return view('credits.decision', [
                    'kwota' => $ammount,
                    'zar' => $earnings,
                    'typ' => $type_contract,
                    'ile_p'=> $work_time,
                    'ile_rat' => $how_long_credit,
                    'ile_wyn' => $one_rate
                ]);
            }
            return redirect()->back()->with('failed','Nie spełniasz warunków!');
        }
    }


    /*
     *
     *  Logika kredytu
     *
     */
    public function check(Request $request) {

        $request->validate([
            'amount' => ['required'],
            'earnings' => ['required'],
            'type' => ['required','string', 'in:UOP,UZ'],
            'length' => ['required','int'],
            'credit_length' => ['required', 'int']

        ]);

        $kwota = $request->input('amount');
        $zarobki = $request->input('earnings');
        $typ_umowy = $request->input('type');
        $ile_pracujemy = $request->input('length');
        $na_ile_chcemy_kredyt = $request->input('credit_length');


        $date = new DateTime();
        $date->add(new DateInterval('P'.$na_ile_chcemy_kredyt.'M'));
        $end_credit = $date->format('d-m-Y');

        $date = new DateTime();
        $today = ltrim($date->format('d'), '0');

        $creditdata = new Credits();
        $creditdata->id_user = Auth::user()->id;
        $creditdata->credit_amount = $kwota;
        $creditdata->credit_left = $kwota;
        $creditdata->earnings = $zarobki;
        $creditdata->type = $typ_umowy;
        $creditdata->day_to_pay = $today;
        $creditdata->end_credit = $end_credit;
        $creditdata->status = 'during';
        $creditdata->work_length = $ile_pracujemy;
        $creditdata->total_rates = $na_ile_chcemy_kredyt;
        $to_round = ($kwota/$na_ile_chcemy_kredyt);
        $creditdata->one_rate = round($to_round, 2);


        if($zarobki < 2000) {
            return redirect()->back()->with('low_earnings','Za małe zarobki żeby wziąć kredyt!');
        }
        if($kwota > 200000) {
            return redirect()->back()->with('high_amount','Możesz aplikować na kwote nie wiekszą niż 200000 PLN!');
        }
        if($kwota > 0 && $kwota <= 50000){
            if($zarobki>=2000 && $ile_pracujemy >= 12 && $na_ile_chcemy_kredyt >= 24){
                $credit = new Account();
                $card = new Card();
                $credit->id_user = Auth::user()->id;
                $credit->balance = $kwota;
                $credit->type = "K";
                $credit->account_number = fake()->creditCardNumber();
                $credit->blik = "N";
                $credit->currency = "PLN";
                $card->id_user = Auth::user()->id;
                $card->cvv = fake()->numberBetween(100,999);
                $today = date('Y');
                $card->expires = date('Y', strtotime('+4 years', strtotime($today)));
                $card->card_number = fake()->unique()->creditCardNumber();
                $card->type = 'K';
                $credit->save();
                $card->save();
                $creditdata->save();

                sleep(2);
                return view('credits.success');
            }
            return redirect()->back()->with('failed','Nie spełniasz warunków!');
        }
        if($kwota >= 50001 && $kwota <= 100000){
            if($zarobki>=3500 && $typ_umowy == "UOP" && $ile_pracujemy >= 24 && $na_ile_chcemy_kredyt >= 65){
                $credit = new Account();
                $card = new Card();
                $credit->id_user = Auth::user()->id;
                $credit->balance = $kwota;
                $credit->type = "K";
                $credit->account_number = fake()->creditCardNumber();
                $credit->blik = "N";
                $credit->currency = "PLN";
                $card->id_user = Auth::user()->id;
                $card->cvv = fake()->numberBetween(100,999);
                $today = date('Y');
                $card->expires = date('Y', strtotime('+4 years', strtotime($today)));
                $card->card_number = fake()->unique()->creditCardNumber();
                $card->type = 'K';
                $credit->save();
                $card->save();
                $creditdata->save();

                sleep(2);
                return view('credits.success');
            }
            return redirect()->back()->with('failed','Nie spełniasz warunków!');
        }
        if($kwota >= 100001 && $kwota <= 150000){
            if($zarobki>=5500 && $typ_umowy == "UOP" && $ile_pracujemy >= 36 && $na_ile_chcemy_kredyt >= 75){
                $credit = new Account();
                $card = new Card();
                $credit->id_user = Auth::user()->id;
                $credit->balance = $kwota;
                $credit->type = "K";
                $credit->account_number = fake()->creditCardNumber();
                $credit->blik = "N";
                $credit->currency = "PLN";
                $card->id_user = Auth::user()->id;
                $card->cvv = fake()->numberBetween(100,999);
                $today = date('Y');
                $card->expires = date('Y', strtotime('+4 years', strtotime($today)));
                $card->card_number = fake()->unique()->creditCardNumber();
                $card->type = 'K';
                $credit->save();
                $card->save();
                $creditdata->save();

                sleep(2);
                return view('credits.success');
            }
            return redirect()->back()->with('failed','Nie spełniasz warunków!');
        }
        if($kwota >= 150001 && $kwota <= 200000){
            if($zarobki>=8000 && $typ_umowy == "UOP" && $ile_pracujemy >= 48 && $na_ile_chcemy_kredyt >= 85){
                $credit = new Account();
                $card = new Card();
                $credit->id_user = Auth::user()->id;
                $credit->balance = $kwota;
                $credit->type = "K";
                $credit->account_number = fake()->creditCardNumber();
                $credit->blik = "N";
                $credit->currency = "PLN";
                $card->id_user = Auth::user()->id;
                $card->cvv = fake()->numberBetween(100,999);
                $today = date('Y');
                $card->expires = date('Y', strtotime('+4 years', strtotime($today)));
                $card->card_number = fake()->unique()->creditCardNumber();
                $card->type = 'K';
                $credit->save();
                $card->save();
                $creditdata->save();

                sleep(2);
                return view('credits.success');
            }
            return redirect()->back()->with('failed','Nie spełniasz warunków!');
        }

    }

    public function payment(Request $request) {
        $account = Account::where('id_user',Auth::user()->id)->where('blik','T')->first();
        $user2 = User::where('phone_number', '222222222')->first();
        $account2 = Account::where('id_user',$user2->id)->first();

        $credit_left = $request->input('credit_left');
        $amount = $request->input('amount');
        $credit_amount = $request->input('credit_amount');
        $one_rate = $request->input('one_rate');
        $total_rates = $request->input('total_rates');
        $end_credit = $request->input('end_credit');
        $id = $request->input('id');

        if(!$account){
            return view('failed.not_found');
        }

        return view('credits.payment', [
            'account' => $account,
            'amount' => $amount,
            'credit_amount' => $credit_amount,
            'total_rates' => $total_rates,
            'id_credit' => $id,
            'end_credit' => $end_credit,
            'one_rate' => $one_rate,
            'credit_left' => $credit_left,
            'special_number' => $account2->account_number,
        ]);
    }

    public function showapp() {

        $exists = Credits::where('id_user',Auth::user()->id)->where('status', 'during')->exists();
        if ($exists) {
            return view('failed.credit');
        } else {
            return view('credits.application');
        }
    }

    public function history() {
        $credit = CreditHistorie::where('id_user', Auth::user()->id)->get();

        if(!$credit){
            $x = false;
        }
        else{
            $x = true;
        }

        return view('credits.history', ['his' => $credit, 'x' => $x]);
    }
}
