<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Qacomment;
use Faker\Generator as Faker;

$factory->define(Qacomment::class, function (Faker $faker) {
    return [
        'created_at' => $faker->date('Y-m-d H:i:s', 'now'),
        'updated_at' => $faker->date('Y-m-d H:i:s', 'now'),
        'name' => $faker->name,
        'qacomment' => $faker->realText(200),
    ];
});
