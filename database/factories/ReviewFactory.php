<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'review_comment' => $faker->word,
        'reviewwisequality_id' => $faker->word,
        'listing_id' => $faker->word,
    ];
});
