<?php

use Illuminate\Database\Seeder;

class ProfesseurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Professeur::class,10)->create();
    }
}
