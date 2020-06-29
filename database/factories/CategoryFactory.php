<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'parebt' => $faker->randomNumber(),
        'icon_class' => $faker->word,
        'name' => $faker->name,
        'slug' => $faker->slug,
        'thumbnail' => $faker->word,
    ];
});
