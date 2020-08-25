<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'user' => $faker->randomElement(\App\User::all()->pluck('id')->toArray()),
        'address' => $faker->streetAddress(),
        'number' => $faker->randomNumber(4),
        'complement' => $faker->streetName(),
        'zipcode' => $faker->postcode(),
        'city' => $faker->city(),
        'state' => $faker->state()
    ];
});
