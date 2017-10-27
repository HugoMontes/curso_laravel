<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model{
  protected $table='peliculas';
  protected $fillable=['titulo','costo','resumen','estreno','genero_id'];

  // Una pelicula pertenece a un genero
  public function genero(){
    return $this->belongsTo('Cinema\Genero');
  }

  // Una pelicula puede tener muchas imagenes de portada
  public function imagenes(){
    return $this->hasMany('Cinema\Imagen');
  }

  // Una pelicula puede tener muchos directores
  public function directores(){
    // belongsToMany('NombreModelo', 'tabla_relacion')
    return $this->belongsToMany('Cinema\Director', 'pelicula_director')->withTimestamps();
  }
}
