@extends('admin.layouts.main')
@section('title', 'Nueva Pelicula')
@section('content')
  @include('admin.layouts.errors')
  {!! Form::open(['route'=>'admin.pelicula.store', 'method'=>'POST', 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('titulo', 'Titulo') !!}
        {!! Form::text('titulo', null, ['class'=>'form-control', 'placeholder'=>'Titulo de la pelicula','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('genero_id', 'Genero') !!}
        {!! Form::select('genero_id', $generos, null, ['class'=>'form-control', 'placeholder'=>'Seleccione un genero','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('costo', 'Costo') !!}
        {!! Form::number('costo', null, ['class'=>'form-control', 'placeholder'=>'Costo de la pelicula','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('estreno', 'Estreno') !!}
        {!! Form::date('estreno', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('resumen', 'Resumen') !!}
        {!! Form::textarea('resumen', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('directores', 'Directores') !!}
        {!! Form::select('directores[]', $directores, null, ['class'=>'form-control', 'multiple','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('imagen', 'Directores') !!}
        {!! Form::file('imagen') !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}
@endsection
