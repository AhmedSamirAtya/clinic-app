<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class MedicinePrescriptionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $medicines = DB::table('medicines')->pluck('id')->toArray();
        $prescriptions = DB::table('prescriptions')->pluck('id')->toArray();

        for ($i = 0; $i < 5; $i++) {
            $medicineId = array_rand($medicines);
            $prescriptionId = array_rand($prescriptions);
            $quantity = mt_rand(1, 5);

            DB::table('medicine_prescription')->insert([
                'medicine_id' => $medicines[$medicineId],
                'prescription_id' => $prescriptions[$prescriptionId],
                'dose' => $quantity,
                'duration_in_days' => $quantity,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
