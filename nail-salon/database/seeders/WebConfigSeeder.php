<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('web_configs')->insert([
            'name' => 'logo',
            'value' => ''
        ]);
        DB::table('web_configs')->insert([
            'name' => 'brand_name',
            'value' => ''
        ]);
        DB::table('web_configs')->insert([
            'name' => 'brand_phone',
            'value' => ''
        ]);
        DB::table('web_configs')->insert([
            'name' => 'brand_address',
            'value' => ''
        ]);
        DB::table('web_configs')->insert([
            'name' => 'brand_email',
            'value' => ''
        ]);
        DB::table('web_configs')->insert([
            'name' => 'facebook',
            'value' => ''
        ]);
        DB::table('web_configs')->insert([
            'name' => 'instagram',
            'value' => ''
        ]);
        DB::table('web_configs')->insert([
            'name' => 'about',
            'value' => ''
        ]);
    }
}
