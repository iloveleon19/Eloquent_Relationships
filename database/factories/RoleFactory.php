<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Role;
use Faker\Generator as Faker;

$factory->state(Role::class, 'administrator', [
    'describe' => 'administrator'
]);

$factory->state(Role::class, 'editor', [
    'describe' => 'editor'
]);

$factory->state(Role::class, 'member', [
    'describe' => 'member'
]);

$factory->define(Role::class, function (Faker $faker) {
    return [
        //
    ];
});
