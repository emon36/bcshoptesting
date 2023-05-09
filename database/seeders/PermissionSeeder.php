<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [

            [
                'name' => 'CREATE_PRODUCT',
            ],
            [
                'name' => 'READ_PRODUCT',
            ],
            [
                'name' => 'EDIT_PRODUCT',
            ],

        ];
        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
