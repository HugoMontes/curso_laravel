<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Generos</h3>
  </div>
  <div class="panel-body">
    <ul class="list-group">
      @foreach ($generos as $genero)
        <li class="list-group-item">
          <span class="badge">{{ $genero->peliculas->count() }}</span>
          <a href="{{ route('front.search.genero', $genero->genero) }}">
            {{ $genero->genero }}
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</div>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Directores</h3>
  </div>
  <div class="panel-body">
    @foreach ($directores as $director)
      <span class="label">
        <a href="{{ route('front.search.director', $director->nombre) }}">
          {{ $director->nombre }}, 
        </a>
      </span>
    @endforeach
  </div>
</div>
