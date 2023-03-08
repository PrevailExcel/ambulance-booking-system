<?php

namespace App\Http\Controllers;

use App\Models\Ambulance;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show()
    {
        $users = User::whereType(1)->take(5)->get();
        $stats = [
            'users' => User::whereType(1)->count(),
            'ambs' => Ambulance::count()
        ];
        return view('dashboard.main', compact('users', 'stats'));
    }

    public function hospitals()
    {
        $hospitals = Hospital::all();
        return view('dashboard.hospitals', compact('hospitals'));
    }
    public function users()
    {
        $users = User::whereType(1)->get();
        return view('dashboard.users', compact('users'));
    }
    public function ambulances()
    {
        $ambulances = Ambulance::all();
        return view('dashboard.ambulances', compact('ambulances'));
    }
}
