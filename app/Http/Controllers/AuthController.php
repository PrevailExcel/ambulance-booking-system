<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/dashboard');
        }
        return redirect()->back()->with('alert', 'Username and Password Not Matched');
    }

    public function logout()
    {
         Auth::logout();
         session()->regenerate();
         return redirect()->route('login');
    }
}
