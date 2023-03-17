<?php

namespace App\Http\Controllers;

use App\Models\Ambulance;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BookingController extends Controller
{
    public function book(Request $request)
    {

        $this->validate($request, [
            'long' => 'required',
            'lat' => 'required',
            'ambulance' => 'required'
        ]);

        // If user is not logged in, create a new user and log him in
        if (!auth()->user() || auth()->user()->type != 1) {

            $this->validate($request, [
                'email'   => 'required|unique:users,email',
                'name' => 'required',
                'phone' => 'required',
                'ambulance' => 'required'
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->phone), // use phone number for default password
            ]);
            if ($user) {
                Auth::login($user);
            }
        }

        // Book User an ambulance
        $book = Booking::create([
            'user_id' => auth()->user()->id,
            'ambulance_id' => $request->ambulance,
            'location' => $request->location,
            'long' => $request->long,
            'lat' => $request->lat,
            'incident' => $request->incident
        ]);

        if ($book) {
            $amb = Ambulance::find($book->ambulance_id);
            $amb->booked = true;
            $amb->update();

            return redirect()->route('profile')->with('success', 'You have successfully booked an ambulance.');
        } else {
            return redirect()->back()->with('failed', 'There\'s an issue, please try again');
        }
    }

    public function loginToCheckout(Request $request)
    {
        return redirect()->route('checkout', $request->ambulance);
    }
}
