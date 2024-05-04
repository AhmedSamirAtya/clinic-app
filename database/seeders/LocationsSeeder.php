<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LocationsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        DB::table('locations')->insert([
            'clinic_id' => 1,
            'city' => 'المحله الكبرى',
            'address' => 'تقاطع شارع البهى مع شارع المستشار',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
