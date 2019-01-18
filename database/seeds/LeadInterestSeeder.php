<?php

use Illuminate\Database\Seeder;

class LeadInterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\LeadInterest::class, 30)->create();
    }
}
