<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([EtudiantTableSeeder::class,ProfesseurTableSeeder::class,PersonneEtudiantTableSeeder::class,
        PersonneProfesseurTableSeeder::class,CourProfesseurTableSeeder::class,SalleTableSeeder::class]);
    }
}





// CourProfesseurTableSeeder::class
// PersonneProfesseurTableSeeder::class
// PersonneEtudiantTableSeeder::class
//
//