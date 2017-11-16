<?php

namespace Cinema\Http\Controllers;
use Illuminate\Http\Request;
use Cinema\Http\Requests;
// Importar la clase Pelicula
use Cinema\Pelicula;
// Importar la clase Carbon
use Carbon\Carbon;
// Importar la clase Genero y Director
use Cinema\Genero;
use Cinema\Director;

class FrontController extends Controller{
  // Inicializar carbon en el constructor para cambiar el idioma
  public function __construct(){
    Carbon::setLocale('es');
    setlocale(LC_TIME, 'Spanish_Bolivia');
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

  public function searchGenero($genero){
    // Probar dd($genero);
    // first(): Devuelve el primero elemento de una coleccion en un objeto,
    //  ya que el nombre del genero es unico segun la validacion.
    $genero=Genero::SearchGenero($genero)->first();
    // Obtenemos una coleccion con todas las peliculas del genero
    $peliculas=$genero->peliculas()->paginate(5);
    $peliculas->each(function($peliculas){
      $peliculas->imagenes;
    });
    return view('front.reviews')->with('peliculas',$peliculas);
  }

  public function searchDirector($nombre){
    $director=Director::SearchDirector($nombre)->first();
    $peliculas=$director->peliculas()->paginate(5);
    $peliculas->each(function($peliculas){
      $peliculas->imagenes;
    });
    return view('front.reviews')->with('peliculas',$peliculas);
  }

  public function viewPelicula($id){
    // Buscar pelicula
    $pelicula=Pelicula::find($id);
    // Probar dd($pelicula);
    // Llamar a las relaciones
    $pelicula->genero;
    $pelicula->user;
    $pelicula->directores;
    $pelicula->imagenes;
    return view('front.pelicula')->with('pelicula',$pelicula);;
  }
}
