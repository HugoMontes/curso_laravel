@extends('admin.layouts.main')
@section('title', 'Escritorio')
@section('content')
  {{-- Llamando por la url --}}
  <a href="{{ url('hola') }}">1. Hola mundo (por url)</a><br/>
  <a href="{{ route('practica1') }}">2. Hola mundo (por nombre de ruta)</a><br/>
  {{-- Se recomienda hacer uso de los nombres de rutos y no de las urls --}}
  {{-- Haciendo uso de laravelcollective por nombre de ruta --}}
  {!! link_to_route('practica1', $title = '3. Hola mundo (Laravel Collective)') !!}<br/>
  {{-- Para todas las demas rutas usaremos route --}}
  <a href="{{ route('practica2', ['nombre'=>'Ana', 'edad'=>45]) }}">4. Paso de parametros</a><br/>
  <a href="{{ route('practica3') }}">5. Paso de parametros por default</a><br/>
  <a href="{{ route('saludo_dia') }}">6. Buenos dias</a><br/>
  <a href="{{ route('saludo_tarde') }}">7. Buenas tardes</a><br/>
  <a href="{{ route('saludo_noche') }}">8. Buenas noches</a><br/>
  <a href="{{ route('admin.user.index') }}">1. Usuarios</a><br/>
@endsection
