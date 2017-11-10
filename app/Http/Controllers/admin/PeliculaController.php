<?php

namespace Cinema\Http\Controllers\admin;

use Illuminate\Http\Request;

use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
// Importar clase Pelicula
use Cinema\Pelicula;
// Importar clase Genero
use Cinema\Genero;
// Importar clase Director
use Cinema\Director;
// Importar clase Imagen
use Cinema\Imagen;
// Importar clase de validacion
use Cinema\Http\Requests\PeliculaRequest;

class PeliculaController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Request $request){
    // Obtener las peliculas
    // $peliculas=Pelicula::orderBy('id','DESC')->paginate(5);
    // Obtener las peliculas con scope
    $peliculas=Pelicula::search($request->titulo)->orderBy('id','DESC')->paginate(5);
    // Llamar las relaciones para obtener genero y usuario
    // de cada una de las peliculas
    $peliculas->each(function($peliculas){
      $peliculas->genero;
      $peliculas->user;
    });
    // Probar con dd($peliculas);
    return view('admin.pelicula.index')->with('peliculas',$peliculas);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create(){
    // lists(valor_mostrar, indice): Devuelve un array asociativo
    $generos=Genero::orderBy('genero','ASC')->lists('genero','id');
    $directores=Director::orderBy('nombre','ASC')->lists('nombre','id');
    // Probar con dd($generos);
    return view('admin.pelicula.create')->with('generos',$generos)->with('directores',$directores);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(PeliculaRequest $request){
    // Recuperar los datos del formulario
    $pelicula=new Pelicula($request->all());
    // Recuperar el id del usuario autenticado
    $pelicula->user_id=\Auth::user()->id;
    // Guardar la Pelicula
    $pelicula->save();

    // Una vez guardado pelicula, guardar en la tabla pivote
    // sync(): Recibe un array con los ids a relacionar
    // Probar dd($request->directores);
    $pelicula->directores()->sync($request->directores);

    // Manipulacion de imagenes
    // Validando la imagen
    if($request->file('imagen')){
      // Recuperar archivo
      $file=$request->file('imagen');
      // Observar los datos que trae el archivo
      // Probar dd($file);
      // Definir un nombre unico para el archivo
      // funcion php time(): devuelve la fecha actual
      $name_file='cinema_'.time().'.'.$file->getClientOriginalExtension();
      // Indicar la ruta donde se guardara el archivo
      // Crear la carpeta curso_laravel/public/imagenes/pelicula
      $path_file=public_path().'/imagenes/pelicula';
      // Guardar el archivo de la imagen
      $file->move($path_file,$name_file);
    }
    // Guardar imagen en la base de datos
    $imagen=new Imagen();
    $imagen->nombre=$name_file;
    // associate(): Asociar imagen con la pelicula
    $imagen->pelicula()->associate($pelicula);
    $imagen->save();

    // Preparar el mensaje ha mostrar
    flash('Se ha guardado '.$pelicula->titulo.' exitosamente.')->success();
    // Redireccionar al listado de usuarios
    return redirect()->route('admin.pelicula.index');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id){
    $pelicula=Pelicula::find($id);
    $generos=Genero::orderBy('genero','ASC')->lists('genero','id');
    $directores=Director::orderBy('nombre','ASC')->lists('nombre','id');
    // Para los directores seleccionados
    // Convertir el listado de objetos en un array simple
    $mis_directores=$pelicula->directores->lists('id')->ToArray();
    // Probar con dd($mis_directores);
    return view('admin.pelicula.edit')
          ->with('pelicula',$pelicula)
          ->with('generos',$generos)
          ->with('directores',$directores)
          ->with('mis_directores',$mis_directores);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id){
    // Probar con dd($request->all());
    $pelicula=Pelicula::find($id);
    // Actualizar pelicula
    $pelicula->update($request->all());
    // Actualizar tabla pivote
    $pelicula->directores()->sync($request->directores);
    // Preparar el mensaje ha mostrar
    flash('Se ha editado '.$pelicula->titulo.' exitosamente.')->success();
    // Redireccionar al listado de usuarios
    return redirect()->route('admin.pelicula.index');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id){
    $pelicula=Pelicula::find($id);
    $pelicula->delete();
    flash('Se ha eliminado '.$pelicula->titulo.' exitosamente.')->success();
    return redirect()->route('admin.pelicula.index');
  }
}
