<?php

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
        $this->call(AdminTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(LeadTableSeeder::class);
        $this->call(InterestTableSeeder::class);
        $this->call(LeadInterestSeeder::class);
        $this->call(ChannelSeeder::class);
    }
}
