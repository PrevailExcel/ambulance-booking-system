<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    public function ambulances()
    {
        return $this->hasMany(Ambulance::class);
    }

    public function bookings()
    {
        return $this->hasManyThrough(Booking::class, Ambulance::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }
}
