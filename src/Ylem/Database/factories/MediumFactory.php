<?php

use Faker\Generator as Faker;

$factory->define(App\Medium::class, function (Faker $faker) {
    return [
        //
    ];
});

$factory->state(App\Medium::class, 'email', function ($faker) {
    return [
        'emailAddress' => $faker->safeEmail,
    ];
});

$factory->state(App\Medium::class, 'postal', function ($faker) {
    return [
        'city' => $faker->city,
        'country' => $faker->country,
        'postcode' => $faker->postcode,
        'stateOrProvince' => $faker->state,
        'street1' => $faker->streetAddress,
        'street2' => $faker->randomElement([$faker->secondaryAddress, null]),
    ];
});

$factory->state(App\Medium::class, 'phone', function ($faker) {

    $number = $faker->phoneNumber;
    // Leading Zero for Japanese Numbers
    if (is_numeric($number[0])) {
        $number[0] = 0;
    }

    return [
        'type' => $faker->randomElement([
            'home',
            'office',
            'mobile',
            'fax',
            'iPhone',
            'main',
            'business',
            null,
        ]),
        'number' => $number,
    ];
});
