<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    public function card() {
        $account = Account::where('id_user', Auth::user()->id)->get();

        $card_data = Card::where('id_user', Auth::user()->id)->get();


        if(!$card_data){
            $x = false;
        }
        else{
            $x = true;
        }

        return view('card.card', ['acc' => $account, 'check' => $x,'card' => $card_data]);
    }
}
