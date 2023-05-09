<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mr. Vendor',
            'email' => 'vendor@vendor.vendor',
            'phone' => '90967543',
            'role_id' => 1,
            'base_role' => 'vendor',
            'password' => bcrypt('12345678'),
            'created_by' => 1,
        ]);

        DB::table('vendors')->insert([
            'shop_name' => 'Midul Shop',
            'shop_url' => 'midul-shop-29k7383',
            'shop_email' => 'support@midul.vendor',
            'shop_phone' => '01927886516',
            'shop_address' => '302/7, Rajasthan, Jolima Puram, Hagupatti',
            'shop_city' => 'Dhaka',
            'shop_zip' => '1219',
            'shop_logo' => 'vendorlogo.png',
            'shop_banner' => 'vendorbanner.png',
            'owner_id' => 2,
            'created_by' => 1,
        ]);
    }
}
