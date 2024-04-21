<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $roles = ['Admin', 'Doctor', 'Assistant', 'Nurse', 'Patient'];
        for ($i = 0; $i < count($roles); $i++) {
            DB::table('roles')->insert([
                'name' => $roles[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        // Add more role records if needed
    }
}
