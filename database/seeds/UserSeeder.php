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
        // Insertar un registro de usuario
        /*
        DB::table('users')->insert([
            'name' => 'Ana Gonzales',
            'email' => 'ana@gmail.com',
            'password' => bcrypt('123456'),
            'type' => 'admin',
        ]);
        */
        // Llamar al ModelFactory para crear 10 usuarios
        factory(Cinema\User::class, 10)->create();
    }
}
