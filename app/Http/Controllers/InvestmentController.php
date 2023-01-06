<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Investment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestmentController extends Controller
{
    public function payment() {
        $account = Account::where('id_user',Auth::user()->id)->where('blik','T')->first();
        $account_inv = Account::where('id_user',Auth::user()->id)->where('type','I')->first();

        return view('investment.payment', ['account' => $account, 'special_number' => $account_inv->account_number]);
    }

    public function withdraw() {
        $account = Account::where('id_user',Auth::user()->id)->where('type','I')->first();
        $account_inv = Account::where('id_user',Auth::user()->id)->where('blik','T')->first();

        return view('investment.withdraw', ['account' => $account, 'special_number' => $account_inv->account_number]);
    }

    public function save() {

        $account = new Account();
        $account->id_user = Auth::user()->id;
        $account->balance = 0;
        $account->type = 'I';
        $account->account_number = fake()->unique()->creditCardNumber();
        $account->blik = 'N';
        $account->currency = 'PLN';

        $investment = new Investment();
        $investment->id_user = Auth::user()->id;
        $investment->maturity_date = Carbon::now();
        $investment->amount = 0;

        $investment->save();
        $account->save();

        return view('investment.success');
    }

    public function create() {
        return view('investment.create');
    }

    public function show() {
        $exist = Investment::where('id_user', Auth::user()->id)->first();
        $exist2 = Account::where('id_user', Auth::user()->id)->where('blik','T')->first();

        if($exist) {
            $x = true;
        }
        elseif(!$exist) {
            $x = false;
        }

        if($exist2) {
            $y = true;
        }
        else {
            $y = false;
        }

        return view('investment.panel', ['x' => $x, 'y' => $y, 'inv' => $exist]);
    }
}
