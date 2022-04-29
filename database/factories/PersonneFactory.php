<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Personne;
use Faker\Generator as Faker;

$factory->define(Personne::class, function (Faker $faker) {
    $first_name=$faker->firstName;
    $last_name=$faker->lastName;
    $em=['hotmail.com','live.com','gmail.com','yahoo.fr'];
    $rand_mail=$em[rand(0,3)];
    $email=$first_name.'.'.$last_name.'@'.$rand_mail;
     
    return [
       
        'first_name' => $first_name,
        'last_name' =>  $last_name,
        'email' => $email,
        'created_at'=>$faker->dateTime($max = 'now'),
        'updated_at'=>$faker->dateTime($max = 'now')
        
        
    ];
});

// $table->id();
// $table->string('first_name');
// $table->string('last_name');
// $table->string('email')->unique();
// $table->integer('personneable_id');
// $table->string('personneable_type');
// $table->timestamps();