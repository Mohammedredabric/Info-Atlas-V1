<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FrontendSettings;
use Faker\Generator as Faker;

$factory->define(FrontendSettings::class, function (Faker $faker) {
    return [
        'type' => $faker->word,
        'description' => $faker->text,
    ];
});
