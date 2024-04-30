<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MedicinesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('medicines')->insert([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'concentration' => '25mg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
