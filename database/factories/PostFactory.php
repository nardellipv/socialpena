<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'text' => $faker->text('100'),
        'picture' => $faker->imageUrl(),
        'like' => rand('10','200'),
        'dislike' => rand('10','200'),
        'user_id' => rand('1','10'),     
    ];
});
