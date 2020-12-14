<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'about' => $faker->text('100'),
        'user_id' => rand('1','10'),  
    ];
});
