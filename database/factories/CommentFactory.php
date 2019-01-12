<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'name'     => $faker->name(),
        'email'    => $faker->unique()->safeEmail,
        'comment'  => $faker->sentence(),
        'approved' => $faker->numberBetween($min = 1, $max = 1),
        'post_id'  => $faker->numberBetween($min = 7, $max = 20),

    ];
});
