<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
Use App\User;
use Faker\Generator as Faker;
use App\Tag;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'name' => $faker->word,
        'body' => $faker->paragraph,
        'active' => $faker->numberBetween(0,1),
    ];
});

$factory->afterCreating(Post::class, function ($post, $faker) {
    $user_ids = User::pluck('id')->toArray();
    $post->comments()->saveMany(factory(App\Comment::class, 5)->make(
        ['user_id' => $faker->randomElement($user_ids)]
    ));

    $tag_ids = Tag::pluck('id')->toArray();
    $now = now();
    $post->tags()->attach(
        $faker->randomElements($tag_ids, 2),
        ['created_at'=>$now,'updated_at'=>$now]
    );
});
