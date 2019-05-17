<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\OrderProduct;
use Faker\Generator as Faker;

$factory->define(OrderProduct::class, function (Faker $faker) {
    return [
        'order_id' => factory(\App\Models\Order::class)->create()->id,
        'product_id' => factory(\App\Models\Product::class)->create()->id,
        'articles' => $faker->randomNumber('2'),
    ];
});
