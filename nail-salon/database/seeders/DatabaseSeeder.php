<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call([
            TicketStatusSeeder::class,
            WebConfigSeeder::class,
            WebConfig2Seeder::class,
            WebConfig3Seeder::class,
            AboutConfigSeeder::class,
        ]);
    }
}
