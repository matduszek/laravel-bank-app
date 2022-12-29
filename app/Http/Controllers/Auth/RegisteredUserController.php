<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'icn' => ['required', 'regex:/^[A-Z]{3}\d{6}$/', 'unique:'.User::class],
            'phone_number' => ['required', 'regex:/^[0-9\+]{8,13}$/', 'unique:'.User::class],
            'postal_code' => ['required', 'regex:/^\d{2}-\d{3}$/'],
            'pesel' => ['required', 'regex:/^[0-9]{11}$/', 'unique:'.User::class],
            'birth_date' => ['required', 'before:-18 years']
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'gender' => $request->gender,
            'citizenship' => $request->citizenship,
            'icn' => $request->icn,
            'phone_number' => $request->phone_number,
            'domicile' => $request->domicile,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'password' => Hash::make($request->password),
            'pesel' => $request->pesel,
            'birth_date' => $request->birth_date
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
