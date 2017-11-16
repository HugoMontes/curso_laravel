@extends('front.template.main')
@section('title','Reviews')
@section('content')
	<div class="review-content">
		<div class="top-header span_top">
			<div class="logo">
				<a href="index.html">
					<img src="{{ asset('front/images/logo.png') }}" alt="" />
				</a>
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
			<h3 class="head">Movie Reviews</h3>
			<div class="col-md-9 reviews-grids">
				@foreach ($peliculas as $pelicula)
					<div class="review">
						<div class="movie-pic">
							<a href="single.html"><img src="{{ asset('imagenes/pelicula/'.$pelicula->imagenes[0]->nombre) }}" alt="" /></a>
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
					@endforeach
					<div class="text-center">
						{!! $peliculas->render() !!}
					</div>
				</div>
				<div class="col-md-3 side-bar">
					@include('front.partials.aside')
					<div class="featured">
						<h3>Featured Today in Movie Reviews</h3>
						<ul>
							<li>
								<a href="single.html"><img src="{{ asset('front/images/f1.jpg') }}" alt="" /></a>
								<p>lorem movie review</p>
							</li>
							<li>
								<a href="single.html"><img src="{{ asset('front/images/f2.jpg') }}" alt="" /></a>
								<p>lorem movie review</p>
							</li>
							<li>
								<a href="single.html"><img src="{{ asset('front/images/f3.jpg') }}" alt="" /></a>
								<p>lorem movie review</p>
							</li>
							<li>
								<a href="single.html"><img src="{{ asset('front/images/f4.jpg') }}" alt="" /></a>
								<p>lorem movie review</p>
							</li>
							<li>
								<a href="single.html"><img src="{{ asset('front/images/f5.jpg') }}" alt="" /></a>
								<p>lorem movie review</p>
							</li>
							<li>
								<a href="single.html"><img src="{{ asset('front/images/f6.jpg') }}" alt="" /></a>
								<p>lorem movie review</p>
							</li>
							<div class="clearfix"></div>
						</ul>
					</div>
					<div class="entertainment">
						<h3>Featured Today in Entertainment</h3>
						<ul>
							<li class="ent">
								<a href="single.html"><img src="{{ asset('front/images/f6.jpg') }}" alt="" /></a>
							</li>
							<li>
								<a href="single.html">Watch ‘Bombay Velvet’ trailer during WC match</a>

							</li>
							<div class="clearfix"></div>
						</ul>
						<ul>
							<li class="ent">
								<a href="single.html"><img src="{{ asset('front/images/f5.jpg') }}" alt="" /></a>
							</li>
							<li>
								<a href="single.html">Watch ‘Bombay Velvet’ trailer during WC match</a>

							</li>
							<div class="clearfix"></div>
						</ul>
						<ul>
							<li class="ent">
								<a href="single.html"><img src="{{ asset('front/images/f3.jpg') }}" alt="" /></a>
							</li>
							<li>
								<a href="single.html">Watch ‘Bombay Velvet’ trailer during WC match</a>

							</li>
							<div class="clearfix"></div>
						</ul>
						<ul>
							<li class="ent">
								<a href="single.html"><img src="{{ asset('front/images/f4.jpg') }}" alt="" /></a>
							</li>
							<li>
								<a href="single.html">Watch ‘Bombay Velvet’ trailer during WC match</a>

							</li>
							<div class="clearfix"></div>
						</ul>
						<ul>
							<li class="ent">
								<a href="single.html"><img src="{{ asset('front/images/f2.jpg') }}" alt="" /></a>
							</li>
							<li>
								<a href="single.html">Watch ‘Bombay Velvet’ trailer during WC match</a>

							</li>
							<div class="clearfix"></div>
						</ul>
						<ul>
							<li class="ent">
								<a href="single.html"><img src="{{ asset('front/images/f1.jpg') }}" alt="" /></a>
							</li>
							<li>
								<a href="single.html">Watch ‘Bombay Velvet’ trailer during WC match</a>

							</li>
							<div class="clearfix"></div>
						</ul>
					</div>
					<div class="might">
						<h4>You might also like</h4>
						<div class="might-grid">
							<div class="grid-might">
								<a href="single.html"><img src="{{ asset('front/images/mi.jpg') }}" class="img-responsive" alt=""> </a>
							</div>
							<div class="might-top">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								<a href="single.html">Lorem Ipsum <i> </i></a>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="might-grid">
							<div class="grid-might">
								<a href="single.html"><img src="{{ asset('front/images/mi1.jpg') }}" class="img-responsive" alt=""> </a>
							</div>
							<div class="might-top">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								<a href="single.html">Lorem Ipsum <i> </i></a>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="might-grid">
							<div class="grid-might">
								<a href="single.html"><img src="{{ asset('front/images/mi2.jpg') }}" class="img-responsive" alt=""> </a>
							</div>
							<div class="might-top">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								<a href="single.html">Lorem Ipsum <i> </i></a>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="might-grid">
							<div class="grid-might">
								<a href="single.html"><img src="{{ asset('front/images/mi3.jpg') }}" class="img-responsive" alt=""> </a>
							</div>
							<div class="might-top">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								<a href="single.html">Lorem Ipsum <i> </i></a>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<!---->
					<div class="grid-top">
						<h4>Archives</h4>
						<ul>
							<li><a href="single.html">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </a></li>
							<li><a href="single.html">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</a></li>
							<li><a href="single.html">When an unknown printer took a galley of type and scrambled it to make a type specimen book. </a> </li>
							<li><a href="single.html">It has survived not only five centuries, but also the leap into electronic typesetting</a> </li>
							<li><a href="single.html">Remaining essentially unchanged. It was popularised in the 1960s with the release of </a> </li>
							<li><a href="single.html">Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing </a> </li>
							<li><a href="single.html">Software like Aldus PageMaker including versionsof Lorem Ipsum.</a> </li>
						</ul>
					</div>
					<!---->

				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="review-slider">
			<ul id="flexiselDemo1">
				<li><img src="{{ asset('front/images/r1.jpg') }}" alt=""/></li>
				<li><img src="{{ asset('front/images/r2.jpg') }}" alt=""/></li>
				<li><img src="{{ asset('front/images/r3.jpg') }}" alt=""/></li>
				<li><img src="{{ asset('front/images/r4.jpg') }}" alt=""/></li>
				<li><img src="{{ asset('front/images/r5.jpg') }}" alt=""/></li>
				<li><img src="{{ asset('front/images/r6.jpg') }}" alt=""/></li>
			</ul>
		</div>
	@endsection
	@section('script')
		<!-- Script Flexisel -->
		{!! Html::script('front/js/jquery.flexisel.js') !!}
		<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo1").flexisel({
				visibleItems: 6,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: false,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint:480,
						visibleItems: 2
					},
					landscape: {
						changePoint:640,
						visibleItems: 3
					},
					tablet: {
						changePoint:768,
						visibleItems: 3
					}
				}
			});
		});
		</script>
	@endsection
