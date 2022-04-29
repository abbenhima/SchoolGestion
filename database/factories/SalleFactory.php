<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Salle;
use Faker\Generator as Faker;

$factory->define(Salle::class, function (Faker $faker) {
    $date_created_updated=$faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
    

    return [
        'name_salle'=>$faker->text($maxNbChars = 10),
        'created_at'=>$date_created_updated,
        'updated_at'=>$date_created_updated

    ];
});
