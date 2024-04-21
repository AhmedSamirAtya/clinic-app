<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClinicDoctorSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['clinic_id' => 1, 'doctor_id' => 1], // Admin role for user with ID 1
            ['clinic_id' => 2, 'doctor_id' => 1], // Doctor role for user with ID 2
        ];

        DB::table('clinic_doctor')->insert($users);
    }
}