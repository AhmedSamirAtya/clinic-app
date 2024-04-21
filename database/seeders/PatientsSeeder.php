<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class PatientsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $ids = [6, 7, 8, 9, 10];
        for ($i = 0; $i < 5; $i++) {


            DB::table('patients')->insert([
                'user_id' => $ids[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
