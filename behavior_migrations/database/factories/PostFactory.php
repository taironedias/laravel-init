<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Post::class, function (Faker $faker) {
    $title = $faker->sentence(5);
    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'subtitle' => $faker->sentence(10),
        'description' => $faker->paragraph(5),
        'publish_at' => $faker->dateTimeThisYear(),
        'category_id' => function() {
            return factory(Category::class)->create()->id;
        }
    ];
});
