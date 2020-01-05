<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $title = str_replace(".", "", $faker->sentence());
    $slug = str_replace(" ", "-", strtolower($title));

    return [
        'title' => $title,
        'slug' => $slug,
        'body' => $faker->text(),
        'category_id' => 1,
        'user_id' => factory('App\User')->create()->id,
    ];
});
