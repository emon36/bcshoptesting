<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            'title' => 'KG',
            'created_by' => 1
        ]);

        DB::table('units')->insert([
            'title' => 'Piece',
            'created_by' => 1
        ]);

        DB::table('units')->insert([
            'title' => 'Gram',
            'created_by' => 1
        ]);

        DB::table('units')->insert([
            'title' => 'Feet',
            'created_by' => 1
        ]);
    }
}
