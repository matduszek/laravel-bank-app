<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Busticket;
use App\Models\Roadticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Picqer\Barcode\BarcodeGeneratorPNG;

class TicketController extends Controller
{
    public function show() {
        return view('tickets.panel');
    }

    public function bus() {
        return view('tickets.bus');
    }
    public function road() {
        return view('tickets.road');
    }
    public function roadcalc(Request $request) {

        $request->validate([
            'rejestracja' => ['required'],
            'road' => ['required'],
        ]);

        $rej = $request->input('rejestracja');
        $road = $request->input('road');

        $amount = 0;

        if($road == 'A1o1'){
            $amount = 29.90;
            $full_road = "Toruń - Gdańsk";
            $long = 152;
        }
        if($road == 'A2o1'){
            $amount = 93;
            $full_road = "Konin - Świecko";
            $long = 252;
        }
        if($road == 'A2o2'){
            $amount = 9.90;
            $full_road = "Konin - Stryków";
            $long = 99;
        }
        if($road == 'A3o1'){
            $amount = 16.20;
            $full_road = "Wrocław - Sośnice";
            $long = 160;
        }
        if($road == 'A3o2'){
            $amount = 24;
            $full_road = "Katowice - Kraków";
            $long = 61;
        }

        return view('tickets.roaddec',[
            'rej' => $rej,
            'road' => $road,
            'amount' => $amount,
            'full_road' => $full_road,
            'long' => $long]);
    }

    public function roadpayment(Request $request) {
        $account = Account::where('id_user',Auth::user()->id)->where('blik','T')->first();
        $user2 = User::where('phone_number', '111111111')->first();
        $account2 = Account::where('id_user',$user2->id)->first();

        if(!$account){
            return view('failed.not_found');
        }

        $rej = $request->input('rej');
        $road = $request->input('road');
        $amount = $request->input('amount');
        $full_road = $request->input('full_road');
        $long = $request->input('long');

        return view('tickets.roadpayment', [
            'account' => $account,
            'special_number' => $account2->account_number,
            'rej' => $rej,
            'road' => $road,
            'amount' => $amount,
            'full_road' => $full_road,
            'long' => $long,
        ]);
    }

    public function buscalc (Request $request){

        $request->validate([
            'city' => ['required'],
            'type' => ['required'],
            'time' => ['required']
        ]);

        $city = $request->input('city');
        $type = $request->input('type');
        $time = $request->input('time');

        $date = date("Y-m-d H:i:s");

        $suma = 0;

        if($type == 'Normalny' && $time == '15'){
            $suma = 5;
            $new_date = date("Y-m-d H:i:s", strtotime("+15 minutes", strtotime($date)));
        }
        if($type == 'Normalny' && $time == '30'){
            $suma = 6;
            $new_date = date("Y-m-d H:i:s", strtotime("+30 minutes", strtotime($date)));
        }
        if($type == 'Normalny' && $time == '1'){
            $suma = 8;
            $new_date = date("Y-m-d H:i:s", strtotime("+1 hour", strtotime($date)));
        }
        if($type == 'Normalny' && $time == '24'){
            $suma = 14;
            $new_date = date("Y-m-d H:i:s", strtotime("+24 hour", strtotime($date)));
        }
        if($type == 'Ulgowy' && $time == '15'){
            $suma = 3;
            $new_date = date("Y-m-d H:i:s", strtotime("+15 minutes", strtotime($date)));
        }
        if($type == 'Ulgowy' && $time == '30'){
            $suma = 4.50;
            $new_date = date("Y-m-d H:i:s", strtotime("+30 minutes", strtotime($date)));
        }
        if($type == 'Ulgowy' && $time == '1'){
            $suma = 6;
            $new_date = date("Y-m-d H:i:s", strtotime("+1 hour", strtotime($date)));
        }
        if($type == 'Ulgowy' && $time == '24'){
            $suma = 10;
            $new_date = date("Y-m-d H:i:s", strtotime("+24 hour", strtotime($date)));
        }

        return view('tickets.busdec', [
            'city' => $city,
            'type' => $type,
            'time' => $time,
            'end_time' => $new_date,
            'amount' => $suma
        ]);
    }

    public function buspayment(Request $request) {

        $account = Account::where('id_user',Auth::user()->id)->where('blik','T')->first();
        $user2 = User::where('phone_number', '111111111')->first();
        $account2 = Account::where('id_user',$user2->id)->first();

        if(!$account){
            return view('failed.not_found');
        }

        $city = $request->input('city');
        $type = $request->input('type');
        $time = $request->input('time');
        $amount = $request->input('amount');
        $end_time = $request->input('end_time');

        return view('tickets.buspayment', [
            'account' => $account,
            'special_number' => $account2->account_number,
            'city' => $city,
            'type' => $type,
            'end_time' => $end_time,
            'time' => $time,
            'amount' => $amount
        ]);
    }


    public function showmyticketsbus() {
        $tick = Busticket::where('id_user',Auth::user()->id)->orderBy('created_at','desc')->Simplepaginate(4);

        return view('tickets.mybustickets', ['tick' => $tick]);
    }

    public function showmyticketsroad() {
        $tick = Roadticket::where('id_user',Auth::user()->id)->orderBy('created_at','desc')->Simplepaginate(4);

        return view('tickets.myroadtickets', ['tick' => $tick]);
    }
}
