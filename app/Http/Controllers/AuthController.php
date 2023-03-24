<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function showHospitalRegister()
    {
        return view('register_hospital');
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

    public function createUser(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|unique:users,email',
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        if ($user) {
            Auth::login($user);
        }
        return redirect()->intended('/dashboard');
    }


    public function createHospital(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|unique:users,email',
            'name' => 'required',
            'hospital_name' => 'required',
            'hospital_address' => 'required',
            'phone' => 'required',
            'password' => 'required'
        ]);

        $hospital = new Hospital();
        $hospital->name = $request->hospital_name;
        $hospital->address = $request->hospital_address; 
        $hospital->save();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'hospital_id' => $hospital->id,
            'type' => 2,
            'password' => Hash::make($request->password),
        ]);
        if ($user) {
            Auth::login($user);
        }
        return redirect()->intended('/dashboard');
    }

    public function logout()
    {
        Auth::logout();
        session()->regenerate();
        return redirect()->route('login');
    }
}
