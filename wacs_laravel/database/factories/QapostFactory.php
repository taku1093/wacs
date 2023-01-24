<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Qapost;
use Faker\Generator as Faker;

$factory->define(Qapost::class, function (Faker $faker) {
    return [
        'created_at' => $faker->date('Y-m-d H:i:s', 'now'),
        'updated_at' => $faker->date('Y-m-d H:i:s', 'now'),
        'subject' => $faker->realText(16),    // 16文字のテキスト
        'message' => $faker->realText(200),    // 200文字のテキスト
        'name' => $faker->name,    // 氏名
        'qacategory_id' => $faker->numberBetween(1,10),    // 1〜10のランダムな整数
    ];
});
