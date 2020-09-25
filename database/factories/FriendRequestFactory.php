<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FriendRequest;
use App\User;
use Faker\Generator as Faker;

$factory->define(FriendRequest::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'to_user_id' => rand(1, 2),
    ];
});
