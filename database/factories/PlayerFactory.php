<?php

use Faker\Generator as Faker;

$factory->define(App\Player::class, function (Faker $faker) {
    return [
        'first_name'=> $faker->firstNameMale,
        'last_name'=> $faker->lastName,
    ];
});
