<?php

namespace Cinema\Http\ViewComposers;

use Illuminate\View\View;
// Importar el modelo Genero
use Cinema\Genero;
// Importar el modelo Director
use Cinema\Director;

class AsideComposer{
  public function compose(View $view){
      // Obtenenos todos los generos
      // $generos=Genero::all();
      $generos=Genero::orderBy('genero','asc')->get();
      // Obtenenos todos los directores
      $directores=Director::orderBy('nombre','asc')->get();
      $view->with('generos', $generos)->with('directores', $directores);
  }
}
