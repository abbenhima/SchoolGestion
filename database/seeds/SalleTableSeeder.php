<?php

use App\Cour;
use Illuminate\Database\Seeder;

class SalleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Salle::class,1)->make()->each(function ($salle) {
            $salle->cour_id=1;
            $salle->save();
        });
        factory(App\Salle::class,1)->make()->each(function ($salle) {
           $salle->cour_id=2;
           $salle->save();
        });
      factory(App\Salle::class,1)->make()->each(function ($salle) {
          $salle->cour_id=3;
          $salle->save();
      });
      factory(App\Salle::class,1)->make()->each(function ($salle) {
           $salle->cour_id=4;
           $salle->save();
      });
      factory(App\Salle::class,1)->make()->each(function ($salle) {
          $salle->cour_id=5;
          $salle->save();
      });
      factory(App\Salle::class,1)->make()->each(function ($salle) {
          $salle->cour_id=6;
         $salle->save();
      });
      factory(App\Salle::class,1)->make()->each(function ($salle) {
         $salle->cour_id=7;
         $salle->save();
      });
      factory(App\Salle::class,1)->make()->each(function ($salle) {
         $salle->cour_id=8;
         $salle->save();
      });
      factory(App\Salle::class,1)->make()->each(function ($salle) {
        $salle->cour_id=9;
         $salle->save();
      });
      factory(App\Salle::class,1)->make()->each(function ($salle) {
     $salle->cour_id=10;
     $salle->save();
    });
        
    }
}
