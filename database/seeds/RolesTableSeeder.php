<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Role::class)->states('administrator')->create();
        factory(App\Role::class)->states('editor')->create();
        factory(App\Role::class)->states('member')->create();
    }
}
