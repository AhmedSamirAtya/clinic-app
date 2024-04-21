<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrescriptionsSeeder extends Seeder
{
    public function run()
    {
        $ids = [6, 7, 8, 9, 10];
        for ($i = 0; $i < 5; $i++) {
            DB::table('prescriptions')->insert([
                'patient_id' => $ids[$i],
                'doctor_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
