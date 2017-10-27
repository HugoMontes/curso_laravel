<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('directores', function (Blueprint $table){
            $table->increments('id');
            // Agregar las columna
            $table->string('nombre');
            $table->timestamps();
        });

        // Crear una tabla pivot
        // El siguiente codigo puede ir en
        // cualquiera de los dos archivos de migracion
        Schema::create('pelicula_director', function(Blueprint $table){
          $table->increments('id');
          // Crear los campos para los FK
          $table->integer('pelicula_id')->unsigned();
          $table->integer('director_id')->unsigned();
          // Relacionar las tablas
          $table->foreign('pelicula_id')->references('id')->on('peliculas');
          $table->foreign('director_id')->references('id')->on('directores');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('directores');
    }
}
