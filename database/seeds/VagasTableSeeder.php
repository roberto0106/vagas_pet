<?php

use App\Vacancy;
use Illuminate\Database\Seeder;

class VagasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Vacancy::class, 50)->create();
    }
}
