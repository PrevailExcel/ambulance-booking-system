<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ambulance_id',
        'location',
        'long' ,
        'lat',
        'incident'
    ];

    public function ambulance(){
        return $this->belongsTo(Ambulance::class);
    }
}
