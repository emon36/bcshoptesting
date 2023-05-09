<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mr. Admin',
            'email' => 'a@b.c',
            'phone' => '1234567890',
            'role_id' => 1,
            'base_role' => 'admin',
            'password' => bcrypt('12345678'),
            'created_by' => 1,
        ]);
    }
}
