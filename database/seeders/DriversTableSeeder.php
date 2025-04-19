<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver;

class DriversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drivers = [
            ['Joseph Asugan', 46, '09918472771', 'KASJAKDJS', 'Poblacion, Quezon, Bukidnon', 7],
            ['Maria Lopez', 38, '09123456789', 'ML123456', 'Valencia, Bukidnon', 6],
            ['Juan Dela Cruz', 50, '09987654321', 'JD987654', 'Malaybalay City, Bukidnon', 8],
            ['Carlos Santos', 41, '09234567890', 'CS987123', 'Don Carlos, Bukidnon', 7],
            ['Angela Reyes', 35, '09324561234', 'AR456321', 'Maramag, Bukidnon', 5],
            ['Roberto Gomez', 44, '09187654322', 'RG876543', 'Kadingilan, Bukidnon', 9],
            ['Elena Mendoza', 39, '09219876543', 'EM123789', 'Damulog, Bukidnon', 6],
            ['Fernando Cruz', 47, '09451234567', 'FC654321', 'Kalilangan, Bukidnon', 7],
            ['Isabel Torres', 33, '09097654321', 'IT321654', 'Talakag, Bukidnon', 6],
            ['Luis Martinez', 45, '09129876543', 'LM987654', 'Impasugong, Bukidnon', 8],
            ['Cynthia Navarro', 37, '09345678901', 'CN456789', 'Libona, Bukidnon', 5],
            ['Ramon Villanueva', 52, '09012345678', 'RV123456', 'Manolo Fortich, Bukidnon', 9],
            ['Jessica Aquino', 36, '09112345678', 'JA654987', 'Baungon, Bukidnon', 6],
            ['Miguel Estrada', 43, '09233445566', 'ME789654', 'Cabanglasan, Bukidnon', 7],
            ['Andrea Bautista', 34, '09334445566', 'AB112233', 'Pangantucan, Bukidnon', 5],
        ];

        foreach ($drivers as $driver) {
            Driver::create([
                'name' => $driver[0],
                'age' => $driver[1],
                'contact_number' => $driver[2],
                'license_number' => $driver[3],
                'address' => $driver[4],
                'duty_hours' => $driver[5]
            ]);
        }
    }
}
