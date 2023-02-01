<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebConfig2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('web_configs')->insert([
            'name' => 'time_cancel',
            'value' => ''
        ]);
        DB::table('web_configs')->insert([
            'name' => 'mail_reciver',
            'value' => ''
        ]);
        DB::table('web_configs')->insert([
            'name' => 'list_mail_reciver',
            'value' => ''
        ]);
    }
}
