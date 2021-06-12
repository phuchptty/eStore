<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'title' => $faker->text(100),
        'meta_title' => $faker->text(100),
        'slug' => $faker->text(100),
        'content' => $faker->text(100),
    ];
});
