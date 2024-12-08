<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class AppointmentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            DB::table('appointments')->insert([
                'patient_id' => 1,
                'clinic_id' => 1, // Assuming the clinic ID is 1
                'doctor_id' => 1,
                'appointment_datetime' => Carbon::now(),
                'type' => 'urgent',
                'reason' => 'sss',
                'status' => 'inProgress',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    }
}
