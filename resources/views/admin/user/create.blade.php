@extends('admin.layouts.main')
@section('title', 'Nuevo Usuario')
@section('content')
  @include('admin.layouts.errors')
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
        {!! Form::select('type', ['member'=>'Miembro', 'admin'=>'Administrador'], null, ['class'=>'form-control','placeholder'=>'Seleccione una opcion','required']) !!}
    </div>
    <div class="form-group">
      {{-- Pagina anterior --}}
      <a href="{{ route('admin.user.index') }}" class="btn btn-default">
        <i class="fa fa-times" aria-hidden="true"></i> Cancelar
      </a>
      {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}
@endsection
