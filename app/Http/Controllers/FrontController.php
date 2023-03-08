<?php

namespace App\Http\Controllers;

use App\Models\Ambulance;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function show()
    {
        $ambulances = Ambulance::take(8)->get();
        return view('welcome', compact('ambulances'));
    }

    public function ambulances()
    {
        $ambulances = Ambulance::all();
        return view('ambulances', compact('ambulances'));
    }

    public function profile()
    {
        return view('profile');
    }

    public function ambulanceDetails(Ambulance $ambulance)
    {
        return view('details', compact('ambulance'));
    }

    public function checkout(Ambulance $ambulance, Request $request)
    {
        return view('checkout', compact('ambulance'));
    }
}
