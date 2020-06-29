<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'code' => $faker->word,
        'dial_code' => $faker->word,
        'currency_name' => $faker->word,
        'currency_symbol' => $faker->word,
        'currency_code' => $faker->word,
        'slug' => $faker->slug,
    ];
});
