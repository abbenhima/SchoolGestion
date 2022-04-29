<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Etudiant;
use Faker\Generator as Faker;

$factory->define(Etudiant::class, function (Faker $faker) {
    
    $date_created_updated=$faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
    $anne_entre=$faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now');

    return [
        'anne_entre'=>$anne_entre->format('d/m/Y'),
        'created_at'=>$date_created_updated,
        'updated_at'=>$date_created_updated

    ];
});
