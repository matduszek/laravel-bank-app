<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Dompdf\Dompdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('main');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

require __DIR__.'/adminauth.php';

Route::middleware('auth')->group(function () {

    /*
     *  Tworzenie i zapisywanie rachunku walutowego
     */
    Route::get('add_account', [\App\Http\Controllers\AccountController::class,'add'])->name('account.add');
    Route::post('add_account/save', [\App\Http\Controllers\AccountController::class,'save'])->name('account.save');
    /*
     *  Wyswietlanie kont
     */
    Route::get('/me/accounts', [\App\Http\Controllers\AccountController::class,'show'])->name('show.accounts');
    /*
     *  Panele transakcji blik i przelew normalny
     */
    Route::match(['get','post'],'/transaction',[\App\Http\Controllers\TransactionController::class,'edit'])->name('transaction.edit');
    Route::match(['get','post'],'/transaction/save', [\App\Http\Controllers\TransactionController::class,'submit'])->name('transaction.post');
    Route::match(['get','post'],'/blik',[\App\Http\Controllers\TransactionController::class,'show'])->name('transaction.show');
    Route::match(['get','post'],'/blik/save',[\App\Http\Controllers\TransactionController::class,'logicblik'])->name('transaction.blik');
    /*
     *  Kredyty
     */
    Route::get('/credit',[\App\Http\Controllers\CreditController::class,'show'])->name('credit.panel');
    Route::get('/credit/application', [\App\Http\Controllers\CreditController::class,'showapp'])->name('show.app');
    Route::match(['get','post'],'/credit/decision', [\App\Http\Controllers\CreditController::class,'dec'])->name('decision.panel');
    Route::match(['get','post'],'/credit/application/check', [\App\Http\Controllers\CreditController::class,'check'])->name('credit.application');
    /*
     *  Kantor
     */
    Route::match(['get','post'],'/currency/exchange',[\App\Http\Controllers\CurrenciesController::class,'show'])->name('currency.panel');
    Route::match(['get','post'],'/currencyd/exchange/check',[\App\Http\Controllers\CurrenciesController::class,'check'])->name('currency.check');
    /*
     *  Historia transakcji i generowanie potwierdzeń
     */
    Route::match(['get','post'],'/generate/outgoing',[\App\Http\Controllers\HistoryController::class,'generate'])->name('history.generate');
    Route::match(['get','post'],'/generate/incoming',[\App\Http\Controllers\HistoryController::class,'generate2'])->name('history.generate2');
    Route::get('/history/transactions/outgoing',[\App\Http\Controllers\HistoryController::class,'show'])->name('show.transactions');
    Route::get('/history/transactions/incoming',[\App\Http\Controllers\HistoryController::class,'show2'])->name('show2.transactions');
    /*
     *  Wyswietlanie ubezpieczen
     */
    Route::get('/insurances',[\App\Http\Controllers\InsuranceController::class,'show'])->name('insurance.panel');
    /*
     *  Ubezpieczenia (zycie)
     */
    Route::get('/life',[\App\Http\Controllers\InsuranceController::class,'life'])->name('life.check');
    Route::post('/life/calc',[\App\Http\Controllers\InsuranceController::class,'lifecalc'])->name('life.calculations');
    Route::match(['get','post'],'/life/payment',[\App\Http\Controllers\InsuranceController::class,'lifepayment'])->name('lifedec.payment');
    /*
     *  Ubezpieczenia (auta)
     */
    Route::get('/cars',[\App\Http\Controllers\InsuranceController::class,'car'])->name('car.check');
    Route::post('/car/calc',[\App\Http\Controllers\InsuranceController::class,'carcalc'])->name('car.calculations');
    Route::match(['get','post'],'/car/payment',[\App\Http\Controllers\InsuranceController::class,'carpayment'])->name('cardec.payment');
    /*
     *  Ubezpieczenia (nierchomosc)
     */
    Route::get('/property',[\App\Http\Controllers\InsuranceController::class,'property'])->name('property.check');
    Route::post('/property/calc',[\App\Http\Controllers\InsuranceController::class,'propertycalc'])->name('property.calculations');
    Route::match(['get','post'],'/property/payment',[\App\Http\Controllers\InsuranceController::class,'propertypayment'])->name('propertydec.payment');
    /*
     *  Wyswietlanie ubezpieczen
     */
    Route::match(['get','post'],'/me/insurances',[\App\Http\Controllers\InsuranceController::class,'myins'])->name('myins.show');
    /*
     *  Panel biletow
     */
    Route::get('/tickets', [\App\Http\Controllers\TicketController::class,'show'])->name('show.tickets');
    /*
     *  Bilety komunikacyjne
     */
    Route::get('/bus/ticket',[\App\Http\Controllers\TicketController::class,'bus'])->name('bus.check');
    Route::post('/bus/calc',[\App\Http\Controllers\TicketController::class,'buscalc'])->name('bus.calculations');
    Route::match(['get','post'],'/bus/payment',[\App\Http\Controllers\TicketController::class,'buspayment'])->name('busdec.payment');
    /*
     *  Bilety autostradowe
     */
    Route::get('/road/ticket',[\App\Http\Controllers\TicketController::class,'road'])->name('road.check');
    Route::post('/road/calc',[\App\Http\Controllers\TicketController::class,'roadcalc'])->name('road.calculations');
    Route::match(['get','post'],'/road/payment',[\App\Http\Controllers\TicketController::class,'roadpayment'])->name('roaddec.payment');
    /*
     *  Wyswietlanie biletow
     */
    Route::match(['get','post'],'/me/busticket', [\App\Http\Controllers\TicketController::class,'showmyticketsbus'])->name('show.bustickets');
    Route::match(['get','post'],'/me/roadticket', [\App\Http\Controllers\TicketController::class,'showmyticketsroad'])->name('show.roadtickets');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

