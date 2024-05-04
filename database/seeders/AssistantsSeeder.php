<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
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
            DB::table('assistants')->insert([
                'name' => 'حنان مرزوق',
                'clinic_id' => 1, // Assuming the clinic ID is 1
                'address' => 'السبع بنات',
                'phone_number' => '0111222333',
                'date_of_birth' => '1990-05-15',
                'email' => 'hananmrzok@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
                'remember_token' => str_random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    }
}
