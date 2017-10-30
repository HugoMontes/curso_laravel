@extends('admin.layouts.main')
@section('title', 'Nuevo Genero')
@section('content')
  @include('admin.layouts.errors')
  {!! Form::open(['route'=>'admin.genero.store', 'method'=>'POST']) !!}
    <div class="form-group">
        {!! Form::label('genero', 'Genero') !!}
        {!! Form::text('genero', null, ['class'=>'form-control', 'placeholder'=>'Nombre del genero','required']) !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}
@endsection
