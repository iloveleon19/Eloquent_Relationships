<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Video;
use App\User;
use Faker\Generator as Faker;
use App\Tag;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'name' => $faker->word,
        'url' => $faker->url,
        'active' => $faker->numberBetween(0,1),
    ];
});

$factory->afterCreating(Video::class, function ($video, $faker) {
    $user_ids = User::pluck('id')->toArray();
    $video->comments()->saveMany(factory(App\Comment::class, 5)->make(
        ['user_id' => $faker->randomElement($user_ids)]
    ));

    $tag_ids = Tag::pluck('id')->toArray();
    $now = now();
    $video->tags()->attach(
        $faker->randomElements($tag_ids, 2),
        ['created_at'=>$now,'updated_at'=>$now]
    );
});
