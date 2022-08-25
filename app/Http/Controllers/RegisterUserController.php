<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{
    public function index(Request $request)
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // dd(bcrypt($request->password));
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        // dd($user);

        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
