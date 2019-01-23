<?php

use Faker\Generator as Faker;

$factory->define(App\Organization::class, function (Faker $faker) {
    return [
        'status' => $faker->word,
    ];
});

$factory->state(App\Organization::class, 'org', function ($faker) {
    return [
        'tradingName' => $faker->company,
        'nameType' => $faker->companySuffix,
        'type' => 'Company',
        'isLegalEntity' => true,
    ];
});

$factory->state(App\Organization::class, 'unit', function ($faker) {
    return [
        'tradingName' => strtoupper($faker->jobTitle . 's'),
        'type' => 'Unit',
        'isLegalEntity' => false,
    ];
});
