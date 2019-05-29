<?php

declare(strict_types = 1);

use App\Models\User;
use Illuminate\Support\Str;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(User::class, function (\Faker\Generator $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => 'pass',
        'remember_token' => Str::random(10),
    ];
});
