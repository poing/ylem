<?php

use Faker\Generator as Faker;

$factory->define(App\Characteristic::class, function (Faker $faker) {
    return [
        'name' => $faker->safeColorName,
        'value' => $faker->text(rand(10,30)),
    ];
});
