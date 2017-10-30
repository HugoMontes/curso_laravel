@extends('admin.layouts.main')
@section('title', 'Editar Usuario '.$user->name)
@section('content')
  {!! Form::open(['route'=>['admin.user.update', $user], 'method'=>'PUT']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', $user->name, ['class'=>'form-control', 'placeholder'=>'Nombre completo','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Correo electronico') !!}
        {!! Form::text('email', $user->email, ['class'=>'form-control', 'placeholder'=>'example@gmail.com','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Contraseña') !!}
        {!! Form::password('password', ['class'=>'form-control', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('type', 'Tipo') !!}
        {!! Form::select('type', [''=>'Seleccione un nivel','member'=>'Miembro', 'admin'=>'Administrador'], $user->type, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}
@endsection
