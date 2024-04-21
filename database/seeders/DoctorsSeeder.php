<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DoctorsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();
        DB::table('doctors')->insert([
            'user_id' => 2,
            'specialization' => $faker->jobTitle,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // for ($i = 0; $i < 10; $i++) {
        //     $user = DB::table('users')->inRandomOrder()->first();

        //     DB::table('doctors')->insert([
        //         'user_id' => $user->id,
        //         'specialization' => $faker->jobTitle,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
    }
}
