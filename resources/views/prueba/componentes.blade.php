@extends('admin.layouts.main')
@section('content')
  <h1>Componentes Blade<h1>
  {{-- Comentario blade --}}
  <h2>Imprimir valores</h2>
  @php
    $nombre='Juan';
    $edad=15;
  @endphp
  <p>Nombre: {{ $nombre }}</p>
  <p>Edad: {{ $edad }}</p>
  <p>Email: {{ $email or 'default' }}</p>
  <p>Suma: {{ 3 + 4 }}</p>
  <h2>Condicional</h2>
  @if ($edad >= 18)
      <p>Ud es mayor de edad</p>
  @else
      <p>Ud es menor de edad</p>
  @endif
  @if ($nombre == 'Juan')
      <p>Ud se llama Juan</p>
  @endif
  <h2>Bucle</h2>
  <?php $nombres=array('Mateo','Marcos','Lucas','Juan'); ?>
  @foreach ($nombres as $nombre)
    {{ $nombre }},
  @endforeach
  <h2>Ejecutar funciones PHP</h2>
  Fecha: {{ date('d/m/Y') }}
@endsection
