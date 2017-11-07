<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('peliculas', function (Blueprint $table) {
          $table->increments('id');
          // Agregar las columnas de las tablas
          $table->string('titulo');
          $table->float('costo');
          $table->text('resumen');
          $table->date('estreno');
          $table->timestamps();
          // Agregar la relación 1aN con la tabla generos
          $table->integer('genero_id')->unsigned(); // no num. negativos
          $table->foreign('genero_id')->references('id')->on('generos')->onDelete('cascade');
          // Agregar la relación 1aN con la tabla users
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('peliculas');
    }
}
