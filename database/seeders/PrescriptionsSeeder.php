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
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
