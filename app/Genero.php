<?php
namespace Cinema;
use Illuminate\Database\Eloquent\Model;
class Genero extends Model{
    // Ingresar el nombre de la tabla
    protected $table='generos';
    // fillable es un atributo que se puede rellenar o guardar
    // en el modelo, ya que todos los modelos Eloquent protegen
    // contra la asignación masiva.
    protected $fillable=['genero'];

    // Un genero tiene muchas peliculas
    public function peliculas(){
      // retornar el tipo de relacion
      return $this->hasMany('Cinema\Pelicula');
    }

    public function scopeSearchGenero($query, $genero){
      return $query->where('genero','=',$genero);
    }
}
