<?php

use Illuminate\Database\Seeder;
// Importar el modelo de eloquent
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        // Llamar al ModelFactory para crear 10 usuarios
        factory(Cinema\User::class, 10)->create();
    }
}
