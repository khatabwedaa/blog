<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'email' => $faker->unique()->safeEmail,
        'comment' => $faker->sentence(),
        'post_id' => factory(App\Post::class)->create(),
    ];
});
