<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create an admin user for testing/admin approval
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password123'),  // Change this password to something secure
                'role' => 'admin',
                'status' => 'approved',
            ]
        );

        // Create a test normal user (optional)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        // Call other seeders
        $this->call([
            DriverSeeder::class,
            TruckSeeder::class,
            Schedule_TruckSeeder::class,
        ]);
    }
}
