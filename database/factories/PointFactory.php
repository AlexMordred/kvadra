<?php

use Faker\Generator as Faker;

$factory->define(App\Point::class, function (Faker $faker) {
    return [
        'category_id' => factory('App\Category')->create()->id
    ];
});
