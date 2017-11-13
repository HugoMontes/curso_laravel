<?php

namespace Cinema\Http\Middleware;

use Closure;
// Importar clase Auth
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        // Probar dd("Hola desde middleware admin");
        // Auth::user() - Devuelve el usuario autenticado
        // dd(Auth::user());
        if(Auth::user()->is_admin()){
          // Si es un admin, continuar con la peticion
          return $next($request);
        }else{
          // En caso que no sea administrador
          // dd('No puedes ingresar eres de tipo miembro');
          // Mostrar la plantilla 401.blade.php
          abort(401);
        }
    }
}
