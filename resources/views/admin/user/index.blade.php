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
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $users->links() }}
@endsection
