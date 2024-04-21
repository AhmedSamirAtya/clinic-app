<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BillsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('bills')->insert([
                'patient_id'=> $i+1,
                'amount' => $faker->randomFloat(2, 10, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
