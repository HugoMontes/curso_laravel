@extends('admin.layouts.main')
@section('title', 'Editar Pelicula')
@section('styles')
  {!! Html::style('plugins/chosen/chosen.min.css') !!}
  {!! Html::style('plugins/trumbowyg/ui/trumbowyg.min.css') !!}
@endsection
@section('content')
  @include('admin.layouts.errors')
  {!! Form::open(['route'=>['admin.pelicula.update', $pelicula], 'method'=>'PUT']) !!}
    <div class="form-group">
        {!! Form::label('titulo', 'Titulo') !!}
        {!! Form::text('titulo', $pelicula->titulo, ['class'=>'form-control', 'placeholder'=>'Titulo de la pelicula','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('genero_id', 'Genero') !!}
        {{-- Pasar el id del genero seleccionado --}}
        {!! Form::select('genero_id', $generos, $pelicula->genero->id, ['class'=>'form-control', 'placeholder'=>'Seleccione un genero','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('costo', 'Costo') !!}
        {!! Form::number('costo', $pelicula->costo, ['class'=>'form-control', 'placeholder'=>'Costo de la pelicula','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('estreno', 'Estreno') !!}
        {!! Form::date('estreno',  date($pelicula->estreno), ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('resumen', 'Resumen') !!}
        {!! Form::textarea('resumen', $pelicula->resumen, ['class'=>'form-control textarea-resumen']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('directores', 'Directores') !!}
        {{-- Pasar un array con los ids de director seleccionados --}}
        {!! Form::select('directores[]', $directores, $mis_directores, ['class'=>'form-control select-director', 'multiple','required']) !!}
    </div>
    {{-- No permitir editar la imagen eliminar este campo --}}
    {{-- Esta accion se la podria crear en un CRUD para imagenes --}}
    <div class="form-group">
      {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}
@endsection

@section('javascript')
  {!! Html::script('plugins/chosen/chosen.jquery.min.js') !!}
  {!! Html::script('plugins/trumbowyg/trumbowyg.min.js') !!}
  {!! Html::script('plugins/trumbowyg/langs/es.min.js') !!}
  <script type="text/javascript">
      $(".select-director").chosen({
        placeholder_text_multiple: 'Seleccione un maximo de 3 directores',
        max_selected_options: 3,
        no_results_text: 'No se encontraron directores',
      });
      $(".textarea-resumen").trumbowyg({
          lang: 'es'
      });
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#image-imagen').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
      $(".file-imagen").change(function() {
        readURL(this);
      });
  </script>
@endsection
