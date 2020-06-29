<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Amenity;
use Faker\Generator as Faker;

$factory->define(Amenity::class, function (Faker $faker) {
    return [
        'icon_class' => $faker->word,
        'name' => $faker->name,
        'slug' => $faker->slug,
    ];
});
