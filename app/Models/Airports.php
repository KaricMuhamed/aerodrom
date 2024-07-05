<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airports extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'max_amount_of_planes',
        'amount_of_planes',
    ];

    public function departures()
    {
        return $this->hasMany(Flight::class, 'departure_airport_id');
    }

    public function arrivals()
    {
        return $this->hasMany(Flight::class, 'destination_airport_id');
    }

}
