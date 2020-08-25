<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostCategory;
use Faker\Generator as Faker;

$factory->define(PostCategory::class, function (Faker $faker) {
    return [
        'post' => $faker->randomElement(\App\Post::all()->pluck('id')->toArray()),
        'category' => $faker->randomElement(\App\Category::all()->pluck('id')->toArray())
    ];
});
