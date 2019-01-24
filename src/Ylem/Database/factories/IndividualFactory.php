<?php

use Faker\Generator as Faker;
use Poing\Ylem\Models\Individual as Individual;


$factory->define(Individual::class, function (Faker $faker) {

    $base = [null,'male','female'];
    $gender = array_rand($base);
    $base[$gender];
    $title = $faker->title($base[$gender]);
    $givenName = $faker->firstName($base[$gender]);
    $familyName = $faker->lastName;
    if (rand(0, 9) > 5) {
        $middleName = null;
    } else {
        $middleName = $faker->firstName(null);
    }
    $fullName = implode(
        ' ',
        array_filter([$givenName, $middleName, $familyName, ])
    );
    $formattedName = implode(
        ' ',
        array_filter([$title, $givenName, $middleName, $familyName, ])
    );

    return [
        'gender' => $base[$gender],
        'placeOfBirth' => $faker->city . ', ' . $faker->country,
        'countryOfBirth' => $faker->country,
        'nationality' => $faker->country,
        'maritalStatus' => $faker->word,
        'birthDate' => $faker->date($format = 'Y-m-d', $max = '1999-12-12'),
        'deathDate' => null,
        'title' => $title,
        'givenName' => $givenName,
        'familyName' => $familyName,
        'middleName' => $middleName,
        'fullName' => $fullName,
        'formattedName' => $formattedName,
        'location' => $faker->city . ', ' . $faker->country,
        'status' => $faker->word,
    ];
});
