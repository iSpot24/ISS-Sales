<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Order::class, function (Faker $faker) {
    return [
        'issued_by' => factory(\App\User::class)->create()->id,
        'client_name' => $faker->name,
        'client_address' => $faker->streetAddress,
        'arrival_date' => $faker->dateTimeBetween('now', '+10 days'),
    ];
});
