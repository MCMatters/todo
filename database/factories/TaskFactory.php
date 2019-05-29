<?php

declare(strict_types = 1);

use App\Models\Task;
use App\Models\User;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Task::class, function (\Faker\Generator $faker) {
    $user = User::query()->inRandomOrder()->firstOrFail();

    return [
        'body' => $faker->text,
        'done_at' => $faker->boolean ? $faker->dateTimeBetween('-7 days') : null,
        'user_id' => $user->getKey(),
    ];
});
