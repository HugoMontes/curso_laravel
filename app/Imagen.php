<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model{
    protected $table='imagenes';
    protected $fillable=['nombre','pelicula_id'];
    // Una imagen pertenece a una sola pelicula
    public function peliculas(){
      return $this->belongsTo('Cinema\Pelicula');
    }
}
