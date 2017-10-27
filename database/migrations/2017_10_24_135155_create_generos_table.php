<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        // create(NombreTabla, FuncionCrearTabla)
        Schema::create('generos', function (Blueprint $table) {
            // Clave primaria
            $table->increments('id');
            // Agregar las columnas de las tablas
            $table->string('genero', 100);
            // timestamps(): permite agregar atributos tipo fecha
            // created_at y updated_at para el control de la tabla
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
        Schema::drop('generos');
    }
}
