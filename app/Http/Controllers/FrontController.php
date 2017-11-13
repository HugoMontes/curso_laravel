<?php

namespace Cinema\Http\Controllers;
use Illuminate\Http\Request;
use Cinema\Http\Requests;
// Importar la clase Pelicula
use Cinema\Pelicula;
// Importar la clase Carbon
use Carbon\Carbon;

class FrontController extends Controller{

  public function __construct(){
    Carbon::setLocale('es');
  }

  public function index(){
    return view('front.index');
  }
  public function reviews(){
    $peliculas=Pelicula::orderBy('id','DESC')->paginate(5);
    // Llamar a la relacion
    $peliculas->each(function($peliculas){
      $peliculas->imagenes;
    });
    return view('front.reviews')->with('peliculas',$peliculas);
  }
}
