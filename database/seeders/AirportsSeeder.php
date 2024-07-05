<?php

namespace Database\Seeders;

use App\Models\Airports;
use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AirportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Airports::create([
            'name' => 'Sarajevo',
            'city' => 'Sarajevo',
            'amount_of_planes' => '20',
            'max_amount_of_planes' => '30'
        ]);

        Airports::create([
            'name' => 'Tuzla',
            'city' => 'Tuzla',
            'amount_of_planes' => '10',
            'max_amount_of_planes' => '20'
        ]);
    }
}
