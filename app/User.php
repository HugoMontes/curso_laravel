<?php

namespace Cinema;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    // Un usuario puede adicionar muchas peliculas
    public function peliculas(){
      // Retornar el tipo de relación indicando el Modelo
      return $this->hasMany('Cinema\Pelicula');
    }
    // Verifica si es un admin
    public function is_admin(){
      return $this->type==='admin';
    }
}
