<?php

use Faker\Generator as Faker;

use Poing\Ylem\Models\Characteristic as Characteristic;


$factory->define(Characteristic::class, function (Faker $faker) {
    return [
        'name' => $faker->safeColorName,
        'value' => $faker->text(rand(10,30)),
    ];
});
