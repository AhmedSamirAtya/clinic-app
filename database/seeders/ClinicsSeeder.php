<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClinicsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 2; $i++) {
            DB::table('clinics')->insert([
                'name' => $faker->company,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
