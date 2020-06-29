<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BackendSettings;
use Faker\Generator as Faker;

$factory->define(BackendSettings::class, function (Faker $faker) {
    return [
        'type' => $faker->word,
        'description' => $faker->text,
    ];
});
