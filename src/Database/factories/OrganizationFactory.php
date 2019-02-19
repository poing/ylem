<?php

use Faker\Generator as Faker;
use Poing\Ylem\Models\Organization as Organization;

$factory->define(Organization::class, function (Faker $faker) {
    return [
        'status' => $faker->word,
    ];
});

$factory->state(Organization::class, 'org', function ($faker) {
    return [
        'tradingName' => $faker->company,
        'nameType' => $faker->companySuffix,
        'type' => 'Company',
        'isLegalEntity' => true,
    ];
});

$factory->state(Organization::class, 'unit', function ($faker) {
    return [
        'tradingName' => strtoupper($faker->jobTitle . 's'),
        'type' => 'Unit',
        'isLegalEntity' => false,
    ];
});
