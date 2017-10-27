@extends('admin.layouts.main')
@section('title', 'Usuarios')
@section('content')
  <h2>Usuarios</h2>
  <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Nuevo usuario</a>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Tipo</th>
        <th>Accion</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            @if($user->type=='admin')
              <span class="label label-danger">{{ $user->type }}</span>
            @elseif($user->type =='member')
              <span class="label label-warning">{{ $user->type }}</span>
            @endif
          </td>
          <td>
            <a href="{{ route('admin.user.destroy', $user->id) }}" class="btn btn-danger" title="Eliminar">
              <span class="glyphicon glyphicon-trash"></span>
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $users->links() }}
@endsection
@section('javascript')
  <script type="text/javascript">
    $('.btn-danger').on('click',function(event){
      event.preventDefault();
      var opcion=confirm('Esta seguro de eliminar el estudiante?');
      if(opcion){
        $(location).attr('href', $(this).attr('href'));
      }
      return false;
    });
  </script>
@endsection
