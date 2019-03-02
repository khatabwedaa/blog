<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        //
        'title'       => $faker->sentence(),
        'slug'        => "post-slug" . rand(1 , 1000),
        'category_id' => $faker->numberBetween($min = 2, $max = 6),
        'body'        => $faker->text(),

    ];
});
