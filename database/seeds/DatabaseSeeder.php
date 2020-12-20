<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(VenueSeeder::class);
        $this->call(EventSeeder::class);
    }
}
