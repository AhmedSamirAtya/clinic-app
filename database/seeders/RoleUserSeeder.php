<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['role_id' => 1, 'user_id' => 1], // Admin role for user with ID 1
            ['role_id' => 2, 'user_id' => 2], // Doctor role for user with ID 2
            ['role_id' => 3, 'user_id' => 3], // Assistant role for user with ID 3
            ['role_id' => 3, 'user_id' => 4], // Assistant role for user with ID 4
            ['role_id' => 4, 'user_id' => 5], // Nurse role for user with ID 5
            ['role_id' => 5, 'user_id' => 6], // Patient role for user with ID 6
            ['role_id' => 5, 'user_id' => 7], // Patient role for user with ID 7
            ['role_id' => 5, 'user_id' => 8], // Patient role for user with ID 8
            ['role_id' => 5, 'user_id' => 9], // Patient role for user with ID 9
            ['role_id' => 5, 'user_id' => 10], // Patient role for user with ID 10
        ];

        DB::table('role_user')->insert($users);
    }
}
