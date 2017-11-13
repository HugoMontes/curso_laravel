<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
// Crear factory para User
// define(ClaseModelo, FuncionAnonima)
$factory->define(Cinema\User::class, function (Faker\Generator $faker) {
    // Retornar un arreglo
    return [
        // $faker->name: Genera nombres randomicos
        'name' => $faker->name,
        // $faker->safeEmail: Genera emails randomicos
        'email' => $faker->safeEmail,
        'password' => bcrypt('123456'),
    ];
});

// Crear factory para director
// Para ejecutar el mismo se debera crear su clse DirectorSeeder
$factory->define(Cinema\Director::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->firstname.' '.$faker->lastname,
    ];
});
