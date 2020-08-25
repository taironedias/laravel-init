<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->paragraph(1);
    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'subtitle' => $faker->paragraph(1),
        'description' => $faker->paragraph(5),
        'author' => $faker->randomElement(\App\User::all()->pluck('id')->toArray())
    ];
});
