<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mr. Customer',
            'email' => 'customer@customer.com',
            'phone' => '9096754343',
            'role_id' => 1,
            'base_role' => 'customer',
            'password' => bcrypt('12345678'),
            'created_by' => 1,
        ]);
    }
}
