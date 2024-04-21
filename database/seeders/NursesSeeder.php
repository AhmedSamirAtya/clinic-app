<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class NursesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('nurses')->insert([
            'user_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // for ($i = 0; $i < 10; $i++) {
        //     $user = DB::table('users')->inRandomOrder()->first();

        //     DB::table('nurses')->insert([
        //         'user_id' => $user->id,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
    }
}
