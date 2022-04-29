<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cour;
use Faker\Generator as Faker;

$factory->define(Cour::class, function (Faker $faker) {
    $date_created_updated=$faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
    

    return [
        'libele'=>$faker->text($maxNbChars = 15),
        'created_at'=>$date_created_updated,
        'updated_at'=>$date_created_updated

    ];
});
