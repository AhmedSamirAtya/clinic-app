<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClinicsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('clinics')->insert([
            'name' => 'عيادات البرج التخصصية',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clinics')->insert([
            'name' => 'عيادات فاروق التخصصية' ,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
