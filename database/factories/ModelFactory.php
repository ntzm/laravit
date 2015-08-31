<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->userName,
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->url,
    ];
});

$factory->define(App\Sub::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->userName,
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'content' => $faker->text,
    ];
});
