@extends('admin.layouts.main')
@section('title', 'Editar Genero '.$genero->genero)
@section('content')
  @include('admin.layouts.errors')
  {!! Form::open(['route'=>['admin.genero.update', $genero], 'method'=>'PUT']) !!}
    <div class="form-group">
        {!! Form::label('genero', 'Genero') !!}
        {!! Form::text('genero', $genero->genero, ['class'=>'form-control', 'placeholder'=>'Nombre completo','required']) !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}
@endsection
