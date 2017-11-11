@extends('admin.layouts.main')
@section('title', 'Lista de Imagenes')
@section('content')
  <div class="row">
    @foreach ($imagenes as $imagen)
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <img src="/imagenes/pelicula/{{ $imagen->nombre }}" class="img-responsive" alt="">
          </div>
          <div class="panel-footer">
            {{ $imagen->pelicula->titulo }}
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
