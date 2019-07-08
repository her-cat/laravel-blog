<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {

    $sentence = $faker->sentence();

    // // 随机取一个月以内的时间
    $updated_at = $faker->dateTimeThisMonth();

    $created_at = $faker->dateTimeThisMonth($updated_at);

    return [
        'title' => $sentence,
        'content' => $faker->text(),
        'excerpt' => $sentence,
        'updated_at' => $updated_at,
        'created_at' => $created_at,
    ];
});
