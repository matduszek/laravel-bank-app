<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Insurance;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InsuranceController extends Controller
{
    public function property() {
        return view('insurances.property');
    }

    public function propertycalc(Request $request) {

        $request->validate([
            'type' => ['required'],
            'value' => ['required', 'integer', 'min:0', 'max:1000000' ],
            'm2' => ['required', 'integer', 'min:0', 'max:600'],
            'location' => ['required'],
            'city' => ['required', 'string'],
            'domicile' => ['required', 'string'],
            'year' => ['required', 'integer', 'min:1850', 'max:2025']
        ]);

        $type = $request->input('type');
        $value = $request->input('value');
        $m2 = $request->input('m2');
        $domicile = $request->input('domicile');
        $city = $request->input('city');
        $location = $request->input('location');
        $year = $request->input('year');

        $suma = 0;

        if($value > 0 && $value <=50000){
            $suma = $suma + 0.5;
        }
        if($value >= 50001 && $value <= 100000){
            $suma = $suma + 1;
        }
        if($value >= 100001 && $value <= 200000){
            $suma = $suma + 5;
        }
        if($value >= 200001 && $value <=500000){
            $suma = $suma + 8;
        }
        if($value > 500001 && $value <=1000000){
            $suma = $suma + 13;
        }
        else{
            $suma = $suma + 15;
        }

        if($m2 > 0 && $m2 <=50){
            $suma = $suma + 0.1;
        }
        if($m2 >= 51 && $m2 <= 100){
            $suma = $suma + 0.3;
        }
        if($m2 >= 101 && $m2 <= 150){
            $suma = $suma + 0.5;
        }
        if($m2 >= 151 && $m2 <=200){
            $suma = $suma + 0.8;
        }
        if($m2 >= 201 && $m2 <= 400){
            $suma = $suma + 1.3;
        }
        else{
            $suma = $suma + 2;
        }

        if($location == "Wies"){
            $suma = $suma + 0.1;
        }
        if($location == "Miasto"){
            $suma = $suma + 0.2;
        }

        if($type == "Mieszkanie"){
            $suma = $suma + 0.2;
        }
        if($type == "Dom"){
            $suma = $suma + 0.3;
        }
        if($type == "Dzialka"){
            $suma = $suma + 0.1;
        }

        if($year > 1850 && $year <= 1950){
            $suma = $suma + 10;
        }
        if($year > 1950 && $year <= 1980){
            $suma = $suma + 5;
        }
        if($year >= 1981 && $year <= 2000){
            $suma = $suma + 3;
        }
        if($year >= 2001 && $year <= 2005){
            $suma = $suma + 1.5;
        }
        if($year >= 2006 && $year <=2015){
            $suma = $suma + 0.8;
        }
        if($year >= 2016 && $year <= 2025){
            $suma = $suma + 0.5;
        }

        $rata = $value/$suma/12;

        $rata = round($rata,2);

        return view('insurances.propertydec',[
            'type' => $type,
            'value' => $value,
            'm2' => $m2,
            'domicile' => $domicile,
            'city' => $city,
            'location' => $location,
            'year' => $year,
            'amount' => $rata
        ]);
    }

    public function car() {
        return view('insurances.car');
    }

    public function carcalc(Request $request) {

        $request->validate([
            'brand' => ['required'],
            'cap' => ['required', 'numeric', 'min:0', 'max:10'],
            'value' => ['required', 'integer', 'min:0', 'max:500000'],
            'kilometers' => ['required', 'integer', 'min:0', 'max:500000'],
            'rejestracja' => ['required', 'unique:'.Insurance::class],
            'id_car' => ['required']
        ]);

        $brand = $request->input('brand');
        $cap = $request->input('cap');
        $value = $request->input('value');
        $kilometers = $request->input('kilometers');
        $rejestracja = $request->input('rejestracja');
        $production = $request->input('production');
        $id_car = $request->input('id_car');

        $suma = 0;

        // wartosc
        if($value>100 && $value <=5000){
            $suma = $suma + 0.2;
        }
        if($value>=5001 && $value <=10000){
            $suma = $suma + 0.5;
        }
        if($value>=10001 && $value <=15000){
            $suma = $suma + 0.7;
        }
        if($value>=15001 && $value <=25000){
            $suma = $suma + 0.9;
        }
        if($value>=25001 && $value <=40000){
            $suma = $suma + 1.2;
        }
        if($value>=40001 && $value <=60000){
            $suma = $suma + 1.5;
        }
        if($value>=60001 && $value <=80000){
            $suma = $suma + 1.8;
        }
        if($value>=80001 && $value <=100000){
            $suma = $suma + 2;
        }
        if($value>=100001 && $value <=150000){
            $suma = $suma + 3;
        }
        if($value>=150001 && $value <=200000){
            $suma = $suma + 3.3;
        }
        if($value>=200001 && $value <=250000){
            $suma = $suma + 3.6;
        }
        if($value>=250001 && $value <=300000){
            $suma = $suma + 3.9;
        }

        // przebieg
        if($kilometers>=0 && $kilometers <=50000){
            $suma = $suma + 0.5;
        }
        if($kilometers>=50001 && $kilometers <=150000){
            $suma = $suma + 1.5;
        }
        if($kilometers>=150001 && $kilometers <=250000){
            $suma = $suma + 2;
        }
        if($kilometers>=250001 && $kilometers <=350000){
            $suma = $suma + 2.5;
        }
        if($kilometers>=350001){
            $suma = $suma + 3;
        }

        // pojemnosc
        if($cap >= 0 && $cap <= 1.1){
            $suma = $suma + 0.5;
        }
        if($cap >= 1.2 && $cap <= 1.4){
            $suma = $suma + 1.5;
        }
        if($cap >= 1.5 && $cap <= 1.6){
            $suma = $suma + 2;
        }
        if($cap >= 1.7 && $cap <= 2.2){
            $suma = $suma + 2.5;
        }
        if($cap >= 2.5 && $cap <= 3){
            $suma = $suma + 3;
        }
        if($cap >= 3.1 && $cap <= 4.5){
            $suma = $suma + 4.5;
        }
        if($cap >= 5.0){
            $suma = $suma + 5;
        }

        if($production >= 1990 && $production <= 2000){
            $suma = $suma + 3;
        }
        if($production >= 2001 && $production <= 2005){
            $suma = $suma + 2;
        }
        if($production >= 2006 && $production <= 2009){
            $suma = $suma + 1.7;
        }
        if($production >= 2010 && $production <= 2015){
            $suma = $suma + 1.6;
        }
        if($production >= 2016 && $production <= 2020){
            $suma = $suma + 1.4;
        }
        if($production >= 2021){
            $suma = $suma + 1.3;
        }

        if($id_car >= 8){
            $suma = $suma + 0.3;
        }
        if($id_car >= 4 && $id_car <= 7){
            $suma = $suma + 0.5;
        }
        if($id_car >= 1 && $id_car <= 3){
            $suma = $suma + 0.9;
        }
        if($id_car < 1){
            $suma = $suma + 3;
        }

        $rata = ($value*1.5/$suma)/3/12;

        $rata = round($rata,2);

        return view('insurances.cardec',[
            'brand' => $brand,
            'cap' => $cap,
            'value'=> $value,
            'kilometers' => $kilometers,
            'production' => $production,
            'rejestracja' => $rejestracja,
            'id_car' => $id_car,
            'amount' => $rata]);
    }

    public function life() {
        return view('insurances.life');
    }

    public function lifecalc(Request $request) {

        $request->validate([
            'age' => ['required', 'before:-18 years'],
            'gender' => ['required'],
            'earnings' => ['required', 'integer', 'min:0', 'max:50000'],
            'profesion' => ['required'],
            'status' => ['required'],
            'sum_ins' => ['required']
        ]);

        $age = $request->input('age');
        $gender = $request->input('gender');
        $earnings = $request->input('earnings');
        $profesion = $request->input('profesion');
        $status = $request->input('status');
        $sum_ins = $request->input('sum_ins');

        $float = (integer) $sum_ins;

        $dateOfBirth = new DateTime($age);
        $today = new DateTime();
        $interval = $today->diff($dateOfBirth);
        $age_calc = $interval->y;

        $suma = 0;

        if($age >= 18 && $age <= 25){
            $suma = $suma + 0.2;
        }
        if($age >= 26 && $age <= 35){
            $suma = $suma + 0.5;
        }
        if($age >= 36 && $age <= 45){
            $suma = $suma + 0.9;
        }
        if($age >= 46 && $age <= 55){
            $suma = $suma + 1.1;
        }
        if($age >= 56 && $age <= 65){
            $suma = $suma + 1.3;
        }
        if($age >= 66 && $age <= 75){
            $suma = $suma + 1.5;
        }

        if($gender == 'Mezczyzna'){
            $suma = $suma + 0.3;
        }
        if($gender == "Kobieta"){
            $suma = $suma + 0.2;
        }

        if($status == 'Student'){
            $suma = $suma + 0.5;
        }
        if($status == 'Pracujacy'){
            $suma = $suma + 0.8;
        }
        if($status == "Emeryt"){
            $suma = $suma + 0.3;
        }

        if($profesion == 'Spawacz'){
            $suma = $suma + 1.5;
        }
        if($profesion == "Kierowca"){
            $suma = $suma + 1.4;
        }
        if($profesion == 'Informatyk'){
            $suma = $suma + 1.1;
        }
        if($profesion == "Lekarz"){
            $suma = $suma + 1;
        }
        if($profesion == "Sprzedawca"){
            $suma = $suma + 0.9;
        }

        $rata = ($sum_ins/$suma/50)/12;

        $rata = round($rata,2);

        return view('insurances.lifedec',[
                'age' => $age_calc,
                'gender' => $gender,
                'earnings' => $earnings,
                'profesion' => $profesion,
                'status' => $status,
                'sum_ins' => $sum_ins,
                'amount' => $rata]);
    }

    public function lifepayment(Request $request) {
        $account = Account::where('id_user',Auth::user()->id)->where('blik','T')->first();
        $user2 = User::where('phone_number', '000000000')->first();
        $account2 = Account::where('id_user',$user2->id)->first();

        if(!$account){
            return view('failed.not_found');
        }

        $rata = $request->input('amount');

        $age = $request->input('age');
        $gender = $request->input('gender');
        $earnings = $request->input('earnings');
        $profesion = $request->input('profesion');
        $status = $request->input('status');
        $sum_ins = $request->input('sum_ins');

        return view('insurances.lifepayment',[
            'account' => $account,
            'special_number' => $account2->account_number,
            'age' => $age,
            'gender' => $gender,
            'earnings' => $earnings,
            'profesion' => $profesion,
            'status' => $status,
            'sum_ins' => $sum_ins,
            'amount' => $rata]);
    }

    public function carpayment(Request $request) {
        $account = Account::where('id_user',Auth::user()->id)->where('blik','T')->first();
        $user2 = User::where('phone_number', '000000000')->first();
        $account2 = Account::where('id_user',$user2->id)->first();

        if(!$account){
            return view('failed.not_found');
        }

        $rata = $request->input('amount');

        $brand = $request->input('brand');
        $cap = $request->input('cap');
        $value = $request->input('value');
        $kilometers = $request->input('kilometers');
        $rejestracja = $request->input('rejestracja');
        $production = $request->input('production');
        $id_car = $request->input('id_car');

        return view('insurances.carpayment',[
            'account' => $account,
            'special_number' => $account2->account_number,
            'brand' => $brand,
            'cap' => $cap,
            'value'=> $value,
            'kilometers' => $kilometers,
            'rejestracja'=> $rejestracja,
            'production' => $production,
            'id_car' => $id_car,
            'amount' => $rata]);
    }

    public function propertypayment(Request $request) {
        $account = Account::where('id_user',Auth::user()->id)->where('blik','T')->first();
        $user2 = User::where('phone_number', '000000000')->first();
        $account2 = Account::where('id_user',$user2->id)->first();

        if(!$account){
            return view('failed.not_found');
        }

        $rata = $request->input('amount');

        $type = $request->input('type');
        $value = $request->input('value');
        $m2 = $request->input('m2');
        $domicile = $request->input('domicile');
        $city = $request->input('city');
        $location = $request->input('location');
        $year = $request->input('year');

        return view('insurances.propertypayment',[
            'account' => $account,
            'special_number' => $account2->account_number,
            'amount' => $rata,
            'type' => $type,
            'value' => $value,
            'city' => $city,
            'domicile' => $domicile,
            'm2' => $m2,
            'location' => $location,
            'year' => $year,]);
    }

    public function show() {

        return view('insurances.panel');
    }

    public function myins() {

        $ins = Insurance::where('id_user', Auth::user()->id)->orderBy('created_at','desc')->Paginate(4);

        return view('insurances.myins', ['ins' => $ins ]);
    }
}
