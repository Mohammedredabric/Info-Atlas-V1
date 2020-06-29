<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Listing;
use Faker\Generator as Faker;

$factory->define(Listing::class, function (Faker $faker) {
    return [
        'code' => $faker->word,
        'name' => $faker->name,
        'description' => $faker->text,
        'photos' => '{}',
        'video_url' => $faker->word,
        'video_provider' => $faker->word,
        'tag' => $faker->word,
        'adress' => $faker->word,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'website' => $faker->word,
        'social' => '{}',
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'status' => $faker->word,
        'listing_type' => $faker->word,
        'listing_thumbnail' => $faker->word,
        'listing_cover' => $faker->word,
        'seo_meta_tags' => $faker->word,
        'user_id' => $faker->word,
    ];
});
