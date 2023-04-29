<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $checkUser = $request->only('email', 'password');
        if (Auth::attempt($checkUser)) {
            return redirect()->intended('admin');
            // return response()->json($checkUser);
        } else {
            return redirect()->route('login');
            // return response()->json($checkUser);
        }
    }
}
