<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver;
use Illuminate\Support\Facades\DB;

class DriverSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Driver::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i = 1; $i <= 10; $i++) {
            Driver::create([
                'Name' => 'Driver ' . $i,
                'Age' => rand(25, 50),
                'Gender' => $i % 2 === 0 ? 'Male' : 'Female',
                'Contact_Number' => '0917' . rand(1000000, 9999999),
                'License_number' => 'LIC' . rand(1000, 9999),
                'Duty_hours' => rand(6, 12),
                'Address' => 'Sample Address ' . $i,
            ]);
        }
    }
}

