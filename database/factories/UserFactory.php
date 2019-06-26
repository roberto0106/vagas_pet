<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Candidato;
use App\Vagas;
use App\User_type;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'type' => $faker->boolean,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(User_type::class, function (Faker $faker) {
    return [
        'tipo' => $faker->jobTitle(2),
    ];
});


$factory->define(Candidato::class, function (Faker $faker) {
    return [
        'nome' => $faker->firstName,
        'sobrenome' => $faker->lastName,
    ];
});

$factory->define(Vagas::class, function (Faker $faker) {
    return [
        'vaga' => $faker->jobTitle,
        'empresa' => $faker->company,
        'id_candidato' => $faker->numberBetween($min = 1, $max =50)
    ];
});
