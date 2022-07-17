<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $auth = Auth::attempt([
            'email'=> $request->email,
            'password' => $request->password
        ]);

        if($auth){
            return redirect()->route('dashboard.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
