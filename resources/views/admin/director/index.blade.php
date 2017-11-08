@extends('admin.layouts.main')
@section('title', 'Directores')
@section('content')
  <a href="{{ route('admin.director.create') }}" class="btn btn-primary">Nuevo Director</a>
  <!-- Buscador -->
  {!! Form::open(['route'=>'admin.director.index','method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
    <div class="form-group">
      <div class="input-group">
        {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Buscar director']) !!}
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
        <th>Director</th>
        <th>Accion</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($directores as $director)
        <tr>
          <td>{{ $director->id }}</td>
          <td>{{ $director->nombre }}</td>
          <td>
            <a href="{{ route('admin.director.destroy', $director->id) }}" class="btn btn-danger" title="Eliminar">
              <span class="glyphicon glyphicon-trash"></span>
            </a>
            <a href="{{ route('admin.director.edit', $director->id) }}" class="btn btn-primary" title="Editar">
              <span class="glyphicon glyphicon-pencil"></span>
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $directores->links() }}
@endsection
@section('javascript')
  <script type="text/javascript">
    $('.btn-danger').on('click',function(event){
      event.preventDefault();
      var opcion=confirm('Esta seguro de eliminar el director?');
      if(opcion){
        $(location).attr('href', $(this).attr('href'));
      }
      return false;
    });
  </script>
@endsection
