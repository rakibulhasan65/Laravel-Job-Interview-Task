<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }
    public function register()
    {
        return view('auth.register');
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin')
                ->withSuccess('You have Successfully Login');
        }
        return redirect()->Route('login');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->Route('index');
    }
}
