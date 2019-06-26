<?php

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
        factory(App\Candidato::class, 50)->create();
    }
}
