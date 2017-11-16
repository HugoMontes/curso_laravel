@extends('front.template.main')
@section('title', $pelicula->titulo)
@section('content')
  <div class="review-content">
    <div class="top-header span_top">
      <div class="logo">
        <a href="index.html"><img src="{{ asset('front/images/logo.png') }}" alt="" /></a>
        <p>Movie Theater</p>
      </div>
      <div class="search v-search">
        <form>
          <input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}"/>
          <input type="submit" value="">
        </form>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="reviews-section">
      <h3 class="head">{{ $pelicula->titulo }}</h3>
      <div class="col-md-9 reviews-grids">
        <div class="review">
          <div class="movie-pic">
            <a href="{{ route('front.view.pelicula', $pelicula->id) }}"><img src="{{ asset('imagenes/pelicula/'.$pelicula->imagenes[0]->nombre) }}" alt="" /></a>
          </div>
          <div class="review-info">
            <a class="span" href="{{ route('front.view.pelicula', $pelicula->id) }}">
              {{ $pelicula->titulo }}
            </a>
            <p class="dirctr">Creado {{ $pelicula->created_at->diffForHumans() }}</p>
            <p class="ratingview">Critic's Rating:</p>
            <div class="rating">
              <span>☆</span>
              <span>☆</span>
              <span>☆</span>
              <span>☆</span>
              <span>☆</span>
            </div>
            <p class="ratingview">
              &nbsp;3.5/5
            </p>
            <div class="clearfix"></div>
            <p class="ratingview c-rating">Avg Readers' Rating:</p>
            <div class="rating c-rating">
              <span>☆</span>
              <span>☆</span>
              <span>☆</span>
              <span>☆</span>
              <span>☆</span>
            </div>
            <p class="ratingview c-rating">
              &nbsp; 3.3/5</p>
              <div class="clearfix"></div>
              <div class="yrw">
                <div class="dropdown-button">
                  <select class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
                    <option value="0">Your rating</option>
                    <option value="1">1.Poor</option>
                    <option value="2">1.5(Below average)</option>
                    <option value="3">2.Average</option>
                    <option value="4">2.5(Above average)</option>
                    <option value="5">3.Watchable</option>
                    <option value="6">3.5(Good)</option>
                    <option value="7">4.5(Very good)</option>
                    <option value="8">5.Outstanding</option>
                  </select>
                </div>
                <div class="rtm text-center">
                  <a href="#">REVIEW THIS MOVIE</a>
                </div>
                <div class="wt text-center">
                  <a href="#">WATCH THIS TRAILER</a>
                </div>
                <div class="clearfix"></div>
              </div>
              <table class="table">
                <tr>
                  <td>CAST:</td>
                  <td>Will Smith, Margot Robbie, Adrian Martinez, Rodrigo Santoro, BD Wong, Robert Taylor</td>
                </tr>
                <tr>
                  <td>DIRECTOR(ES):</td>
                  <td>
                    @foreach ($pelicula->directores as $director)
                      <a href="{{ route('front.search.director', $director->nombre) }}">
                        {{ $director->nombre }}
                      </a>,
                    @endforeach
                  </td>
                </tr>
                <tr>
                  <td>GENERO:</td>
                  <td>
                    <a href="{{ route('front.search.genero', $pelicula->genero->genero) }}">
                      {{ $pelicula->genero->genero }}
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>DURACION:</td>
                  <td>1 hour 45 minutes</td>
                </tr>
                <tr>
                  <td>COSTO:</td>
                  <td>Bs {{ $pelicula->costo }}</td>
                </tr>
                <tr>
                  <td>ESTRENO:</td>
                  <td>{{ Carbon\Carbon::parse($pelicula->estreno)->formatLocalized('%d de %B de %Y') }}</td>
                </tr>
              </table>
            </div>
            <div class="clearfix"></div>
          </div>
        <div class="clearfix"></div>
        <br/>
        <h4>RESUMEN</h4><br/>
        <div>{!! $pelicula->resumen !!}</div>
        <br/><h4>COMENTARIOS</h4><br/>
        <div id="disqus_thread"></div>
          <script>

          /**
          *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
          *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
          /*
          var disqus_config = function () {
          this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
          this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
          };
          */
          (function() { // DON'T EDIT BELOW THIS LINE
          var d = document, s = d.createElement('script');
          s.src = 'https://cinema-educomser.disqus.com/embed.js';
          s.setAttribute('data-timestamp', +new Date());
          (d.head || d.body).appendChild(s);
          })();
          </script>
          <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
      </div>
      <div class="col-md-3 side-bar">
        @include('front.partials.aside')
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
@endsection
