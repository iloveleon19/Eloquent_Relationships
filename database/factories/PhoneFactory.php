<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Phone;
use Faker\Generator as Faker;

$factory->define(Phone::class, function (Faker $faker) {
    return [
        'phone_num' => $faker->unique()->tollFreePhoneNumber
    ];
});
