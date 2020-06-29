<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ReviewWiseQuality;
use Faker\Generator as Faker;

$factory->define(ReviewWiseQuality::class, function (Faker $faker) {
    return [
        'rating_from' => $faker->randomFloat(0, 0, 9999999999.),
        'rating_to' => $faker->randomFloat(0, 0, 9999999999.),
        'quality' => $faker->word,
    ];
});
