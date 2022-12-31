<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function statute() {
        return view('info.statute');
    }

    public function information() {
        return view('info.information');
    }

    public function data() {
        return view('info.admindata');
    }

    public function session() {
        return view('info.session');
    }

    public function transaction() {
        return view('info.transaction');
    }

    public function credit() {
        return view('info.credit');
    }

    public function ticket() {
        return view('info.ticket');
    }

    public function insurance() {
        return view('info.insurance');
    }

    public function account() {
        return view('info.account');
    }

    public function card() {
        return view('info.card');
    }

    public function office() {
        return view('info.office');
    }
}
