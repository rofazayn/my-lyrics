@extends('layouts.ui')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('ui/styles/artiste.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('ui/styles/artiste_responsive.css')}}">
@endsection

@section('content')
<div class="home">
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('ui/images/about.jpg')}}" data-speed="0.8"></div>
    <div class="home_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="home_content text-center">
                        <div class="home_title"><h1>Favorites</h1></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Episodes -->

<div class="episode_container">
    <div class="episodes">
        <div class="container">
            <div class="row episodes_row">

                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div class="sidebar">

                        <!-- Search -->
                        <div class="sidebar_search">
                            <div class="sidebar_title">Search</div>
                                <input type="text" id="search" class="search_input" placeholder="Type and hit enter" required="required">                           
                        </div>

                        <!-- Categories -->
                        <div class="sidebar_list">
                            <div class="sidebar_title">Categories</div>
                            <ul>
                                @foreach ($categories as $cat)
                                    <li><a href="{{route('show-category',$cat->id)}}">{{$cat->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Episodes -->
                <div class="col-lg-9 episodes_col">
                    <div class="episodes_container" id="episodes_container">

                        <!-- Episode -->
                        @forelse ($songs as $song)
                        <div class="episode d-flex flex-row align-items-start justify-content-start s1">
                            <div>
                                <div class="episode_image">
                                    <img src="{{$song->image}}" alt="">
                                    <div class="tags">
                                        <ul class="d-flex flex-row align-items-start justify-content-start">
                                            <li><a href="{{route('show-category',$song->artiste->category->id)}}">{{$song->artiste->category->name}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="episode_content">
                                <div class="episode_name"><a href="{{route('show-song',$song->id)}}">{{$song->name}}</a></div>
                                <div class="episode_date"><a href="#">24 September, 2018</a></div>
                                <div class="show_info d-flex flex-row align-items-start justify-content-start">
                                    <div class="show_fav d-flex flex-row align-items-center justify-content-start">
                                        @asyncWidget('views_widget',['id'=>$song->id])
                                    </div>
                                    <div class="show_comments">
                                        <a href="#">
                                            <div class="d-flex flex-row align-items-center justify-content-start">
                                                <div class="show_comments_count"><a href="{{route('show-artiste',$song->artiste->id)}}">{{$song->artiste->name}}</a></div>
                                            </div>
                                        </a>	
                                    </div>
                                </div>
                                <!-- Player -->
                                <div class="single_player_container">

                                    <div class="single_player d-flex flex-row align-items-center justify-content-start">
                                        <div id="jplayer_{{$song->id}}" class="jp-jplayer"></div>
                                        <div id="jp_container_{{$song->id}}" class="jp-audio" role="application" aria-label="media player">
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
                        <script>
                            
                            function initSinglePlayer{{$song->id}}()
                            {
                                if($(".jp-jplayer").length)
                                {
                                        $("#jplayer_{{$song->id}}").jPlayer({
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
                                            swfPath: "{{asset('ui/plugins/jPlayer')}}",
                                            supplied: "mp3",
                                            cssSelectorAncestor: "#jp_container_{{$song->id}}",
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
                            $(document).ready(function(){
                                initSinglePlayer{{$song->id}}();
                            });
                        </script>
                        @empty
                            <div class="col-lg-9 episode_col order-lg-2 order-1">
                                <div class="intro">
                                    <div class="section_title"><h1>There is no records yet</h1></div>
                                </div>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>
            <div class="row page_nav_row">
                <div class="col">
                    <div class="page_nav d-flex flex-row align-items-center justify-content-center">
                        <ul class="d-flex flex-row">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).on('keyup','#search',function(e){
    e.preventDefault();
    var search=$(this).val();
    if(e.keyCode==13){
        $.ajax({
            url:'/search',
            type:'GET',
            dataType:'html',
            data:{
                search:search,
                favorites:1,
            },
            success:function(data){
                console.log('success');
                $('#episodes_container').html(data);
            }
        });
    }
});
</script>
@endsection