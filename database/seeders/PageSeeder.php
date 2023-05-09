<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'title' => 'About Us',
            'content' => 'demo content'
        ]);

        DB::table('pages')->insert([
            'title' => 'Terms and Conditions',
            'content' => 'demo content'
        ]);

        DB::table('pages')->insert([
            'title' => 'Privacy and Policies',
            'content' => 'demo content'
        ]);

        DB::table('pages')->insert([
            'title' => 'Product Return',
            'content' => 'demo content'
        ]);

        DB::table('pages')->insert([
            'title' => 'Shipping Policy',
            'content' => 'demo content'
        ]);


    }
}
