<?php

use App\Candidate;
use Illuminate\Database\Seeder;

class CandidatoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Candidate::class, 50)->create();
    }
}
