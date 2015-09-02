<?php

function makeSafeUsername($string)
{
    return strtolower(substr(str_replace('.', '_', $string), 0, 20));
}

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'username' => makeSafeUsername($faker->userName),
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'content' => rand(0, 1) ? $faker->url : implode("\n\n", $faker->paragraphs),
    ];
});

$factory->define(App\Sub::class, function (Faker\Generator $faker) {
    return [
        'name' => makeSafeUsername($faker->userName),
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'content' => $faker->text,
    ];
});
