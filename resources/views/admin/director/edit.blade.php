@extends('admin.layouts.main')
@section('title', 'Editar Director '.$director->director)
@section('content')
  @include('admin.layouts.errors')
  {!! Form::open(['route'=>['admin.director.update', $director], 'method'=>'PUT']) !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre del Director') !!}
        {!! Form::text('nombre', $director->nombre, ['class'=>'form-control', 'placeholder'=>'Nombre completo','required']) !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}
@endsection
