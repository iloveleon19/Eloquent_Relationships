<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Role;
use App\RoleUser;
use App\User;
use Faker\Generator as Faker;
// use Illuminate\Support\Facades\DB;

$factory->define(RoleUser::class, function (Faker $faker) {
    return [
        'role_id' => function (array $roleUser) use($faker) {

            // $sql = "SELECT 'r.id' 
            //         FROM `roles` AS `r`,`role_user` AS `r_u` 
            //         WHERE r_u.user_id={$roleUser['user_id']} AND r.id <> r_u.role_id";

            // DB::connection()->enableQueryLog();
            $role_diff_ids = DB::table('roles')
                                    ->leftJoin('role_user', function ($join) use($roleUser) {
                                        $join->on('roles.id', '=', 'role_user.role_id')
                                            ->where('role_user.user_id', $roleUser['user_id']);
                                    })
                                    ->select('roles.id')
                                    ->whereNull('role_user.id')
                                    ->get()
                                    ->pluck('id')
                                    ->toArray();
            // dd(DB::getQueryLog());

            // $has_role_ids = User::find($roleUser['user_id'])->roles->pluck('id')->toArray();
            // $all_role_ids = Role::pluck('id')->toArray();
            // $role_diff_ids = array_diff($all_role_ids, $has_role_ids);

            return $faker->randomElement($role_diff_ids);
        }
    ];
});
