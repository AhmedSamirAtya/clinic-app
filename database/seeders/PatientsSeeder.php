<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatientsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('patients')->insert([
            'name' => 'اشرقت عبد الحميد',
            'job' => 'طفله',
            'address' => '14 شارع الثوره',
            'phone_number' => '0123456789',
            'date_of_birth' => '2015-08-10',
            'email' => 'ashrakatabdelhamid@clinics.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
