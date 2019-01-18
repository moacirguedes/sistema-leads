<?php

use Illuminate\Database\Seeder;

class LeadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Lead::class, 300)->create();
    }
}
