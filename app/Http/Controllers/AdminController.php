<?php

namespace App\Http\Controllers;

use App\Models\Ambulance;
use App\Models\Booking;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show()
    {
        $users = User::whereType(1)->latest()->take(5)->get();
        $bookings = Booking::latest()->take(5)->get();
        $profit = 0;
        foreach (Booking::all() as $book) {
            $profit += $book->ambulance->price;
        }

        $stats = [
            'users' => User::whereType(1)->count(),
            'ambs' => Ambulance::count(),
            'profit' => $profit
        ];
        return view('dashboard.main', compact('users', 'stats', 'bookings'));
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

    public function bookings()
    {
        $bookings = Booking::all();
        return view('dashboard.bookings', compact('bookings'));
    }

    public function profile()
    {
        return view('dashboard.profile');
    }
}
