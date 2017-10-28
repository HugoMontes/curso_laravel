@extends('admin.layouts.main')
@section('title', 'Nuevo Usuario')
@section('content')
  <h2>Nuevo Usuario</h2>
  @if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  {!! Form::open(['route'=>'admin.user.store', 'method'=>'POST']) !!}
    <div class="form-group">
        {{-- Form::label('nombre_atributo_modelo', 'valor_a_mostrar') --}}
        {!! Form::label('name', 'Nombre') !!}
        {{-- Form::text('nombre_atributo', 'valor_a_mostrar', otros_atributos) --}}
        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre completo','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Correo electronico') !!}
        {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'example@gmail.com','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Contraseña') !!}
        {!! Form::password('password', ['class'=>'form-control', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('type', 'Tipo') !!}
        {!! Form::select('type', [''=>'Seleccione un nivel','member'=>'Miembro', 'admin'=>'Administrador'], null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}
@endsection
