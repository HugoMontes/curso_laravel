<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class Director extends Model{
  protected $table='directores';
  protected $fillable=['nombre'];

  // Un director tiene muchas peliculas
  public function peliculas(){
    return $this->belongsToMany('Cinema\Pelicula');
  }
  // Definir un scope
  public function scopeSearch($query, $nombre){
    return $query->where('nombre', 'LIKE', '%'.$nombre.'%');
  }
}
