<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post' => $faker->randomElement(\App\User::all()->pluck('id')->toArray()),
        'user' => $faker->randomElement(\App\User::all()->pluck('id')->toArray()),
        'content' => $faker->paragraph('1')
    ];
});
