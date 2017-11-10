@extends('admin.layouts.main')
@section('title', 'Peliculas')
@section('content')
  <a href="{{ route('admin.pelicula.create') }}" class="btn btn-primary">Nueva Pelicula</a>
  <!-- Buscador -->
  {!! Form::open(['route'=>'admin.pelicula.index','method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
    <div class="form-group">
      <div class="input-group">
        {!! Form::text('titulo',null,['class'=>'form-control','placeholder'=>'Buscar']) !!}
        <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span> </div>
      </div>
    </div>
  {!! Form::close() !!}
  <hr>
  <!-- /Buscador -->
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>TITULO</th>
        <th>GENERO</th>
        <th>USUARIO</th>
        <th>ACCION</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($peliculas as $pelicula)
      <tr>
          <td>{{ $pelicula->id }}</td>
          <td>{{ $pelicula->titulo }}</td>
          <td>{{ $pelicula->genero->genero }}</td>
          <td>{{ $pelicula->user->name }}</td>
          <td>
            <a href="{{ route('admin.pelicula.destroy', $pelicula->id) }}" class="btn btn-danger" title="Eliminar">
              <span class="glyphicon glyphicon-trash"></span>
            </a>
            <a href="{{ route('admin.pelicula.edit', $pelicula->id) }}" class="btn btn-primary" title="Editar">
              <span class="glyphicon glyphicon-pencil"></span>
            </a>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="text-center">
    {{ $peliculas->links() }}
  </div>
@endsection
