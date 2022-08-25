<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $requst)
    {
        // dd($requst->all());
        Auth::attempt($requst->only(['email', 'password']));
        return redirect(RouteServiceProvider::HOME);
    }
}
