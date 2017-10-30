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
          $table->foreign('pelicula_id')->references('id')->on('peliculas')->onDelete('cascade');
          $table->foreign('director_id')->references('id')->on('directores')->onDelete('cascade');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        // En caso de que se haga un refresh eliminar de esta manera
        Schema::drop('pelicula_director');
        Schema::drop('directores');
    }
}
