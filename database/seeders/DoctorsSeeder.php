<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;


class DoctorsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();
        DB::table('doctors')->insert([
            'name' => 'د.احمد العرابى',
            'specialization' => 'اطفال وحديثى الولاده ومبتسرين',
            'date_of_birth' => '1980-05-15',
            'phone_number' => '0123456789',
            'email' => 'dr.orabi@clinics.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('doctors')->insert([
            'name' => 'د.هاجر الديب',
            'specialization' => 'أنف وأذن وحنجره',
            'date_of_birth' => '1992-09-12',
            'phone_number' => '0402226596',
            'email' => 'dr.hager@clinics.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
