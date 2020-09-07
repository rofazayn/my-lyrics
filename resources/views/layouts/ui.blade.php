<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="My Podcast template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="{{asset('ui/styles/bootstrap-4.1.2/bootstrap.min.css')}}">
<link href="{{asset('ui/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('ui/plugins/colorbox/colorbox.css')}}" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style>
	html
	{
		scroll-behavior: smooth;
	}
</style>
@yield('styles')
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header trans_400">

		<!-- Logo -->
		<div class="logo">
			<a href="{{ url('/') }}"><span>my</span>lyrics<img src="{{asset('ui/images/play.png')}}" alt=""></a>
		</div>

		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start trans_400">
						<nav class="main_nav">
							<ul class="d-flex flex-row align-items-start justify-content-start">
								@auth
									@if (auth()->user()->isadmin())
										<li><a href="{{route('home')}}">Home</a></li>
									@endif
								@endauth
								@yield('nav-bar-items')
								<li><a href="{{route('show-songs')}}">Songs</a></li>
								@auth
									<li><a href="{{route('show-favorites')}}">Favorites</a></li>
								@endauth
								<li><a href="blog.html">Artistes</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<!-- Submit & Social -->
		<div class="header_right d-flex flex-row align-items-start justify-content-start">

			<!-- Submit -->
			@auth
				<div class="submit">
					<a href="{{ route('login') }}" onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">Logout</a>
				</div>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			@else
				<div class="submit"><a href="{{ route('login') }}">Login</a></div>
			@endauth

			<!-- Social -->

			<div class="social">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
				</ul>
			</div>

			<!-- Hamburger -->
			<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>

		</div>
	</header>

	<!-- Menu -->

	<div class="menu">
		<div class="menu_content d-flex flex-column align-items-end justify-content-start">
			<ul class="menu_nav_list text-right">
				<li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('show-songs')}}">Songs</a></li>
                <li><a href="blog.html">Artistes</a></li>
			</ul>
			<div class="menu_extra d-flex flex-column align-items-end justify-content-start">
				@auth
					<div class="menu_submit">
						<a href="{{ route('login') }}" onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">Logout</a>
					</div>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				@else
					<div class="menu_submit"><a href="{{ route('login') }}">Login</a></div>
				@endauth
				<div class="social">
					<ul class="d-flex flex-row align-items-start justify-content-start">
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
    </div>
    

	@yield('content')


	<!-- Footer -->

<footer class="footer">
    <div class="container">
        <div class="row footer_logo_row">
            <div class="col d-flex flex-row align-items-center justify-content-center">
                <div class="logo">
                    <a href="{{ url('/') }}"><span>my</span>lyrics<img src="{{asset('ui/images/play.png')}}" alt=""></a>
                </div>
            </div>
        </div>

        <div class="row footer_social_row">
            <div class="col">
                <div class="footer_social">
                    <ul class="d-flex flex-row align-items-center justify-content-center">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

</br></br><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<div class="text-center">
Copyright &copy;2020 All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">ALA</a>
</div>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

    </div>
</div>
</footer>


@yield('scripts')
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="{{asset('ui/styles/bootstrap-4.1.2/popper.js')}}"></script>
	<script src="{{asset('ui/styles/bootstrap-4.1.2/bootstrap.min.js')}}"></script>
	<script src="{{asset('ui/js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('ui/plugins/greensock/TweenMax.min.js')}}"></script>
	<script src="{{asset('ui/plugins/greensock/TimelineMax.min.js')}}"></script>
	<script src="{{asset('ui/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
	<script src="{{asset('ui/plugins/greensock/animation.gsap.min.js')}}"></script>
	<script src="{{asset('ui/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
	<script src="{{asset('ui/plugins/easing/easing.js')}}"></script>
	<script src="{{asset('ui/plugins/colorbox/jquery.colorbox-min.js')}}"></script>
	<script src="{{asset('ui/plugins/progressbar/progressbar.min.js')}}"></script>
	<script src="{{asset('ui/plugins/progressbar/progressbar.js')}}"></script>
	<script src="{{asset('ui/plugins/parallax-js-master/parallax.min.js')}}"></script>
	<script src="{{asset('ui/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
	<script src="{{asset('ui/plugins/jPlayer/jquery.jplayer.min.js')}}"></script>
	<script src="{{asset('ui/plugins/jPlayer/jplayer.playlist.min.js')}}"></script>
	<script src="{{asset('ui/js/episode.js')}}"></script>
</body>
</html>
