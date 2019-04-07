<?php

use App\User;
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
    $nameToSlug = $faker->name;
    $slugName = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $nameToSlug)));
    return [
        'name' => $nameToSlug,
        'slug' => $slugName,
        'email' => $faker->email,
        'password' => bcrypt('123123'),
        'bio' => $faker->text(rand(250, 300)),
        'role_id' => rand(2,4),
    ];
});
