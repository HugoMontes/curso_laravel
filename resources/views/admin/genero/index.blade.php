@extends('admin.layouts.main')
@section('title', 'Generos')
@section('content')
  <a href="{{ route('admin.genero.create') }}" class="btn btn-primary">Nuevo Genero</a>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Genero</th>
        <th>Accion</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($generos as $genero)
        <tr>
          <td>{{ $genero->id }}</td>
          <td>{{ $genero->genero }}</td>
          <td>
            <a href="{{ route('admin.genero.destroy', $genero->id) }}" class="btn btn-danger" title="Eliminar">
              <span class="glyphicon glyphicon-trash"></span>
            </a>
            <a href="{{ route('admin.genero.edit', $genero->id) }}" class="btn btn-primary" title="Editar">
              <span class="glyphicon glyphicon-pencil"></span>
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $generos->links() }}
@endsection
@section('javascript')
  <script type="text/javascript">
    $('.btn-danger').on('click',function(event){
      event.preventDefault();
      var opcion=confirm('Esta seguro de eliminar el genero?');
      if(opcion){
        $(location).attr('href', $(this).attr('href'));
      }
      return false;
    });
  </script>
@endsection
