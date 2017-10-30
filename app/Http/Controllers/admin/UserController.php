<?php

namespace Cinema\Http\Controllers\admin;

use Illuminate\Http\Request;

use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
// Importar la clase User
use Cinema\User;
// Importar la clase UserRequest
use Cinema\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      // Listar a todos los usuarios agregando paginacion
      $users=User::orderBy('id','ASC')->paginate(5);
      // Devolvemos la vista con los usuarios
      return view('admin.user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request){
       // Recuperar todos los datos del formulario en un ojbeto User
       $user=new User($request->all());
       // Usar bcrypt para encriptar password
       $user->password=bcrypt($user->password);
       // Persistir usuario
       $user->save();
       // Preparar el mensaje ha mostrar
       flash('Se ha guardado '.$user->name.' exitosamente.')->success();
       // Redireccionar al listado de usuarios
       return redirect()->route('admin.user.index');
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
        $user=User::find($id);
        return view('admin.user.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        // Recuperar el usuario
        $user=User::find($id);
        // Actualizar los datos con los del formulario
        $user->update($request->all());

        // Otra opcion es mediante la funcion fill
        // $user->fill($request->all());
        // $user->save();

        // Opcionalmente se pueden recuperar dato por datos
        // $user->name=$request->name;
        // $user->email=$request->email;
        // $user->password=$request->password;
        // $user->type=$request->type;
        // $user->save();

        // Preparar el mensaje ha mostrar
        flash('Se ha editado '.$user->name.' exitosamente.')->success();
        // Redireccionar al listado de usuarios
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        // Buscar usuario en la base dedatos
        $user=User::find($id);
        // Eliminar el usuario
        $user->delete();
        // Preparar el mensaje ha mostrar
        flash('Se ha eliminado '.$user->name.' exitosamente.')->success();
        // Redireccionar al listado de usuarios
        return redirect()->route('admin.user.index');
    }
}
