<?php

use Illuminate\Database\Seeder;

class InterestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Interest::class, 30)->create();
    }
}
