<?php

use Illuminate\Database\Seeder;

class EtudiantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Etudiant::class,10)->create();
    }
}
