<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Reply;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    $time = $faker->dateTimeThisMonth();

    return [
        'content' => $faker->sentence(),
        'updated_at' => $time,
        'created_at' => $time,
    ];
});
