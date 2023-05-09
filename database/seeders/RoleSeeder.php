<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [

            [
                'title' => 'admin',

            ],
            [
                'title' => 'vendor',
            ],
            [
                'title' => 'customer',
            ]
        ];

        foreach ($role as $key => $value) {
            Role::create($value);
        }
    }
}
