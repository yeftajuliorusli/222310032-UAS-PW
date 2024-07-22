<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{
    public function showLoginForm()
    {
        return view('user.login');
    }

    public function postlogin(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            $username = Auth::user()->name;
            return redirect('/dashboard')->with('alert-success', "Welcome!");
        }

        return redirect('/')->with('alert-danger', 'Sorry, User not found.');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
