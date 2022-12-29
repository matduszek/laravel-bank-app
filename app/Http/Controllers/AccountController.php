<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\BankTransaction;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Faker\Factory;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function add() {
        return view('account.add');
    }

    public function save(Request $request)
    {
        $typ = $request->input('type');
        $waluta = $request->input('currency');

        if($typ == 'N' && $waluta == 'CHF') {
            return redirect()->back()->with('can_not', 'Normalne konto musi posiadać PLN!');
        }
        if($typ == 'N' && $waluta == 'EUR') {
            return redirect()->back()->with('can_not', 'Normalne konto musi posiadać PLN!');
        }
        if($typ == 'N' && $waluta == 'USD') {
            return redirect()->back()->with('can_not', 'Normalne konto musi posiadać PLN!');
        }
        if($typ == 'N' && $waluta == 'GBP') {
            return redirect()->back()->with('can_not', 'Normalne konto musi posiadać PLN!');
        }

        $ifshow = DB::table('accounts')->where('id_user',Auth::user()->id)->where('type','K')->first();

        $user = DB::table('accounts')->where('id_user',Auth::user()->id)->first();

        if ($user) {
            $account = new Account();
            $account->id_user = Auth::user()->id;
            $account->balance = 0;
            $account->type = $typ;
            $account->account_number = fake()->unique()->creditCardNumber();
            $account->blik = 'N';
            $account->currency = $waluta;
            $account->save();
        }else{
            $account = new Account();
            $account->id_user = Auth::user()->id;
            $account->type = $typ;
            $account->balance = 50;
            $account->account_number = fake()->creditCardNumber();
            $account->blik = 'T';
            $account->currency = $waluta;
            $account->save();
        }

        return view('account.success');
    }

    public function show() {
        //array
       $mya = Account::where('id_user',Auth::user()->id)->get();

       $user = DB::table('accounts')->where('id_user',Auth::user()->id)->first();

       if(!$user){
           $x = false;
       }
       else{
           $x = true;
       }

        return view('account.accounts',[
            'mya' => $mya, 'x' => $x
        ]);

    }

}
