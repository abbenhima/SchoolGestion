<?php

use Illuminate\Database\Seeder;

class PersonneEtudiantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
    
        factory(App\Personne::class,1)->make()->each(function ($personne){

            $personne->personneable_id =1;
            $personne->personneable_type ='App\Etudiant';
            $personne->save();


        });
        factory(App\Personne::class,1)->make()->each(function ($personne){

            $personne->personneable_id =2;
            $personne->personneable_type ='App\Etudiant';
            $personne->save();


        });
        factory(App\Personne::class,1)->make()->each(function ($personne){

            $personne->personneable_id =3;
            $personne->personneable_type ='App\Etudiant';
            $personne->save();


        });
        factory(App\Personne::class,1)->make()->each(function ($personne){

            $personne->personneable_id =4;
            $personne->personneable_type ='App\Etudiant';
            $personne->save();


        });
        factory(App\Personne::class,1)->make()->each(function ($personne){

            $personne->personneable_id =5;
            $personne->personneable_type ='App\Etudiant';
            $personne->save();


        });
        factory(App\Personne::class,1)->make()->each(function ($personne){

            $personne->personneable_id =6;
            $personne->personneable_type ='App\Etudiant';
            $personne->save();


        });
        factory(App\Personne::class,1)->make()->each(function ($personne){

            $personne->personneable_id =7;
            $personne->personneable_type ='App\Etudiant';
            $personne->save();


        });
        factory(App\Personne::class,1)->make()->each(function ($personne){

            $personne->personneable_id =8;
            $personne->personneable_type ='App\Etudiant';
            $personne->save();


        });
        factory(App\Personne::class,1)->make()->each(function ($personne){

            $personne->personneable_id =9;
            $personne->personneable_type ='App\Etudiant';
            $personne->save();


        });
        factory(App\Personne::class,1)->make()->each(function ($personne){

            $personne->personneable_id =10;
            $personne->personneable_type ='App\Etudiant';
            $personne->save();


        });
    }
}
