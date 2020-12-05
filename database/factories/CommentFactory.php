<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment' => $faker->text('100'),
        'user_id' => rand('1','10'),
        'post_id' => rand('1','10'),
    ];
});
