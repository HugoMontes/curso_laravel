<?php

namespace Cinema\Http\Controllers\admin;

use Illuminate\Http\Request;

use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
// Importar la clase Genero
use Cinema\Genero;
// Importar la clase GeneroRequest
use Cinema\Http\Requests\GeneroRequest;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $generos=Genero::orderBy('id','ASC')->paginate(5);
      return view('admin.genero.index')->with('generos', $generos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.genero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeneroRequest $request){
      $genero=new Genero($request->all());
      $genero->save();
      flash('Se ha guardado '.$genero->genero.' exitosamente.')->success();
      return redirect()->route('admin.genero.index');
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
       $genero=Genero::find($id);
       return view('admin.genero.edit')->with('genero',$genero);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GeneroRequest $request, $id){
      $genero=Genero::find($id);
      // Otra alternativa es mediante la funcion fill
      $genero->fill($request->all());
      $genero->save();
      // Preparar el mensaje ha mostrar
      flash('Se ha editado '.$genero->genero.' exitosamente.')->success();
      // Redireccionar al listado de usuarios
      return redirect()->route('admin.genero.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
      $genero=Genero::find($id);
      $genero->delete();
      flash('Se ha eliminado '.$genero->genero.' exitosamente.')->success();
      return redirect()->route('admin.genero.index');
    }
}
