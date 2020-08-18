<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Category::class, function (Faker $faker) {
    $title = $faker->sentence(3);
    return [
        'title' => $title,
        'slug' => Str::slug($title)
    ];
});
