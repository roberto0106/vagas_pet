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
        $this->call(CandidatoTableSeeder::class);
        $this->call(VagasTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
