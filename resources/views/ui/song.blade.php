@extends('layouts.ui')
@section('title')
    {{$song->name}}
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('ui/styles/episode.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('ui/styles/episode_responsive.css')}}">
@endsection

@section('content')
    	<!-- Home -->

	<div class="home">
        <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{$song->artiste->image}}" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title"><h1>{{$song->artiste->name}}</h1></div>
							<div class="home_subtitle text-center">{{$song->artiste->category->name}}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="home_player_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 offset-lg-3">
						
						<!-- Episode -->
						<div class="player d-flex flex-row align-items-start justify-content-start s1">
							<div class="player_content">

								<!-- Player -->
								<div class="single_player_container">

									<div class="single_player d-flex flex-row align-items-center justify-content-start">
										@auth
											<div class="mr-2" id="like-container">
												<a href="{{route('likes',$song->id)}}" id="like">
													@if ($song->isfavorited())
														<img src="{{asset('ui/images/heart-red.svg')}}" width="28px" alt="">
													@else
														<img src="{{asset('ui/images/heart-white.svg')}}" width="28px" alt="">
													@endif
												</a>
											</div>
										@endauth
										<div id="jplayer_1" class="jp-jplayer"></div>
										<div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
											<div class="jp-type-single">
												<div class="player_controls">
													<div class="jp-gui jp-interface d-flex flex-row align-items-center justify-content-start">
														<div class="jp-controls-holder time_controls d-flex flex-row align-items-center justify-content-between">
															<div>
																<div class="jp-controls-holder play_button ml-auto">
																	<button class="jp-play" tabindex="0"></button>
																</div>
															</div>
															<div>
																<div class="jp-progress">
																	<div class="jp-seek-bar">
																		<div class="jp-play-bar"></div>
																	</div>
																</div>
															</div>
														</div>
														<div class="jp-volume-controls d-flex flex-row align-items-center justify-content-between ml-auto">
															<div class="d-flex flex-row align-items-center justify-content-start">
																<button class="jp-mute" tabindex="0"></button>
															</div>
															<div class="d-flex flex-row align-items-center justify-content-start">
																<div class="jp-volume-bar">
																	<div class="jp-volume-bar-value"></div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="jp-no-solution">
													<span>Update Required</span>
													To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Episode -->

	<div class="episode_container">

		<!-- Episode Image -->
		<div class="episode_image_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<!-- Episode Image -->
                        <div class="episode_image"><img src="{{$song->image}}" alt=""></div>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">

				<!-- Sidebar -->
				<div class="col-lg-3 order-lg-1 order-2 sidebar_col">
					<div class="sidebar">

						<!-- Categories -->
						<div class="sidebar_list">
							<div class="sidebar_title">Categories</div>
							<ul>
								@foreach ($categories as $category)
                                    <li><a href="{{route('show-category',$category->id)}}">{{$category->name}}</a></li>
                                @endforeach
							</ul>
						</div>
					</div>
				</div>

				<!-- Episode -->
				<div class="col-lg-9 episode_col order-lg-2 order-1">
					<div class="intro">
                        <div class="section_title">{{$song->name}} - <a href="{{route('show-artiste',$song->artiste->id)}}">{{$song->artiste->name}}</a></div>
						<div class="intro_text">
							{!!$song->lyrics!!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
    
    <script>
		var id="{{$song->id}}";
		
        function initSinglePlayer()
        {
            if($(".jp-jplayer").length)
            {
                $("#jplayer_1").jPlayer({
					ready: function () {
						$(this).jPlayer("setMedia", {
							title:"{{$song->name}}",
                            artist:"{{$song->artiste->name}}",
                            mp3:"{{asset($song->mp3)}}"
                        });
					},
					play: function() { // To avoid multiple jPlayers playing together.
						$(this).jPlayer("pauseOthers");
					},
					swfPath: "{{asset('plugins/jPlayer')}}",
					supplied: "mp3",
					cssSelectorAncestor: "#jp_container_1",
					wmode: "window",
					globalVolume: false,
					useStateClassSkin: true,
					autoBlur: false,
					smoothPlayBar: true,
					keyEnabled: true,
					solution: 'html',
					preload: 'metadata',
					volume: 0.2,
					muted: false,
					backgroundColor: '#000000',
					errorAlerts: false,
					warningAlerts: false
				});
            }
        }
    </script>
    
@endsection