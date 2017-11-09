@extends('admin.layouts.main')
@section('title', 'Nueva Pelicula')
@section('styles')
  {!! Html::style('plugins/chosen/chosen.min.css') !!}
  {!! Html::style('plugins/trumbowyg/ui/trumbowyg.min.css') !!}
@endsection
@section('content')
  @include('admin.layouts.errors')
  {!! Form::open(['route'=>'admin.pelicula.store', 'method'=>'POST', 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('titulo', 'Titulo') !!}
        {!! Form::text('titulo', null, ['class'=>'form-control', 'placeholder'=>'Titulo de la pelicula','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('genero_id', 'Genero') !!}
        {!! Form::select('genero_id', $generos, null, ['class'=>'form-control', 'placeholder'=>'Seleccione un genero','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('costo', 'Costo') !!}
        {!! Form::number('costo', null, ['class'=>'form-control', 'placeholder'=>'Costo de la pelicula','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('estreno', 'Estreno') !!}
        {!! Form::date('estreno', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('resumen', 'Resumen') !!}
        {!! Form::textarea('resumen', null, ['class'=>'form-control textarea-resumen']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('directores', 'Directores') !!}
        {!! Form::select('directores[]', $directores, null, ['class'=>'form-control select-director', 'multiple','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('imagen', 'Imagen') !!}
        {!! Form::file('imagen',['class'=>'file-imagen']) !!}
        <img id="image-imagen" src="#" alt="Su imagen" class="img-rounded" width="70%" />
    </div>
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
