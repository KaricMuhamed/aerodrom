<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Staff;

class StaffSeeder extends Seeder
{
    public function run()
    {
        Staff::create([
            'name' => 'John Doe',
            'role' => 'Pilot',
            'email' => 'pilot@example.com',
            'phone' => '1234567890'
        ]);

        Staff::create([
            'name' => 'Jane Doe',
            'role' => 'Stewardess',
            'email' => 'stewardess@example.com',
            'phone' => '0987654321'
        ]);
    }
}
