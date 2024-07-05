<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_number',
        'departure_airport_id',
        'destination_airport_id',
        'departure_time',
        'arrival_time',
        'status',
    ];

    protected $dates = [
        'departure_time',
        'arrival_time',
    ];

    public function departureAirport()
    {
        return $this->belongsTo(Airports::class, 'departure_airport_id');
    }

    public function destinationAirport()
    {
        return $this->belongsTo(Airports::class, 'destination_airport_id');
    }
}
