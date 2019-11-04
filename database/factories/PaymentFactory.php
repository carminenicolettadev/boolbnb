<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Payment;

$factory->define(Payment::class, function (Faker $faker) {
    return [
      'price' => $faker -> randomFloat(1, 1, 5)

    ];
});
