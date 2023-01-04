<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Account;
use App\Models\Historie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function generate (Request $request) {
        $title = $request->input('title');
        $number_account = $request->input('number_account');
        $number_account_to = $request->input('number_account_to');
        $amount = $request->input('amount');
        $a_c = $request->input('a_c');
        $sal_b = $request->input('sal_b');
        $sal_b_c = $request->input('sal_b_c');
        $sal_a = $request->input('sal_a');
        $sal_a_c = $request->input('sal_a_c');
        $time = $request->input('time');
        $type = $request->input('type');
        $blik = $request->input('blik');


        return view('history.generate', [
            'title' => $title,
            'number_account' => $number_account,
            'number_account_to' => $number_account_to,
            'amount' => $amount,
            'a_c' => $a_c,
            'sal_b' => $sal_b,
            'sal_b_c' => $sal_b_c,
            'sal_a' => $sal_a,
            'sal_a_c' => $sal_a_c,
            'time' => $time,
            'type' => $type,
            'blik' => $blik
        ]);

    }

    public function generate2 (Request $request) {
        $title = $request->input('title');
        $number_account = $request->input('number_account');
        $number_account_to = $request->input('number_account_to');
        $amount = $request->input('amount');
        $curex = $request->input('curex');
        $a_c = $request->input('a_c');
        $sal_b = $request->input('sal_b');
        $sal_b_c = $request->input('sal_b_c');
        $sal_a = $request->input('sal_a');
        $sal_a_c = $request->input('sal_a_c');
        $time = $request->input('time');
        $type = $request->input('type');
        $blik = $request->input('blik');

        return view('history.generate2', [
            'title' => $title,
            'number_account' => $number_account,
            'number_account_to' => $number_account_to,
            'amount' => $amount,
            'curex' => $curex,
            'a_c' => $a_c,
            'sal_b' => $sal_b,
            'sal_b_c' => $sal_b_c,
            'sal_a' => $sal_a,
            'sal_a_c' => $sal_a_c,
            'time' => $time,
            'type' => $type,
            'blik' => $blik
        ]);

    }

    public function show2(){
        $user = Auth::user()->id;

        $ifshow = DB::table('histories')->where('id_user',Auth::user()->id)->first();

        if(!$ifshow){
            $x = false;
        }
        else{
            $x = true;
        }
        //->get();
        $list = Historie::where('id_user',$user)->where('type','P')->orderBy('created_at','desc')->simplePaginate(4);

        return view('history.Plist',['list' => $list, 'x' => $x]);
    }

    public function show(){

        $user = Auth::user()->id;

        $ifshow = DB::table('histories')->where('id_user',Auth::user()->id)->first();

        if(!$ifshow){
            $x = false;
        }
        else{
            $x = true;
        }
        //->get();
        $list = Historie::where('id_user',$user)->where('type','W')->orderBy('created_at','desc')->Paginate(4);

        return view('history.list',['list' => $list, 'x' => $x]);
    }

}
