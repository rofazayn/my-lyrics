@extends('layouts.ui')
@section('title')
    My Lyrics
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('ui/styles/main_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('ui/styles/responsive.css')}}">
@endsection

@section('nav-bar-items')
    <li><a href="#categories">Categories</a></li>
@endsection
@section('content')
    <!-- Home -->

	<div class="home">
		<div class="background_image" style="background-image:url({{asset('ui/images/welcome-bg.jpg')}})"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">

							<div class="home_title"><h1>My Lyrics</h1></div>
							<div class="home_subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>

							<div class="button_border home_button trans_200"><a href="{{ route('login') }}">Join</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Shows -->

	<div class="shows_2">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="shows_2_title">Latest songs</div>
				</div>
			</div>
			<div class="row shows_2_row">

				@foreach ($songs as $song)
					<!-- Show -->
					<div class="col-xl-3 col-md-6">
						<div class="show">
							
							<div class="show_image">
								
								<a href="{{route('show-song',$song->id)}}">
									<img class="image" src="{{$song->image}}" alt="https://unsplash.com/@h4rd3n">
									<div class="show_play_icon"><img src="ui/images/play.svg" alt="https://www.flaticon.com/authors/cole-bemis"></div>
									<div class="show_title_2">{{$song->name}}</div>
								</a>
								<div class="show_tags">
									<div class="tags">
										<ul class="d-flex flex-row align-items-start justify-content-start">
											<li><a href="{{route('show-category',$song->artiste->category->id)}}">{{$song->artiste->category->name}}</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach

			</div>
			<div class="row">
				<div class="col text-center">
					<div class="button_fill shows_2_button"><a href="{{route('show-songs')}}">See more</a></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Bi Weekly -->

	<div class="weekly">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('ui/images/welcome-bg.jpg')}}" data-speed="0.8"></div>
		<div class="container">
			<div class="row row-eq-height">

				<!-- Weekly Content -->
				<div class="col-lg-6">
					<div class="weekly_content d-flex flex-column align-items-start justify-content-lg-center justify-content-start">
						<div>
							<div class="weekly_title"><h1>My Lyrics</h1></div>
							<div class="weekly_text">
								<p>Cras congue et risus eget congue. Integer id justo non orci suscipit cursus a scelerisque libero. Fusce in tortor mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas euismod sed magna.</p>
							</div>
							<div class="shops d-flex flex-row align-items-start justify-content-start flex-wrap">
								<div class="button_border"><a href="#">Amazon</a></div>
								<div class="button_border"><a href="#">Itunes</a></div>
								<div class="button_border"><a href="#">Spotify</a></div>
							</div>
						</div>
					</div>
				</div>

				<!-- Weekly Image -->
				<div class="col-lg-6">
					<div class="weekly_image">
						<img src="ui/images/show_5.jpg" alt="">
						<div class="logo">
							<a href="#" class="d-flex flex-row"><span>my</span>lyrics<div><img src="ui/images/play_2.png" alt=""></div></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Shows 2 -->

	<div class="shows_2" id="categories">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="shows_2_title">By Category</div>
				</div>
			</div>
			<div class="row shows_2_row">

				<!-- Show -->
				@foreach ($categories as $category)
					<div class="col-xl-3 col-md-6">
						<div class="show">
							<div class="show_image">
								<a href="{{route('show-category',$category->id)}}">
									<img class="image" src="{{asset('ui/images/category.png')}}" alt="https://unsplash.com/@h4rd3n">
									<div class="show_title_2"><strong>{{$category->name}}</strong></div>
								</a>
							</div>
						</div>
					</div>
				@endforeach

			</div>
		</div>
	</div>

@endsection

@section('scripts')
    <script src="{{asset('ui/js/custom.js')}}"></script>
@endsection