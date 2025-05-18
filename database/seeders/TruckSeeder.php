<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Truck;
use Illuminate\Support\Facades\DB;

class TruckSeeder extends Seeder
{
    public function run(): void
    {
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('trucks')->truncate();  
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i = 1; $i <= 10; $i++) {
            Truck::create([
                'Plate_number' => 'TRK' . rand(100, 999) . $i,
                'Brand' => ['Isuzu', 'Fuso', 'Hyundai', 'Hino'][rand(0, 3)],
                'Model' => 'Model ' . $i,
                'color' => ['Red', 'Blue', 'White', 'Black'][rand(0, 3)],
            ]);
        }
    }
}
