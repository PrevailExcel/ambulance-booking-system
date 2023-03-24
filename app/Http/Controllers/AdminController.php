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
        if (auth()->user()->type == 0) {
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
        } else {

            $bookings = auth()->user()->hospital->bookings;
            $profit = 0;
            foreach ($bookings as $book) {
                $profit += $book->ambulance->price;
            }

            $stats = [
                'ambs' => auth()->user()->hospital->ambulances->count(),
                'profit' => $profit
            ];
            return view('hospital.main', compact('stats', 'bookings'));
        }
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
        if (auth()->user()->type == 0) {
            $ambulances = Ambulance::all();
            return view('dashboard.ambulances', compact('ambulances'));
        } else {
            $ambulances = auth()->user()->hospital->ambulances;
            return view('hospital.ambulances', compact('ambulances'));
        }
    }

    public function bookings()
    {
        if (auth()->user()->type == 0) {
            $bookings = Booking::all();
            return view('dashboard.bookings', compact('bookings'));
        } else {
            $bookings = [];
            foreach (auth()->user()->hospital->ambulances as $amb) {
                array_push($bookings, $amb->bookings);
            }

            $bookings = Booking::all();
            return view('dashboard.bookings', compact('bookings'));
        }
    }

    public function profile()
    {
        return view('dashboard.profile');
    }
}
