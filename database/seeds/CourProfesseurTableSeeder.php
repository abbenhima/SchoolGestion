<?php

use App\Personne;
use Illuminate\Database\Seeder;

class CourProfesseurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        factory(App\Cour::class,1)->make()->each(function ($cour){
            $cour->professeur_id=1;
            $cour->save();
        });
        factory(App\Cour::class,1)->make()->each(function ($cour){
            $cour->professeur_id=2;
            $cour->save();
        });
        factory(App\Cour::class,1)->make()->each(function ($cour){
            $cour->professeur_id=3;
            $cour->save();
        });
        factory(App\Cour::class,1)->make()->each(function ($cour){
            $cour->professeur_id=4;
            $cour->save();
        });
        factory(App\Cour::class,1)->make()->each(function ($cour){
            $cour->professeur_id=5;
            $cour->save();
        });
        factory(App\Cour::class,1)->make()->each(function ($cour){
            $cour->professeur_id=6;
            $cour->save();
        });
        factory(App\Cour::class,1)->make()->each(function ($cour){
            $cour->professeur_id=7;
            $cour->save();
        });
        factory(App\Cour::class,1)->make()->each(function ($cour){
            $cour->professeur_id=8;
            $cour->save();
        });
        factory(App\Cour::class,1)->make()->each(function ($cour){
            $cour->professeur_id=9;
            $cour->save();
        });
        factory(App\Cour::class,1)->make()->each(function ($cour){
            $cour->professeur_id=10;
            $cour->save();
        });

    }
}
