<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph,
        'active' => $faker->numberBetween(0,1),
    ];
});
