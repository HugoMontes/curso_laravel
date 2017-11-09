<?php

namespace Cinema\Http\Controllers\admin;

use Illuminate\Http\Request;

use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
// Importar la clase Director
use Cinema\Director;
class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      //$directores=Director::orderBy('id','ASC')->paginate(5);
      $directores=Director::search($request->nombre)->orderBy('id','ASC')->paginate(5);
      return view('admin.director.index')->with('directores', $directores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.director.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Adicionando validaciones directas
      $this->validate($request, [
          'nombre' => 'required|unique:directores',
      ]);
      $director=new Director($request->all());
      $director->save();
      flash('Se ha guardado '.$director->director.' exitosamente.')->success();
      return redirect()->route('admin.director.index');
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
    public function edit($id)
    {
      $director=Director::find($id);
      return view('admin.director.edit')->with('director',$director);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // Adicionando validaciones directas
      $this->validate($request, [
          'nombre' => 'required|unique:directores',
      ]);
      $director=Director::find($id);
      // Actualizando con la funcion update
      $director->update($request->all());
      flash('Se ha editado '.$director->nombre.' exitosamente.')->success();
      return redirect()->route('admin.director.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $director=Director::find($id);
      $director->delete();
      flash('Se ha eliminado '.$director->nombre.' exitosamente.')->success();
      return redirect()->route('admin.director.index');
    }
}
