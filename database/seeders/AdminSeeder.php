<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $faker = Faker::create();
        // for ($i = 0; $i < 10; $i++) {
        DB::table('users')->insert([
            'name' => 'SUPER',
            'phone_number' => '01032596372',
            'email' => 'super@clinics.com',
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //}
    }
}
