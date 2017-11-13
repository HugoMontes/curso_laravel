@extends('front.template.main')
@section('title',$pelicula->titulo)
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
            <a href="single.html"><img src="{{ asset('imagenes/pelicula/'.$pelicula->imagenes[0]->nombre) }}" alt="" /></a>
          </div>
          <div class="review-info">
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
                <td>DURATION:</td>
                <td>1 hour 45 minutes</td>
              </tr>
            </table>
          </div>
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
