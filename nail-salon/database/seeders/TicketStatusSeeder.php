<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_statuses')->insert([
            'id' => 1,
            'name' => 'Pending'
        ]);
        DB::table('ticket_statuses')->insert([
            'id' => 2,
            'name' => 'Approved'
        ]);
        DB::table('ticket_statuses')->insert([
            'id' => 3,
            'name' => 'Rejected by customer'
        ]);
        DB::table('ticket_statuses')->insert([
            'id' => 4,
            'name' => 'Rejected by admin'
        ]);
    }
}
