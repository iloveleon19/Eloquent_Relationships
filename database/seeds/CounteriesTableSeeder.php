<?php

use Illuminate\Database\Seeder;

class CounteriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Country::class, 3)->create()->each(function($country) {
            $country->users()->saveMany(
                factory(App\User::class, 5)->create()->each(function ($user) {
                    $user->phone()->save(factory(App\Phone::class)->make());

                    for ($i=0; $i<2; $i++) {
                        factory(App\RoleUser::class)->create([
                            'user_id' => $user->id
                        ]);
                    }

                    factory(App\Post::class, 3)->create(['user_id'=>$user->id])
                        ->each(function ($post) {
                            $post->image()->save(factory(App\Image::class)->make());
                        }
                    );

                    factory(App\Video::class, 3)->create(['user_id'=>$user->id]);
                })
            );
        });
    }
}
