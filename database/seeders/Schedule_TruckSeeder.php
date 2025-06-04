<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule_Truck;
use Illuminate\Support\Facades\DB;

class Schedule_TruckSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schedule_Truck::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i = 1; $i <= 10; $i++) {
            Schedule_Truck::create([
                'driver_id' => rand(1, 10),
                'truck_id' => rand(1, 10),
                'cargo' => 'Cargo Load ' . $i,
                'destination' => 'Destination ' . $i,
                'status' => ['Pending', 'In Transit', 'Delivered'][rand(0, 2)],
            ]);
        }
    }
}
