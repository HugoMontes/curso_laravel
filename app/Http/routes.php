<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Crear una ruta de prueba
Route::get('hola',function(){
  return 'Hola desde routes.php';
})->name('practica1');
Route::get('persona/{nombre}/{edad}',function($nombre,$edad){
  return 'Mi nombre es '.$nombre.', tengo '.$edad.' años.';
})->name('practica2');
Route::get('empleado/{nombre?}',function($nombre='Juan'){
  return 'Mi nombre es '.$nombre;
})->name('practica3');
Route::group(['prefix'=>'saludo'],function(){
  Route::get('dia',function(){
    return 'Buenos dias';
  })->name('saludo_dia');
  Route::get('tarde',function(){
    return 'Buenas tardes';
  })->name('saludo_tarde');
  Route::get('noche',function(){
    return 'Buenas noches';
  })->name('saludo_noche');
});


// Rutas Prueba
// get('RUTA', 'CONTROLADOR@FUNCION' )
Route::get('prueba','PruebaController@index');
Route::get('prueba/datos/{nombre?}/{edad?}','PruebaController@misdatos');
Route::get('prueba/saludo',function(){
  return view('prueba.saludo');
});
Route::get('prueba/blade','PruebaController@saludoBlade');
Route::get('prueba/persona/{nombre}/{edad}','PruebaController@datosBlade');
Route::get('prueba/componentes',function(){
  return view('prueba.componentes');
});

// Rutas Admin
Route::group(['prefix'=>'admin'],function(){
  Route::get('home','admin\HomeController@index')->name('home');
  Route::resource('user', 'admin\UserController');
  Route::get('user/{id}/destroy','admin\UserController@destroy')->name('admin.user.destroy');
});
