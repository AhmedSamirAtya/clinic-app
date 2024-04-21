<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class AssistantsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $ids = [3, 4];
        for ($i = 0; $i < 2; $i++) {
            DB::table('assistants')->insert([
                'user_id' => $ids[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
