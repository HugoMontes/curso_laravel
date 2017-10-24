<?php
namespace Cinema\Http\Controllers;
use Illuminate\Http\Request;
use Cinema\Http\Requests;

class PruebaController extends Controller{

  public function index(){
    return 'Hola desde PruebaController';
  }

  public function misDatos($nombre='Juan', $edad=10){
    return 'Nombre: '.$nombre.'<br> Edad: '.$edad;
  }

  public function saludoBlade(){
    return view('prueba.saludo');
  }

  public function datosBlade($nombre, $edad){
    $data=compact('nombre', 'edad');
    return view('prueba.datos', $data);
  }
}
