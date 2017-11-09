@extends('admin.layouts.main')
@section('title', 'Peliculas')
@section('content')
  <a href="{{ route('admin.pelicula.create') }}" class="btn btn-primary">Nueva Pelicula</a>
@endsection
