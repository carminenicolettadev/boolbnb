<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Service;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement($array = array ('wifi','spa','piscina','giardino','balcone','mare'))
    ];
});
