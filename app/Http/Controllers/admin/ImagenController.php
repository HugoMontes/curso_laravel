<?php

namespace Cinema\Http\Controllers\admin;

use Illuminate\Http\Request;

use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
// Importar la clase Imagen
use Cinema\Imagen;

class ImagenController extends Controller
{
    public function index(){
      // Obtener las Imagenes
      // $imagenes=Imagen::all();
      $imagenes=Imagen::orderBy('id','ASC')->paginate(6);
      // Obtener el titulo de la Pelicula
      // Llamar a la relacion
      $imagenes->each(function($imagenes){
        $imagenes->pelicula;
      });
      // Probar dd($imagenes);
      return view('admin.imagen.index')
             ->with('imagenes',$imagenes);
    }
}
